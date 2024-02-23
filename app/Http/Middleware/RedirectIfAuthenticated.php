<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->roles;

            switch ($role) {
                case 1:
                    return redirect('/waka_dashboard');
                    break;
                case 2:
                    return redirect('/pembina_dashboard');
                    break;
                case 3:
                    return redirect('/ketua_dashboard');
                    break;
                case 4:
                    return redirect('/guru_dashboard');
                    break;
                case 5:
                    return redirect('/siswa_dashboard');
                    break;
            }
        }

        return $next($request);
    }
}
