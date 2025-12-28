<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        // Mengecek apakah user sudah login
        if (!Auth::check()) {
            abort(403, 'Akses ditolak');
        }

        // Mengecek apakah role user sesuai dengan role yang diizinkan
        if (strtolower(Auth::user()->role) !== strtolower($role)) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
