<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleCheck
{    
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $userRole = session('user_role');

            if (in_array($userRole, explode('|', $role))) {
                return $next($request);
            } else {
                if ($userRole === 'FOV4Qtgi5lcQ9kZ') {
                    return redirect()->route('landingcompany')->with('message', 'Anu gk bisa akses.');
                } 
                return redirect()->route('index')->with('message', 'Anu gk bisa akses.');
            }
        } else {
            return $next($request);
        }

    }

}
