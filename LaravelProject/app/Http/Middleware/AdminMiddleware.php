<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the admin role
        if (!Auth::check() || Auth::user()->role != 'admin') {
            // Redirect with error message if user is not authorized
            return redirect('/')->with('error', 'You are not authorized.');
        }

        // Proceed with the request if the user is authorized
        return $next($request);
    }
}

