<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCoach
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
            case 'coach':
                return $next($request);
            case 'admin':
            case 'member':
                return redirect('/home');
            default:
                return abort(404);
        }
    }
}
