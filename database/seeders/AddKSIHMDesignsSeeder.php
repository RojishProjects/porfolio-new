<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GraphicDesign;

class AddKSIHMDesignsSeeder extends Seeder
{
    public function run(): void
    {
        $designs = [
            [
                'title' => 'KSIHM - To Do List After +2',
                'image' => 'uploads/designs/ksi_plus2.jpg',
                'description' => 'A professional social media advertisement poster designed for Kawasoti Institute of Hotel Management, targeting students who just completed their +2 exams.',
                'category' => 'Social Media Design',
                'tools' => ['Photoshop', 'Illustrator'],
                'is_hidden' => false,
            ],
            [
                'title' => 'KSIHM - To Do List After SEE',
                'image' => 'uploads/designs/ksi_see.jpg',
                'description' => 'A creative educational poster for Kawasoti Institute of Hotel Management, focused on guiding SEE graduates towards hospitality career paths.',
                'category' => 'Social Media Design',
                'tools' => ['Photoshop', 'Illustrator'],
                'is_hidden' => false,
            ],
            [
                'title' => 'KSIHM - If It\'s DHM then it is KSIHM',
                'image' => 'uploads/designs/ksi_dhm.jpg',
                'description' => 'A bold promotional poster highlighting the DHM program at Kawasoti Institute of Hotel Management with special discounts for +2 students.',
                'category' => 'Social Media Design',
                'tools' => ['Photoshop', 'Illustrator'],
                'is_hidden' => false,
            ],
            [
                'title' => 'KSIHM - Confused after +2?',
                'image' => 'uploads/designs/ksi_confused.jpg',
                'description' => 'An engaging career guidance poster for KSIHM, helping students choose the right path in hospitality management.',
                'category' => 'Social Media Design',
                'tools' => ['Photoshop', 'Illustrator'],
                'is_hidden' => false,
            ],
        ];

        foreach ($designs as $design) {
            GraphicDesign::updateOrCreate(
                ['title' => $design['title']],
                $design
            );
        }
    }
}
