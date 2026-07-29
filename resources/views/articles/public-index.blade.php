@extends('layouts.app')

@section('content')
    <div class="space-y-8">

        {{-- En-tête de page --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-800 pb-6">
            <div>
                <h1 class="text-3xl font-black font-mono text-slate-100 tracking-tight flex items-center gap-3">
                    <span class="text-cyan-400">//</span> Articles
                </h1>
                <p class="text-xs font-mono text-slate-400 mt-1">Découvrez nos derniers tutoriels et réflexions dev.</p>
            </div>
        </div>

        {{-- 🔍 BARRE DE FILTRES STYLE SOMBRE --}}
        <div
            class="bg-slate-900/90 border border-slate-800 rounded-xl p-4 backdrop-blur-xl flex flex-wrap items-center gap-4 mb-8">
            <span class="text-xs font-mono text-slate-300 font-semibold flex items-center gap-1">
                <span class="text-cyan-400">#</span> Filtres :
            </span>

            {{-- Select Catégories --}}
            <select name="category" style="background-color: #020617; color: #f8fafc;"
                class="bg-slate-950 text-slate-100 border border-slate-700/80 rounded-lg px-3 py-2 text-xs font-mono focus:border-cyan-400 focus:outline-none cursor-pointer">
                <option value="" class="bg-slate-900 text-slate-300">Toutes les catégories</option>
                @if (isset($categories))
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="bg-slate-900 text-slate-100">
                            {{ $category->name }}
                        </option>
                    @endforeach
                @endif
            </select>

            {{-- Select Tags --}}
            <select name="tag" style="background-color: #020617; color: #f8fafc;"
                class="bg-slate-950 text-slate-100 border border-slate-700/80 rounded-lg px-3 py-2 text-xs font-mono focus:border-cyan-400 focus:outline-none cursor-pointer">
                <option value="" class="bg-slate-900 text-slate-300">Tous les tags</option>
            </select>
        </div>

        {{-- 📚 GRILLE DES ARTICLES (CARTE SOMBRE IDE) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($articles as $article)
                <article
                    class="bg-slate-900/90 border border-slate-800 rounded-2xl p-6 backdrop-blur-xl shadow-xl flex flex-col justify-between hover:border-slate-700 hover:shadow-cyan-500/5 transition duration-200 group">

                    <div>
                        {{-- Badge Catégorie --}}
                        <div class="flex items-center justify-between mb-3">
                            <span
                                class="text-[10px] font-mono font-bold tracking-wider uppercase px-2.5 py-1 rounded-md bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                                {{ $article->category->name ?? 'DÉVELOPPEMENT WEB' }}
                            </span>
                        </div>

                        {{-- Titre de l'article --}}
                        <h2
                            class="text-lg font-bold text-slate-100 group-hover:text-cyan-400 transition line-clamp-2 mb-3 leading-snug">
                            <a href="{{ route('articles.show', $article->slug ?? $article->id) }}">
                                {{ $article->title }}
                            </a>
                        </h2>

                        {{-- Extrait --}}
                        <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-6 font-sans">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                        </p>
                    </div>

                    {{-- Footer Carte --}}
                    <div
                        class="pt-4 border-t border-slate-800/80 flex items-center justify-between text-[11px] font-mono text-slate-500">
                        <span class="flex items-center gap-1.5 text-slate-400">
                            <span class="text-xs text-slate-600">@</span>{{ $article->user->name ?? 'Auteur' }}
                        </span>
                        <time datetime="{{ $article->created_at }}">
                            {{ $article->created_at ? $article->created_at->format('d/m/Y') : '' }}
                        </time>
                    </div>

                </article>
            @empty
                <div
                    class="col-span-full bg-slate-900/50 border border-slate-800 rounded-2xl p-12 text-center font-mono text-slate-500 text-sm">
                    // Aucun article publié pour le moment.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if (method_exists($articles, 'hasPages') && $articles->hasPages())
            <div class="pt-4">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
@endsection
