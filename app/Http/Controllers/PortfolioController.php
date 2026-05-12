<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Skill;
use App\Models\AboutRole;
use App\Models\Project;
use App\Models\GraphicDesign;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $skills = Skill::orderBy('category')->get()->groupBy('category');
        $about_roles = AboutRole::all();
        
        $totalProjects = Project::where('is_hidden', false)->count();
        $projects = Project::where('is_hidden', false)->latest()->take(6)->get();
        
        $totalDesigns = GraphicDesign::where('is_hidden', false)->count();
        $designs = GraphicDesign::where('is_hidden', false)->latest()->take(6)->get();

        return view('portfolio', compact('settings', 'skills', 'about_roles', 'projects', 'designs', 'totalProjects', 'totalDesigns'));
    }

    public function projects()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $projects = Project::where('is_hidden', false)->latest()->get();
        return view('projects', compact('settings', 'projects'));
    }

    public function designs()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $designs = GraphicDesign::where('is_hidden', false)->latest()->get();
        return view('designs', compact('settings', 'designs'));
    }

    public function showProject(Project $project)
    {
        if ($project->is_hidden) {
            abort(404);
        }
        $settings = Setting::all()->pluck('value', 'key');
        return view('project-details', compact('project', 'settings'));
    }

    public function showDesign(GraphicDesign $design)
    {
        if ($design->is_hidden) {
            abort(404);
        }
        $settings = Setting::all()->pluck('value', 'key');
        return view('design-details', compact('design', 'settings'));
    }
}
