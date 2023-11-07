<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $userRole = session('user_role');

            if ($userRole === 'BfiwyVUDrXOpmStr') {
                // Jika peran adalah 'user', lanjutkan permintaan.
                return $next($request);
            } elseif ($userRole === 'FOV4Qtgi5lcQ9kZ') {
                // Jika peran adalah 'company', redirect ke rute yang sesuai.
                return redirect()->route('landing');
            }
        }

        // Jika pengguna belum terotentikasi atau peran tidak ada, redirect ke halaman login dengan pesan kesalahan.
        return redirect()->route('login')->with('message', 'Authentication Error.');
    }
}
