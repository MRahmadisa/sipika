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
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Memeriksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Memeriksa peran pengguna
        $user = Auth::user();
        foreach ($roles as $role) {
            if ($user->role === $role) {
                return $next($request);
            }
        }

        // Jika peran pengguna tidak sesuai, redirect ke halaman tertentu atau beri pesan error
        return redirect('/')->withErrors(['Unauthorized']);
    }
}
