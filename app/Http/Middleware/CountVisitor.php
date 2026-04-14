<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;


class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // INI UNTUK HITUNG ASKES HALAMAN  IP TERHITUNG 1
    public function handle(Request $request, Closure $next): Response
    {
      
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $page_url = $request->url();



        $alreadyVisited = Visitor::where('ip_address', $ip)
            ->where('page_url', $page_url)
            ->whereDate('visited_at', now()->toDateString())
            ->exists();

        if (! $alreadyVisited) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'page_url' => $page_url,
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
    // INI UNTUK AKSES BANYAK HALAMAN TERHITUNG SESUAI BANYAKNYA
//     public function handle(Request $request, Closure $next): Response
// {
//     Visitor::create([
//         'ip_address' => $request->ip(),
//         'user_agent' => $request->userAgent(),
//         'page_url'   => $request->url(),
//         'visited_at' => now(),
//     ]);

//     return $next($request);
// }

}
