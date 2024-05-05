<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->is_employee) {
                // Als de gebruiker een werknemer is, stuur ze naar het dashboard voor werknemers
                return redirect()->route('employee.dashboard');
            } else {
                // Als de gebruiker een klant is, stuur ze naar het dashboard voor klanten
                return redirect()->route('home');
            }
        }

        throw ValidationException::withMessages([
            'username' => ['De ingevoerde gegevens komen niet overeen met de opgeslagen gegevens.'],
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required|in:customer,employee', // Controleer of de rol geldig is
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_employee = $request->role === 'employee'; // Stel het veld is_employee in op true als de rol een werknemer is
        $user->save();

        // Log de gebruiker automatisch in na registratie
        Auth::login($user);

        // Stuur de gebruiker door naar het juiste dashboard op basis van de rol
        if ($user->is_employee) {
            return redirect()->route('employee.dashboard');
        } else {
            return redirect()->route('customer.dashboard');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.get');
    }
}
