<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user=Auth::user();

        //solo SuperAdmin puede acceder a compañias
        if (!$user || !$user->hasRole('SuperAdmin')) {
            // Si el usuario no es SuperAdmin, redirigir o mostrar un error
            abort(403, 'Acceso no autorizado.');
        }
        dd("AdminMiddleware ejecutado.");

        return $next($request);
    }
}
