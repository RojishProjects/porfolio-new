<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $html = view('designs', [
        'settings' => App\Models\Setting::all()->pluck('value', 'key'),
        'designs' => App\Models\GraphicDesign::where('is_hidden', false)->latest()->get()
    ])->render();
    file_put_contents('rendered_designs.html', $html);
    echo "Success: HTML generated";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine();
}
