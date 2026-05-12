<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutRole;
use Illuminate\Http\Request;

class AboutRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = AboutRole::all();
        return view('admin.about-roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about-roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'key_areas' => 'nullable|array',
            'key_areas.*' => 'nullable|string',
        ]);

        // Filter out empty key areas
        $keyAreas = array_filter($request->key_areas ?? []);

        AboutRole::create([
            'title' => $request->title,
            'description' => $request->description,
            'key_areas' => $keyAreas,
        ]);

        return redirect()->route('admin.about-roles.index')
            ->with('success', 'Role profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutRole $aboutRole)
    {
        return view('admin.about-roles.show', compact('aboutRole'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutRole $aboutRole)
    {
        return view('admin.about-roles.edit', compact('aboutRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutRole $aboutRole)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'key_areas' => 'nullable|array',
            'key_areas.*' => 'nullable|string',
        ]);

        // Filter out empty key areas
        $keyAreas = array_filter($request->key_areas ?? []);

        $aboutRole->update([
            'title' => $request->title,
            'description' => $request->description,
            'key_areas' => $keyAreas,
        ]);

        return redirect()->route('admin.about-roles.index')
            ->with('success', 'Role profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutRole $aboutRole)
    {
        $aboutRole->delete();

        return redirect()->route('admin.about-roles.index')
            ->with('success', 'Role profile removed.');
    }
}
