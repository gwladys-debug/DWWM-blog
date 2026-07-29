@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto py-10">

        <div
            class="bg-slate-900/90 border border-slate-800 rounded-xl p-8 shadow-2xl backdrop-blur-sm relative overflow-hidden">

            {{-- En-tête --}}
            <div class="mb-6 text-center space-y-2">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 font-mono text-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                    // user_authentication
                </div>
                <h1 class="text-2xl font-bold font-mono text-slate-100 tracking-tight">
                    Connexion
                </h1>
                <p class="text-xs text-slate-400">
                    Accédez à votre espace développeur
                </p>
            </div>

            {{-- Affichage des erreurs de connexion --}}
            @if ($errors->any())
                <div
                    class="mb-5 p-3 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-mono space-y-1">
                    @foreach ($errors->all() as $error)
                        <p>&gt; {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Formulaire avec la route exacte login.store --}}
            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-mono font-medium text-slate-300">
                        ADRESSE EMAIL <span class="text-cyan-400">*</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        placeholder="gwladysgely@gmail.com"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                </div>

                {{-- Mot de passe --}}
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-mono font-medium text-slate-300">
                        MOT DE PASSE <span class="text-cyan-400">*</span>
                    </label>
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                </div>

                {{-- Bouton de soumission --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-mono text-xs font-bold transition-all shadow-lg shadow-cyan-500/20 active:scale-[0.99]">
                        &gt; connect()
                    </button>
                </div>
            </form>

            {{-- Footer --}}
            <div class="mt-6 pt-4 border-t border-slate-800/80 text-center text-xs font-mono text-slate-400">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-cyan-400 hover:underline">
                    // S'inscrire
                </a>
            </div>

        </div>
    </div>
@endsection
