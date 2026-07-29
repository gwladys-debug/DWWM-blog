<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Tentative de connexion
        if (!Auth::attempt($validated)) {
            return back()->withErrors([
                'email' => 'Les informations d\'identification sont incorrectes.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('articles.publicIndex'))
            ->with('success', 'Vous êtes connecté avec succès.');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Vous êtes déconnecté avec succès.');
    }
}
