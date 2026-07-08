<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/designs', 'GET');
$response = $kernel->handle($request);
file_put_contents('test_response.html', $response->getContent());
echo $response->getStatusCode();
