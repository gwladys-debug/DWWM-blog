@extends('layouts.app')
@section('title', 'Liste des articles')

@section('content')

    <h1 class="text-3xl font-bold mb-7 text-black">Articles</h1>

    {{-- Formulaire de filtres dynamiques --}}
    {{-- Avant --}}
    <form method="GET" action="{{ route('articles.publicIndex') }}" ...>

        {{-- Après --}}
        <form method="GET" action="{{ url()->current() }}" ...>
            class="border border-black p-4 mb-7 flex flex-wrap gap-5 items-center">
            <span class="text-sm font-medium text-black">Filtres :</span>

            {{-- Filtre Catégories --}}
            <select name="category" onchange="this.form.submit()"
                class="px-3 py-1.5 border border-gray-400 bg-white text-xs min-w-[160px] focus:outline-none focus:border-black cursor-pointer">
                <option value="">Toutes les catégories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- Select Tags (prêt pour plus tard si besoin) --}}
            <select
                class="px-3 py-1.5 border border-gray-400 bg-white text-xs min-w-[160px] focus:outline-none cursor-not-allowed opacity-60"
                disabled>
                <option>Tous les tags</option>
            </select>

            {{-- Bouton de réinitialisation si un filtre est actif --}}
            @if (request('category'))
                {{-- Avant --}}
                <a href="{{ route('articles.publicIndex') }}" ...>

                    {{-- Après --}}
                    <a href="{{ url()->current() }}" ...>
                        class="text-xs font-semibold text-red-600 hover:underline border-l border-gray-300 pl-4">
                        ✕ Réinitialiser les filtres
                    </a>
            @endif
        </form>


        <div class="mt-8 flex justify-center">
            {{ $articles->links() }}
        </div>


    @endsection
