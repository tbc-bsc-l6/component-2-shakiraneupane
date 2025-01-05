<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): \Symfony\Component\HttpFoundation\Response  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and has the 'customer' role
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request); // Continue the request
        }

        // If not a customer, redirect to the home page
        return redirect()->route('home')->withErrors(['message' => 'Access denied for this user.']);
    }
}
