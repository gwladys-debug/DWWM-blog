<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * 1. Afficher le formulaire d'inscription
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * 2. Traiter l'inscription
     */
    public function store(Request $request)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'lastname' => 'required|string|max:50',
            'firstname' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur en BDD (Mot de passe haché !)
        $user = User::create([
            'lastname' => $validated['lastname'],
            'firstname' => $validated['firstname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Connecter directement l'utilisateur après inscription
        Auth::login($user);

        // Redirection vers la liste des articles avec message de succès
        return redirect()->route('articles.publicIndex')
            ->with('success', 'Bienvenue ! Votre compte a été créé avec succès.');
    }
}
