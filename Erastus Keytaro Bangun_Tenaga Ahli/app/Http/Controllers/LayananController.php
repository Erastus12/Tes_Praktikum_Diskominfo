<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function daftarGuru(Request $request)
    {
        $query = Guru::query();

        // search q parameter (searches nama, nip, email, mata_pelajaran)
        if ($q = $request->query('q')) {
            $query->where(function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('nip', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('mata_pelajaran', 'like', "%{$q}%");
            });
        }

        // fetch paginated results
        $perPage = 12;
        $gurusPaginated = $query->orderBy('nama')->paginate($perPage)->appends($request->query());

        // compute eligibility and attach reasoning to collection items
        $collection = $gurusPaginated->getCollection()->map(function ($guru) {
            $pendidikan = strtolower($guru->pendidikan ?? '');
            $hasDegree = stripos($pendidikan, 's1') !== false || stripos($pendidikan, 's2') !== false || stripos($pendidikan, 'sarjana') !== false;

            $years = intval($guru->years_experience ?? 0);
            $trainings = intval($guru->trainings_completed ?? 0);

            $rules = [
                'status_pns' => $guru->status === 'PNS',
                'education_degree' => $hasDegree,
                'years_experience' => $years >= 5,
                'trainings_completed' => $trainings >= 2,
            ];

            $computedEligible = $rules['status_pns'] && $rules['education_degree'] && $rules['years_experience'] && $rules['trainings_completed'];

            // Respect admin override if present
            if (!is_null($guru->eligibility_override)) {
                $finalEligible = (bool)$guru->eligibility_override;
                $overrideSource = 'admin';
            } else {
                $finalEligible = $computedEligible;
                $overrideSource = 'computed';
            }

            $guru->setAttribute('eligible', $finalEligible);
            $guru->setAttribute('eligibility_rules', $rules);
            $guru->setAttribute('eligibility_override_source', $overrideSource);
            $guru->setAttribute('years_experience', $years);
            $guru->setAttribute('trainings_completed', $trainings);

            return $guru;
        });

        $gurusPaginated->setCollection($collection);

        $filter = $request->query('filter');
        if ($filter === 'eligible') {
            // filter on the collection (already paginated) — for correctness ideally use DB but keep simple
            $filtered = $collection->where('eligible', true)->values();
            $gurusPaginated->setCollection($filtered);
        } elseif ($filter === 'not') {
            $filtered = $collection->where('eligible', false)->values();
            $gurusPaginated->setCollection($filtered);
        }

        return view('layanan.daftar-guru', ['gurus' => $gurusPaginated, 'filter' => $filter, 'q' => $request->query('q')]);
    }

    public function create()
    {
        return view('layanan.form-guru');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:gurus',
            'nama' => 'required|string',
            'email' => 'required|email',
            'mata_pelajaran' => 'required|string',
            'pendidikan' => 'required|string',
            'status' => 'required|in:PNS,Honorer',
            'years_experience' => 'nullable|integer|min:0',
            'trainings_completed' => 'nullable|integer|min:0',
            'eligibility_override' => 'nullable|in:0,1',
            'eligibility_note' => 'nullable|string',
        ]);

        // ensure integer defaults
        $validated['years_experience'] = $validated['years_experience'] ?? 0;
        $validated['trainings_completed'] = $validated['trainings_completed'] ?? 0;

        $validated['years_experience'] = $validated['years_experience'] ?? 0;
        $validated['trainings_completed'] = $validated['trainings_completed'] ?? 0;
        if (isset($validated['eligibility_override'])) {
            $validated['eligibility_override'] = (int)$validated['eligibility_override'];
        }

        Guru::create($validated);

        return redirect()->route('daftar-guru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit(Guru $guru)
    {
        return view('layanan.form-guru', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:gurus,nip,' . $guru->id,
            'nama' => 'required|string',
            'email' => 'required|email',
            'mata_pelajaran' => 'required|string',
            'pendidikan' => 'required|string',
            'status' => 'required|in:PNS,Honorer',
            'years_experience' => 'nullable|integer|min:0',
            'trainings_completed' => 'nullable|integer|min:0',
            'eligibility_override' => 'nullable|in:0,1',
            'eligibility_note' => 'nullable|string',
        ]);

        $validated['years_experience'] = $validated['years_experience'] ?? 0;
        $validated['trainings_completed'] = $validated['trainings_completed'] ?? 0;
        if (isset($validated['eligibility_override'])) {
            $validated['eligibility_override'] = (int)$validated['eligibility_override'];
        } else {
            $validated['eligibility_override'] = null;
            $validated['eligibility_note'] = null;
        }

        $guru->update($validated);

        return redirect()->route('daftar-guru')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('daftar-guru')->with('success', 'Data guru berhasil dihapus!');
    }
}
