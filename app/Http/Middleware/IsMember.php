<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMember
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
            case 'member':
                return $next($request);
            case 'admin':
            case 'coach':
                return redirect('/home');
            default:
                return abort(404);
        }
    }
}
