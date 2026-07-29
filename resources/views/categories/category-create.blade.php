@extends('layouts.app')

@section('content')
    {{-- Style d'urgence pour écraser tout conteneur blanc hérité --}}
    <style>
        /* Forcer la transparence sur les blocs parents indésirables */
        .bg-white,
        .card,
        div[class*="white"] {
            background-color: transparent !important;
            box-shadow: none !important;
            border: none !important;
        }
    </style>

    <div class="max-w-4xl mx-auto space-y-6 pt-4">

        {{-- En-tête visible --}}
        <div class="flex items-center justify-between pb-2 border-b border-slate-800">
            <h1 class="text-2xl font-bold font-mono text-cyan-400">
                <span class="text-slate-500">~/categories/</span>nouvelle
            </h1>
            <a href="{{ route('categories.index') }}"
                class="text-sm font-mono text-slate-400 hover:text-cyan-400 transition-colors">
                &larr; Retour à la liste
            </a>
        </div>

        {{-- Formulaire sombre IDE --}}
        <div class="bg-[#0b0f19] border border-slate-800/80 rounded-xl p-8 shadow-2xl !bg-[#0b0f19]">
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Nom de la catégorie --}}
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-mono text-slate-200 font-semibold">
                        <span class="text-cyan-400">#</span> Nom de la catégorie <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full bg-[#05070d] text-slate-200 border border-slate-800 rounded-lg px-4 py-3 text-sm font-mono focus:border-cyan-500 focus:outline-none placeholder-slate-600 shadow-inner"
                        placeholder="ex: Web Dev">
                    @error('name')
                        <p class="text-rose-400 text-xs font-mono mt-1">// {{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="space-y-2">
                    <label for="slug" class="block text-sm font-mono text-slate-200 font-semibold">
                        <span class="text-cyan-400">#</span> Slug (URL)
                    </label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        class="w-full bg-[#05070d] text-slate-200 border border-slate-800 rounded-lg px-4 py-3 text-sm font-mono focus:border-cyan-500 focus:outline-none placeholder-slate-600 shadow-inner"
                        placeholder="ex: web-dev">
                    <p class="text-xs font-mono text-slate-500">// Personnalisez l'URL ou laissez vide pour une génération
                        automatique.</p>
                    @error('slug')
                        <p class="text-rose-400 text-xs font-mono mt-1">// {{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="{{ route('categories.index') }}"
                        class="px-6 py-2.5 rounded-lg border border-slate-700/60 bg-[#0f1523] text-slate-300 font-mono text-xs font-bold hover:bg-slate-800 transition-all uppercase tracking-wider">
                        ANNULER
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-black text-white border border-slate-700 font-mono text-xs font-bold hover:bg-slate-900 transition-all uppercase tracking-wider shadow-lg">
                        ENREGISTRER
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
