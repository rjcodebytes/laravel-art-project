<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $admin = auth('admin')->user();

        if ($admin && $admin->usertype === 'admin') {
            return $next($request);
        }

        // redirect to the correct admin login route
        return redirect()->route('admin.login')->withErrors('Access denied. Please login as admin.');
    }
}

