<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password123'),
        ]);

        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('password123'),
        ]);

        $this->call([
            GuruSeeder::class,
        ]);

        $this->call([
            UpdateGuruExperienceSeeder::class,
        ]);
    }
}
