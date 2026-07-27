@extends('layouts.app')
@section('title', 'Liste des articles')

@section('content')

    <h1 class="text-3xl font-bold mb-7 text-black">Articles</h1>

    {{-- Formulaire de filtres dynamiques --}}
    <form method="GET" action="{{ url()->current() }}"
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

        {{-- Select Tags --}}
        <select
            class="px-3 py-1.5 border border-gray-400 bg-white text-xs min-w-[160px] focus:outline-none cursor-not-allowed opacity-60"
            disabled>
            <option>Tous les tags</option>
        </select>

        {{-- Bouton de réinitialisation si un filtre est actif --}}
        @if (request('category'))
            <a href="{{ url()->current() }}"
                class="text-xs font-semibold text-red-600 hover:underline border-l border-gray-300 pl-4">
                ✕ Réinitialiser les filtres
            </a>
        @endif
    </form>


    {{-- 👇👇 CI-DESSOUS : LE BLOC À RAJOUTER 👇👇 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-8">
        @forelse ($articles as $article)
            <div class="border border-gray-300 p-5 rounded bg-white shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold uppercase text-indigo-600 tracking-wider">
                        {{ $article->category->name ?? 'Sans catégorie' }}
                    </span>
                    <h2 class="text-xl font-bold text-black mt-2">
                        <a href="{{ route('articles.show', $article->slug) }}" class="hover:underline">
                            {{ $article->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 text-sm mt-2 line-clamp-3">
                        {{ Str::limit($article->content, 120) }}
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between text-xs text-gray-500">
                    <span>Par {{ $article->user->name ?? 'Auteur' }}</span>
                    <span>{{ $article->created_at?->format('d/m/Y') }}</span>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500 py-10">
                Aucun article publié à afficher dans cette catégorie.
            </p>
        @endforelse
    </div>
    {{-- 👆👆 FIN DU BLOC À RAJOUTER 👆👆 --}}


    {{-- Liens de pagination --}}
    <div class="mt-8 flex justify-center">
        {{ $articles->links() }}
    </div>

@endsection
