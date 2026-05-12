<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'tags' => 'nullable|string',
            'image_upload' => 'nullable|image|max:4096',
            'image_url' => 'nullable|url',
            'project_url' => 'nullable|url',
            'icon' => 'nullable|string',
        ]);

        $tags = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        $imagePath = $validated['image_url'] ?? null;

        if ($request->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('projects', 'public');
            $imagePath = '/storage/' . $path;
        }

        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'tags' => $tags,
            'image' => $imagePath,
            'project_url' => $validated['project_url'] ?? null,
            'icon' => $validated['icon'] ?? 'code',
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'tags' => 'nullable|string',
            'image_upload' => 'nullable|image|max:4096',
            'image_url' => 'nullable|url',
            'project_url' => 'nullable|url',
            'icon' => 'nullable|string',
        ]);

        $tags = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        $imagePath = $validated['image_url'] ?? $project->image;

        if ($request->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('projects', 'public');
            $imagePath = '/storage/' . $path;
        }

        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'tags' => $tags,
            'image' => $imagePath,
            'project_url' => $validated['project_url'] ?? null,
            'icon' => $validated['icon'] ?? 'code',
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function toggleVisibility(Request $request, Project $project)
    {
        $project->update(['is_hidden' => !$project->is_hidden]);
        
        $status = $project->is_hidden ? 'hidden' : 'visible';
        
        if ($request->wantsJson()) {
            return response()->json(['status' => $status, 'is_hidden' => $project->is_hidden]);
        }
        
        return back()->with('success', "Project is now {$status}.");
    }
}
