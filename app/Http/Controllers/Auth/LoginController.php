<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
            // Connexion échouée
            return back()->withErrors([
                'email' => 'Les informations d\'identification sont incorrectes.',
            ])->onlyInput('email');
        }
        $request->session()->regenerate();
        return redirect()->intended(route('articles.publicIndex'))
            ->with('success', 'Vous êtes connecté avec succès.');
    }
}
