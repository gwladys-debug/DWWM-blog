@extends('layouts.app')

@section('content')
    <div class="space-y-8">

        {{-- En-tête Admin --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-6">
            <div>
                <h1 class="text-3xl font-black font-mono text-slate-100 tracking-tight flex items-center gap-3">
                    <span class="text-cyan-400">//</span> Articles
                    <span
                        class="text-xs font-mono font-normal text-cyan-400 bg-cyan-950/80 border border-cyan-800/80 px-2.5 py-1 rounded-md">
                        [ MODE ADMIN ]
                    </span>
                </h1>
                <p class="text-xs font-mono text-slate-400 mt-1">Gérez, éditez ou supprimez vos publications.</p>
            </div>

            {{-- Bouton Nouvel Article --}}
            <a href="{{ route('admin.articles.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-mono text-xs font-bold px-4 py-2.5 rounded-lg transition-colors shadow-lg shadow-cyan-500/10">
                <span>+</span> NOUVEL ARTICLE
            </a>
        </div>

        {{-- Tableau Style IDE --}}
        <div class="bg-slate-900/90 border border-slate-800 rounded-xl overflow-hidden backdrop-blur-xl shadow-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="border-b border-slate-800 bg-slate-950/50 text-[11px] font-mono uppercase tracking-wider text-slate-400">
                            <th class="py-3.5 px-4 font-semibold">Titre</th>
                            <th class="py-3.5 px-4 font-semibold">Catégorie</th>
                            <th class="py-3.5 px-4 font-semibold">Statut</th>
                            <th class="py-3.5 px-4 font-semibold">Date</th>
                            <th class="py-3.5 px-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/80 font-sans text-xs">
                        @forelse ($articles as $article)
                            <tr class="hover:bg-slate-800/40 transition-colors group">
                                {{-- Titre --}}
                                <td
                                    class="py-4 px-4 font-medium text-slate-200 group-hover:text-cyan-400 transition-colors">
                                    {{ $article->title }}
                                </td>

                                {{-- Catégorie --}}
                                <td class="py-4 px-4 font-mono text-slate-400">
                                    {{ $article->category->name ?? 'Non classé' }}
                                </td>

                                {{-- Statut --}}
                                <td class="py-4 px-4 font-mono">
                                    @if (($article->status ?? 'PUBLISHED') === 'PUBLISHED')
                                        <span class="inline-flex items-center gap-1.5 text-emerald-400 font-semibold">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                            Publié
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-amber-400 font-semibold">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                            Brouillon
                                        </span>
                                    @endif
                                </td>

                                {{-- Date --}}
                                <td class="py-4 px-4 font-mono text-slate-400">
                                    {{ $article->created_at ? $article->created_at->format('d/m/Y') : '-' }}
                                </td>

                                {{-- Actions --}}
                                <td class="py-4 px-4 text-right space-x-2 font-mono">
                                    {{-- Éditer --}}
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" title="Éditer"
                                        class="inline-block p-1 text-amber-400 hover:text-amber-300 hover:bg-amber-500/10 rounded transition-colors">
                                        ✏️
                                    </a>

                                    {{-- Supprimer --}}
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Confirmer la suppression ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Supprimer"
                                            class="p-1 text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 rounded transition-colors">
                                            🗑️
                                        </button>
                                    </form>

                                    {{-- Voir sur le site --}}
                                    <a href="{{ route('articles.show', $article->slug ?? $article->id) }}"
                                        title="Voir l'article"
                                        class="inline-block p-1 text-cyan-400 hover:text-cyan-300 hover:bg-cyan-500/10 rounded transition-colors">
                                        &rarr;
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center font-mono text-slate-500">
                                    // Aucun article trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination Admin --}}
        @if (method_exists($articles, 'hasPages') && $articles->hasPages())
            <div class="pt-4">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
@endsection
