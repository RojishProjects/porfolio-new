<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraphicDesign;
use Illuminate\Http\Request;

class GraphicDesignController extends Controller
{
    public function index()
    {
        $designs = GraphicDesign::latest()->get();
        return view('admin.designs.index', compact('designs'));
    }

    public function create()
    {
        return view('admin.designs.create');
    }

    public function show(GraphicDesign $design)
    {
        return view('admin.designs.show', compact('design'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_upload' => 'nullable|image|max:4096',
            'image_url' => 'nullable|url',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'tools' => 'nullable|string',
        ]);

        $tools = $request->tools ? array_map('trim', explode(',', $request->tools)) : [];
        $imagePath = $validated['image_url'] ?? null;

        if ($request->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('designs', 'public');
            $imagePath = '/storage/' . $path;
        }

        GraphicDesign::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'tools' => $tools,
        ]);

        return redirect()->route('admin.designs.index')->with('success', 'Design created successfully.');
    }

    public function edit(GraphicDesign $design)
    {
        return view('admin.designs.edit', compact('design'));
    }

    public function update(Request $request, GraphicDesign $design)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_upload' => 'nullable|image|max:4096',
            'image_url' => 'nullable|url',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'tools' => 'nullable|string',
        ]);

        $tools = $request->tools ? array_map('trim', explode(',', $request->tools)) : [];
        $imagePath = $validated['image_url'] ?? $design->image;

        if ($request->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('designs', 'public');
            $imagePath = '/storage/' . $path;
        }

        $design->update([
            'title' => $validated['title'],
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'tools' => $tools,
        ]);

        return redirect()->route('admin.designs.index')->with('success', 'Design updated successfully.');
    }

    public function destroy(GraphicDesign $design)
    {
        $design->delete();
        return redirect()->route('admin.designs.index')->with('success', 'Design deleted successfully.');
    }

    public function toggleVisibility(Request $request, GraphicDesign $design)
    {
        $design->update(['is_hidden' => !$design->is_hidden]);
        
        $status = $design->is_hidden ? 'hidden' : 'visible';
        
        if ($request->wantsJson()) {
            return response()->json(['status' => $status, 'is_hidden' => $design->is_hidden]);
        }
        
        return back()->with('success', "Design is now {$status}.");
    }
}
