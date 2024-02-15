<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminAndCoach
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('auth.login.show');
        }

        $role = auth()->user()->role;

        switch ($role) {
            case 'admin':
            case 'coach':
                return $next($request);
            case 'member':
                return redirect('/home');
            default:
                return abort(404);
        }
    }
}
