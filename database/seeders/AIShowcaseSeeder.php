<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;
use App\Models\GraphicDesign;

class AIShowcaseSeeder extends Seeder
{
    public function run(): void
    {
        // Add AI-related Skills
        $skills = [
            ['name' => 'Machine Learning', 'category' => 'AI & Data Science', 'percentage' => 85],
            ['name' => 'Neural Networks', 'category' => 'AI & Data Science', 'percentage' => 80],
            ['name' => 'Generative AI (LLMs)', 'category' => 'AI & Data Science', 'percentage' => 95],
            ['name' => 'Computer Vision', 'category' => 'AI & Data Science', 'percentage' => 75],
            ['name' => 'Prompt Engineering', 'category' => 'AI & Data Science', 'percentage' => 90],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // Add AI Projects
        $projects = [
            [
                'title' => 'AI Portfolio Architect',
                'description' => 'A cutting-edge platform that uses Large Language Models to automatically generate professional portfolios from a simple bio. Built with Laravel, OpenAI API, and React.',
                'image' => 'uploads/ai/ai_portfolio_gen.png',
                'tags' => ['Laravel', 'OpenAI', 'React', 'Tailwind'],
                'category' => 'Web Application',
                'project_url' => 'https://github.com/rojish/ai-portfolio',
                'icon' => 'brain'
            ],
            [
                'title' => 'HealthVision AI',
                'description' => 'An intelligent diagnostic tool that uses Computer Vision to analyze medical reports and provide preliminary health insights. Focused on accessibility and speed.',
                'image' => 'uploads/ai/health_ai.png',
                'tags' => ['Python', 'TensorFlow', 'FastAPI'],
                'category' => 'Medical AI',
                'project_url' => 'https://github.com/rojish/health-vision',
                'icon' => 'heartbeat'
            ],
            [
                'title' => 'LingoBridge Live',
                'description' => 'Real-time speech-to-speech translation app using advanced NLP models. Break language barriers instantly during meetings or travel.',
                'image' => 'uploads/ai/translation_ai.png',
                'tags' => ['Transformers', 'PyTorch', 'Next.js'],
                'category' => 'Communication',
                'project_url' => 'https://github.com/rojish/lingo-bridge',
                'icon' => 'translate'
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['title' => $project['title']], $project);
        }

        // Add AI Designs
        $designs = [
            [
                'title' => 'Nexus UI: AI Dashboard',
                'description' => 'A futuristic dashboard concept for managing distributed AI clusters. Features glassmorphism and real-time data visualizations.',
                'image' => 'uploads/ai/futuristic_ui_design.png',
                'category' => 'UI/UX Design',
                'tools' => ['Figma', 'Adobe XD', 'Illustrator'],
            ],
            [
                'title' => 'Cerebra AI Branding',
                'description' => 'Brand identity design for a cognitive computing startup. The logo represents the intersection of human intuition and artificial intelligence.',
                'image' => 'uploads/ai/ai_logo_concept.png',
                'category' => 'Branding',
                'tools' => ['Photoshop', 'Illustrator'],
            ],
        ];

        foreach ($designs as $design) {
            GraphicDesign::updateOrCreate(['title' => $design['title']], $design);
        }
    }
}
