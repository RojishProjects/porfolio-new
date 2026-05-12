<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = \App\Models\Setting::where('key', 'system_status')->value('value');
        
        if ($status === 'maintenance') {
            // Exclude admin and login routes so the owner isn't locked out
            if (!$request->is('admin*') && !$request->is('login') && !$request->is('logout') && !$request->is('register')) {
                abort(503);
            }
        }
        
        return $next($request);
    }
}
