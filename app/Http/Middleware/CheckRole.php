<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$roles): Response
    {
        // Log::info('CheckRole middleware called with roles: ', $roles);
        $roles = explode('|', $roles);
        if (!in_array(auth()->user()->role, $roles)) {
            return redirect('/'); // Redirect ke halaman utama atau halaman lain jika akses ditolak
        }
        return $next($request);

    }
}