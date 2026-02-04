<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class UpdateGuruExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = Guru::all();
        foreach ($gurus as $guru) {
            // Assign plausible sample data if not set
            if (is_null($guru->years_experience) || $guru->years_experience === 0) {
                $guru->years_experience = rand(1, 20);
            }
            if (is_null($guru->trainings_completed) || $guru->trainings_completed === 0) {
                $guru->trainings_completed = rand(0, 6);
            }
            $guru->save();
        }
    }
}
