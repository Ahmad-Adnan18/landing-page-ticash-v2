<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('AdminAuth middleware check', [
            'path' => $request->path(),
            'method' => $request->method(),
            'admin_logged_in' => session('admin_logged_in'),
            'route' => $request->route()?->getName()
        ]);

        // Check if the user is already authenticated via session
        if (session('admin_logged_in')) {
            \Log::info('User is authenticated, allowing access');
            return $next($request);
        }

        // Allow access to the login form (GET request to /admin/login)
        if ($request->routeIs('admin.login.form') || ($request->is('admin/login') && $request->isMethod('get'))) {
            \Log::info('Allowing access to login form');
            return $next($request);
        }

        \Log::info('User not authenticated, redirecting to login');
        // For other admin routes, redirect to login if not authenticated
        return redirect()->route('admin.login.form');
    }
}