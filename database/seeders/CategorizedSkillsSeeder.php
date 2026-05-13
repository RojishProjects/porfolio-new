<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class CategorizedSkillsSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Web Development
            ['name' => 'PHP / Laravel', 'category' => 'Web Development', 'percentage' => 90],
            ['name' => 'HTML5 / CSS3', 'category' => 'Web Development', 'percentage' => 95],
            ['name' => 'JavaScript', 'category' => 'Web Development', 'percentage' => 85],
            ['name' => 'Tailwind CSS', 'category' => 'Web Development', 'percentage' => 90],
            ['name' => 'MySQL / Database', 'category' => 'Web Development', 'percentage' => 80],
            
            // Marketing
            ['name' => 'Digital Marketing', 'category' => 'Marketing', 'percentage' => 85],
            ['name' => 'Content Strategy', 'category' => 'Marketing', 'percentage' => 80],
            ['name' => 'SEO Optimization', 'category' => 'Marketing', 'percentage' => 75],
            ['name' => 'Social Media Mgmt', 'category' => 'Marketing', 'percentage' => 90],
            
            // Youth Leadership
            ['name' => 'Public Speaking', 'category' => 'Youth Leadership', 'percentage' => 95],
            ['name' => 'Team Coordination', 'category' => 'Youth Leadership', 'percentage' => 90],
            ['name' => 'Community Mentoring', 'category' => 'Youth Leadership', 'percentage' => 85],
            ['name' => 'Strategic Planning', 'category' => 'Youth Leadership', 'percentage' => 80],
        ];

        Skill::truncate();

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
