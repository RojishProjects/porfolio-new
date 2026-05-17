<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Models\Project;
use App\Models\GraphicDesign;

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GraphicDesignController;

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutRoleController;
use App\Http\Controllers\Admin\MessageController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project}', [PortfolioController::class, 'showProject'])->name('project.show');
Route::get('/designs', [PortfolioController::class, 'designs'])->name('designs.index');
Route::get('/designs/{design}', [PortfolioController::class, 'showDesign'])->name('design.show');

Route::get('/sitemap.xml', function () {
    $projects = Project::where('is_hidden', false)->get();
    $designs = GraphicDesign::where('is_hidden', false)->get();

    $content = view('sitemap', compact('projects', 'designs'));
    return Response::make($content, 200, ['Content-Type' => 'application/xml']);
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    # Changed DashboardController namespace to Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::post('projects/{project}/toggle-visibility', [ProjectController::class, 'toggleVisibility'])->name('projects.toggle-visibility');
    
    Route::resource('designs', GraphicDesignController::class);
    Route::post('designs/{design}/toggle-visibility', [GraphicDesignController::class, 'toggleVisibility'])->name('designs.toggle-visibility');
    
    Route::resource('skills', SkillController::class);
    Route::resource('about-roles', AboutRoleController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::post('settings/toggle-status', [SettingController::class, 'toggleSystemStatus'])->name('settings.toggle-status');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
