<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Settings
        \App\Models\Setting::create(['key' => 'hero_name', 'value' => 'Rojish Bhurtel']);
        \App\Models\Setting::create(['key' => 'hero_subtitle', 'value' => 'Developer • Youth Leader • Marketer']);
        \App\Models\Setting::create(['key' => 'hero_tagline', 'value' => 'Passionate about creating digital solutions and leading positive change']);
        \App\Models\Setting::create(['key' => 'about_summary', 'value' => 'A multi-faceted professional passionate about technology, leadership, and creative marketing solutions.']);
        \App\Models\Setting::create(['key' => 'contact_email', 'value' => 'rojish.bhurtel@example.com']);
        \App\Models\Setting::create(['key' => 'contact_phone', 'value' => '+977 98XXXXXXXX']);
        \App\Models\Setting::create(['key' => 'contact_location', 'value' => 'Kathmandu, Nepal']);

        // About Roles
        \App\Models\AboutRole::create([
            'title' => 'As a Developer',
            'description' => 'I craft digital experiences with modern technologies, focusing on clean code and user-centric design. My passion lies in building applications that solve real-world problems.',
            'key_areas' => ['React', 'TypeScript', 'Node.js', 'Python']
        ]);
        \App\Models\AboutRole::create([
            'title' => 'As a Youth Leader',
            'description' => 'I believe in empowering the next generation through mentorship and community building. Leading initiatives that create positive impact in young people\'s lives.',
            'key_areas' => ['Mentorship', 'Community Building', 'Public Speaking', 'Event Organization']
        ]);
        \App\Models\AboutRole::create([
            'title' => 'As a Marketer',
            'description' => 'I help brands tell their stories through strategic marketing campaigns. Combining creativity with data-driven insights to achieve meaningful results.',
            'key_areas' => ['Digital Marketing', 'Content Strategy', 'Social Media', 'Analytics']
        ]);

        // Skills
        $skills = [
            ['Development', 'React', 90],
            ['Development', 'TypeScript', 85],
            ['Development', 'Node.js', 80],
            ['Development', 'Python', 75],
            ['Development', 'MongoDB', 70],
            ['Leadership', 'Team Management', 95],
            ['Leadership', 'Public Speaking', 90],
            ['Leadership', 'Mentoring', 88],
            ['Leadership', 'Event Planning', 85],
            ['Leadership', 'Community Building', 92],
            ['Marketing', 'Digital Marketing', 88],
            ['Marketing', 'Content Strategy', 85],
            ['Marketing', 'Social Media', 90],
            ['Marketing', 'Analytics', 80],
            ['Marketing', 'Brand Strategy', 75],
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::create([
                'category' => $skill[0],
                'name' => $skill[1],
                'percentage' => $skill[2]
            ]);
        }

        // Projects
        \App\Models\Project::create([
            'title' => 'E-Commerce Platform',
            'description' => 'A full-stack e-commerce solution built with React, Node.js, and MongoDB. Features include user authentication, payment integration, and admin dashboard.',
            'category' => 'Development',
            'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&h=300&fit=crop',
            'tags' => ['React', 'Node.js', 'MongoDB', 'Stripe']
        ]);
        \App\Models\Project::create([
            'title' => 'Youth Leadership Program',
            'description' => 'Designed and led a comprehensive leadership development program for 200+ young professionals, resulting in 85% completion rate and positive career outcomes.',
            'category' => 'Leadership',
            'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=300&fit=crop',
            'tags' => ['Leadership', 'Training', 'Mentorship', 'Community']
        ]);
        \App\Models\Project::create([
            'title' => 'Brand Digital Transformation',
            'description' => 'Led digital marketing strategy for a local business, increasing online presence by 300% and revenue by 150% within 6 months through targeted campaigns.',
            'category' => 'Marketing',
            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop',
            'tags' => ['Digital Marketing', 'SEO', 'Social Media', 'Analytics']
        ]);
    }
}
