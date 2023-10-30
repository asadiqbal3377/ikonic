<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\AdminController;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response 
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->type === 'admin') {
                    return $next($request);
                } else {
                    return redirect('/'); // Redirect non-admin users
                }
            }
        }
    
        return $next($request);

        
    }
}