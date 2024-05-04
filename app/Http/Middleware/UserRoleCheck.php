<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Controleer of de gebruiker is ingelogd
        if (!auth()->check()) {
            // Als de gebruiker niet is ingelogd, stuur ze naar de inlogpagina
            return redirect()->route('login.get');
        }

        // Controleer de rol van de gebruiker
        if ($role === 'customer' && auth()->user()->is_employee === false) {
            // Als de gebruiker een klant is, ga verder met de volgende request
            return $next($request);
        } elseif ($role === 'employee' && auth()->user()->is_employee === true) {
            // Als de gebruiker een werknemer is, ga verder met de volgende request
            return $next($request);
        }

        // Als de gebruiker niet de juiste rol heeft, stuur ze naar de homepagina
        return redirect()->route('home');
    }
}
