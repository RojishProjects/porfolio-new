<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Test User for Admin
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            PortfolioSeeder::class,
            CategorizedSkillsSeeder::class,
            MoreProjectsSeeder::class,
            AIShowcaseSeeder::class,
            AddKSIHMDesignsSeeder::class,
        ]);
    }
}
