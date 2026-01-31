<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // 2. Jika role TIDAK sesuai dengan yang diminta route
        if ($userRole !== $role) {
            
            // Jika dia admin tapi nyasar ke route user
            if ($userRole === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            // Jika dia user tapi nyasar ke route admin
            if ($userRole === 'user') {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}