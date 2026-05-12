<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('hero_image')) {
            // Save the file to public/storage/hero and store the path
            $path = $request->file('hero_image')->store('hero', 'public');
            $data['hero_image'] = '/storage/' . $path;
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }

    public function toggleSystemStatus(Request $request)
    {
        $status = Setting::where('key', 'system_status')->value('value');
        $newStatus = ($status === 'maintenance') ? 'live' : 'maintenance';
        
        Setting::updateOrCreate(['key' => 'system_status'], ['value' => $newStatus]);
        
        if ($request->wantsJson()) {
            return response()->json(['status' => $newStatus]);
        }
        
        return back()->with('success', "System status updated to {$newStatus}.");
    }
}
