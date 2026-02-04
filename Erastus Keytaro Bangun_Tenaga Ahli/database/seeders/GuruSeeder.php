<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Guru::create([
            'nip' => '19700101199103001',
            'nama' => 'Budi Hartono, S.Pd',
            'email' => 'budi@example.com',
            'mata_pelajaran' => 'Matematika',
            'pendidikan' => 'S1 Pendidikan Matematika',
            'status' => 'PNS',
        ]);

        \App\Models\Guru::create([
            'nip' => '19750315199403002',
            'nama' => 'Siti Nurhaliza, S.Pd',
            'email' => 'siti@example.com',
            'mata_pelajaran' => 'Bahasa Indonesia',
            'pendidikan' => 'S1 Pendidikan Bahasa',
            'status' => 'PNS',
        ]);

        \App\Models\Guru::create([
            'nip' => '19800520199803003',
            'nama' => 'Ahmad Suparta, M.Pd',
            'email' => 'ahmad@example.com',
            'mata_pelajaran' => 'Fisika',
            'pendidikan' => 'S2 Pendidikan Sains',
            'status' => 'Honorer',
        ]);

        \App\Models\Guru::create([
            'nip' => '19850810200203004',
            'nama' => 'Dewi Kusuma, S.Pd',
            'email' => 'dewi@example.com',
            'mata_pelajaran' => 'Kimia',
            'pendidikan' => 'S1 Pendidikan Kimia',
            'status' => 'PNS',
        ]);

        \App\Models\Guru::create([
            'nip' => '19900212200603005',
            'nama' => 'Roni Suganda, S.Pd',
            'email' => 'roni@example.com',
            'mata_pelajaran' => 'Biologi',
            'pendidikan' => 'S1 Pendidikan Biologi',
            'status' => 'Honorer',
        ]);
    }
}
