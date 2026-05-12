<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Automatically clean up stale Vite hot file if the dev server is unreachable
        if (app()->environment('local') && \Illuminate\Support\Facades\File::exists(public_path('hot'))) {
            try {
                $url = rtrim(\Illuminate\Support\Facades\File::get(public_path('hot')), '/');
                $parts = parse_url($url);
                $host = $parts['host'] ?? '127.0.0.1';
                $port = $parts['port'] ?? 5173;

                $fp = @fsockopen($host, $port, $errno, $errstr, 0.1);
                if ($fp) {
                    fclose($fp);
                } else {
                    \Illuminate\Support\Facades\File::delete(public_path('hot'));
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\File::delete(public_path('hot'));
            }
        }
    }
}
