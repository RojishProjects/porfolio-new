<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\GraphicDesign;

class MoreProjectsSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'title' => 'National Youth Summit 2026',
                'description' => 'Organized a large-scale summit connecting 500+ youth leaders across the nation. Featured 20+ speakers and 5 interactive workshops focused on civic engagement and tech-driven social change.',
                'category' => 'Youth Program',
                'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?w=800&q=80',
                'tags' => ['Event Management', 'Leadership', 'Public Speaking'],
                'icon' => 'globe'
            ],
            [
                'title' => 'TechMinds Hackathon',
                'description' => 'A 48-hour hackathon focused on sustainable tech solutions. Partnered with local tech firms to provide mentorship and resources for high school and university students.',
                'category' => 'Tech & Youth',
                'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&q=80',
                'tags' => ['Mentorship', 'Hackathon', 'Tech Education'],
                'icon' => 'code'
            ],
            [
                'title' => 'NextGen Digital Marketing Campaign',
                'description' => 'Developed and executed a highly targeted social media campaign for a youth-focused NGO. Increased online engagement by 400% and volunteer sign-ups by 150% over a 3-month period.',
                'category' => 'Marketing',
                'image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=800&q=80',
                'tags' => ['Social Media', 'Analytics', 'Content Strategy'],
                'icon' => 'trending-up'
            ],
            [
                'title' => 'Code for Community App',
                'description' => 'Led a team of junior developers to build a mobile app connecting local volunteers with community service opportunities. Built using React Native and Firebase.',
                'category' => 'Tech',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80',
                'tags' => ['React Native', 'Firebase', 'Mobile Development'],
                'icon' => 'smartphone'
            ],
            [
                'title' => 'EmpowerYouth Podcast Series',
                'description' => 'Produced and marketed a 10-episode podcast series featuring interviews with young entrepreneurs and tech innovators. Reached over 10,000 listeners in the first month.',
                'category' => 'Marketing & Youth',
                'image' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?w=800&q=80',
                'tags' => ['Podcasting', 'Audio Production', 'Digital Marketing'],
                'icon' => 'mic'
            ],
            [
                'title' => 'AI Basics for High Schoolers',
                'description' => 'Designed a curriculum and taught a 4-week introductory course on Artificial Intelligence and Machine Learning to high school students, using Python and simple ML libraries.',
                'category' => 'Tech & Youth',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&q=80',
                'tags' => ['Education', 'Python', 'AI/ML Basics'],
                'icon' => 'cpu'
            ],
            [
                'title' => 'Startup Brand Overhaul',
                'description' => 'Complete re-branding and marketing strategy execution for a promising tech startup. Included logo design consultation, website copywriting, and launch strategy.',
                'category' => 'Marketing',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&q=80',
                'tags' => ['Brand Strategy', 'Copywriting', 'SEO'],
                'icon' => 'star'
            ],
            [
                'title' => 'Rural Tech Outreach Program',
                'description' => 'Initiated a program bringing refurbished laptops and basic coding workshops to underserved rural schools, bridging the digital divide for over 200 children.',
                'category' => 'Youth Program & Tech',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&q=80',
                'tags' => ['Social Impact', 'Logistics', 'Basic IT'],
                'icon' => 'heart'
            ]
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        $designs = [
            [
                'title' => 'Youth Summit Branding',
                'description' => 'Complete visual identity for the National Youth Summit, including logos, banners, and social media kits.',
                'category' => 'Branding',
                'image' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?w=800&q=80',
                'tools' => ['Illustrator', 'Photoshop']
            ],
            [
                'title' => 'Tech NGO Social Media Templates',
                'description' => 'A set of 30+ reusable social media templates designed for a tech education NGO to maintain brand consistency.',
                'category' => 'Social Media',
                'image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=800&q=80',
                'tools' => ['Figma', 'Canva']
            ],
            [
                'title' => 'Community App UI/UX',
                'description' => 'User interface and experience design for the Code for Community mobile application.',
                'category' => 'UI/UX',
                'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&q=80',
                'tools' => ['Figma', 'Adobe XD']
            ],
            [
                'title' => 'Marketing Campaign Posters',
                'description' => 'High-impact print and digital posters for the NextGen Digital Marketing Campaign.',
                'category' => 'Print Design',
                'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?w=800&q=80',
                'tools' => ['InDesign', 'Photoshop']
            ],
            [
                'title' => 'Podcast Cover Art',
                'description' => 'Eye-catching cover artwork designed specifically for the EmpowerYouth podcast series across all major platforms.',
                'category' => 'Illustration',
                'image' => 'https://images.unsplash.com/photo-1614680376593-902f74cf0d41?w=800&q=80',
                'tools' => ['Procreate', 'Illustrator']
            ],
            [
                'title' => 'Startup Pitch Deck Design',
                'description' => 'A clean, modern, and persuasive 15-slide pitch deck designed for a local tech startup seeking seed funding.',
                'category' => 'Presentation',
                'image' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80',
                'tools' => ['PowerPoint', 'Illustrator']
            ],
            [
                'title' => 'AI Course Infographics',
                'description' => 'A series of 5 educational infographics breaking down complex AI concepts into easy-to-understand visuals for high schoolers.',
                'category' => 'Information Design',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80',
                'tools' => ['Illustrator', 'Figma']
            ]
        ];

        foreach ($designs as $designData) {
            GraphicDesign::create($designData);
        }
    }
}
