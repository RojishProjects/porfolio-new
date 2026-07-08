<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
file_put_contents('output_designs.json', json_encode(App\Models\GraphicDesign::all()->toArray(), JSON_PRETTY_PRINT));
echo "Done";
