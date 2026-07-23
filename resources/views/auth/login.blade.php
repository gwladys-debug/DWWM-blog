@extends('layouts.app')
@section('title', 'Se connecter')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center items-center px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-sm border border-slate-200">

            {{-- En-tête --}}
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-slate-900 mb-2">Se connecter</h1>
                <p class="text-sm text-slate-500">Accédez à votre espace d'administration</p>
            </div>

            {{-- Formulaire --}}
            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf

                {{-- Adresse E-mail --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                        Adresse e-mail
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="exemple@domaine.com"
                        class="w-full px-4 py-2.5 text-sm rounded-lg border @error('email') border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-900 focus:ring-slate-900 @enderror focus:outline-none focus:ring-1 transition">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Mot de passe --}}
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-slate-700">
                            Mot de passe
                        </label>
                    </div>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                        class="w-full px-4 py-2.5 text-sm rounded-lg border @error('password') border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-900 focus:ring-slate-900 @enderror focus:outline-none focus:ring-1 transition">
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bouton de soumission --}}
                <button type="submit"
                    class="w-full mt-2 py-3 px-4 bg-slate-900 text-white font-medium text-sm rounded-lg hover:bg-slate-800 transition duration-150 cursor-pointer shadow-sm">
                    Se connecter
                </button>
            </form>

            {{-- Lien vers l'inscription --}}
            <div class="mt-6 text-center text-xs text-slate-500">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="font-semibold text-slate-900 hover:underline">
                    S'inscrire
                </a>
            </div>

        </div>
    </div>
@endsection
