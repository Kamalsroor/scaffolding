<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class SetSanctumGuard
{
    public function handle($request, Closure $next)
    {


        if (Str::startsWith($request->getRequestUri(), '/api/')) {
            config(['auth.defaults.guard' => 'admin']);
            config(['sanctum.guard' => 'admin']);
        }
        // else if (Str::startsWith($request->getRequestUri(), '/api')) {
        //     config(['auth.defaults.guard' => 'web']);
        //     config(['sanctum.guard' => 'web']);
        // }

        return $next($request);
    }
}
