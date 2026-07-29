@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto py-6">

        {{-- Carte du Formulaire --}}
        <div
            class="bg-slate-900/90 border border-slate-800 rounded-xl p-8 shadow-2xl backdrop-blur-sm relative overflow-hidden">

            {{-- En-tête --}}
            <div class="mb-6 text-center space-y-2">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 font-mono text-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                    // user_registration
                </div>
                <h1 class="text-2xl font-bold font-mono text-slate-100 tracking-tight">
                    Créer un compte
                </h1>
                <p class="text-xs text-slate-400 font-sans">
                    Rejoins le terminal pour participer aux discussions.
                </p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Nom & Prénom côte à côte --}}
                <div class="grid grid-cols-2 gap-3">
                    {{-- Nom --}}
                    <div class="space-y-1.5">
                        <label for="lastname" class="block text-xs font-mono font-medium text-slate-300">
                            NOM <span class="text-cyan-400">*</span>
                        </label>
                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required
                            placeholder="Gely"
                            class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                        @error('lastname')
                            <p class="text-[11px] text-rose-400 font-mono mt-1">&gt; {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Prénom --}}
                    <div class="space-y-1.5">
                        <label for="firstname" class="block text-xs font-mono font-medium text-slate-300">
                            PRÉNOM <span class="text-cyan-400">*</span>
                        </label>
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required
                            placeholder="Gwladys"
                            class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                        @error('firstname')
                            <p class="text-[11px] text-rose-400 font-mono mt-1">&gt; {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Adresse Email --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-mono font-medium text-slate-300">
                        ADRESSE EMAIL <span class="text-cyan-400">*</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        placeholder="gwladys@example.com"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                    @error('email')
                        <p class="text-[11px] text-rose-400 font-mono mt-1">&gt; {{ $message }}</p>
                    @enderror
                </div>

                {{-- Mot de passe --}}
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-mono font-medium text-slate-300">
                        MOT DE PASSE <span class="text-cyan-400">*</span>
                    </label>
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                    @error('password')
                        <p class="text-[11px] text-rose-400 font-mono mt-1">&gt; {{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirmation du Mot de passe --}}
                <div class="space-y-1.5">
                    <label for="password_confirmation" class="block text-xs font-mono font-medium text-slate-300">
                        CONFIRMER LE MOT DE PASSE <span class="text-cyan-400">*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        placeholder="••••••••"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-lg text-slate-100 text-sm font-mono placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition">
                </div>

                {{-- Bouton d'action --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-mono text-xs font-bold transition-all shadow-lg shadow-cyan-500/20 active:scale-[0.99]">
                        &gt; execute_register()
                    </button>
                </div>
            </form>

            {{-- Pied de carte (Lien Connexion) --}}
            <div class="mt-6 pt-4 border-t border-slate-800/80 text-center text-xs font-mono text-slate-400">
                Déjà inscrit ?
                <a href="{{ route('login') }}" class="text-cyan-400 hover:underline">
                    // Se connecter
                </a>
            </div>

        </div>
    </div>
@endsection
