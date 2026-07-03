<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Si el usuario está inactivo, lo deslogueamos
            if (!Auth::user()->status) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'email' => 'Tu cuenta ha sido desactivada. Contacta al administrador.',
                ])->onlyInput('email');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'status' => true,
        ]);

        // Asignamos el rol 'Vendedor' por defecto (asumiendo que Spatie permissions está configurado y el rol existe)
        if (\Spatie\Permission\Models\Role::where('name', 'Vendedor')->exists()) {
            $user->assignRole('Vendedor');
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
