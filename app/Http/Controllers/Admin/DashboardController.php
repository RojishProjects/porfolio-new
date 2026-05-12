<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\GraphicDesign;
use App\Models\Message;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects_count' => Project::count(),
            'designs_count' => GraphicDesign::count(),
            'messages_unread' => Message::where('is_read', false)->count(),
            'skills_count' => Skill::count(),
        ];

        $recent_messages = Message::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recent_messages'));
    }
}
