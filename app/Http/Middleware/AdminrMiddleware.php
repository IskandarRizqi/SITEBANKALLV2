<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminrMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
       
        
        if (!Auth::check()) {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->role == 0) {
            return $next($request);
            // return redirect('/salamprofit/banner');
        }
        if ($request->path() == 'salamprofit/logout') {
            return $next($request);
        }
        return redirect('/pengaduan')->with('info','Anda sudah login sebagai user');
    }
}
