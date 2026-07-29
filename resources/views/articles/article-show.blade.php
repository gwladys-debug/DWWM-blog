@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8 py-6">

        {{-- En-tête : Bouton retour & Actions Admin --}}
        <div class="flex items-center justify-between">
            <a href="{{ route('articles.publicIndex') }}"
                class="inline-flex items-center gap-2 text-xs font-mono text-slate-400 hover:text-cyan-400 transition-colors">
                <span class="text-cyan-400">&larr;</span> cd .. /articles
            </a>

            {{-- 👑 ACTIONS RÉSERVÉES À L'ADMINISTRATEUR --}}
            @if (auth()->check() && auth()->user()->is_admin)
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.articles.edit', $article->slug) }}"
                        class="px-3 py-1.5 rounded bg-amber-500/10 text-amber-400 border border-amber-500/20 font-mono text-xs hover:bg-amber-500/20 transition-all">
                        [ÉDITER]
                    </a>

                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1.5 rounded bg-rose-500/10 text-rose-400 border border-rose-500/20 font-mono text-xs hover:bg-rose-500/20 transition-all">
                            [SUPPRIMER]
                        </button>
                    </form>
                </div>
            @endif
        </div>

        {{-- En-tête de l'article --}}
        <header class="space-y-4 border-b border-slate-800 pb-8">
            {{-- Meta : Catégorie & Date --}}
            <div class="flex flex-wrap items-center gap-3 text-xs font-mono">
                @if (isset($article->category))
                    <span
                        class="px-2.5 py-1 rounded-md bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 font-bold uppercase">
                        {{ $article->category->name }}
                    </span>
                @endif
                <span class="text-slate-500">•</span>
                <time class="text-slate-400" datetime="{{ $article->created_at }}">
                    // {{ $article->created_at ? $article->created_at->format('d/m/Y') : '' }}
                </time>
            </div>

            {{-- Titre principal --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-100 tracking-tight leading-tight">
                {{ $article->title }}
            </h1>

            {{-- Auteur --}}
            <div class="flex items-center gap-2 text-xs font-mono text-slate-400">
                <span>Rédigé par</span>
                <span class="text-cyan-400 font-semibold">@ {{ $article->user->name ?? 'Auteur' }}</span>
            </div>
        </header>

        {{-- Image de couverture --}}
        @if (!empty($article->image))
            <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl max-h-[400px]">
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                    class="w-full h-full object-cover">
            </div>
        @endif

        {{-- Contenu de l'article avec parsing Markdown --}}
        <article class="prose prose-invert prose-cyan max-w-none text-slate-300 leading-relaxed font-sans space-y-4">
            {!! Str::markdown($article->content) !!}
        </article>

        {{-- Tags s'il y en a --}}
        @if (isset($article->tags) && $article->tags->count() > 0)
            <footer class="pt-6 border-t border-slate-800 flex items-center gap-2 flex-wrap">
                <span class="text-xs font-mono text-slate-500">// Tags :</span>
                @foreach ($article->tags as $tag)
                    <span class="text-xs font-mono bg-slate-900 border border-slate-800 text-slate-300 px-2 py-1 rounded">
                        #{{ $tag->name }}
                    </span>
                @endforeach
            </footer>
        @endif
        {{-- 💬 SECTION COMMENTAIRES --}}
        <section class="pt-8 border-t border-slate-800 space-y-6">
            <h2 class="text-xl font-bold font-mono text-slate-100 flex items-center gap-2">
                <span class="text-cyan-400">//</span> Commentaires
                <span
                    class="text-xs font-normal text-slate-500">({{ $article->comments ? $article->comments->count() : 0 }})</span>
            </h2>

            {{-- Formulaire pour poster un commentaire (si connecté) --}}
            @auth
                <form action="{{ route('comments.store', $article->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <textarea name="content" rows="3" required
                            class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg p-3 text-sm font-sans focus:border-cyan-400 focus:outline-none placeholder-slate-600"
                            placeholder="Laissez un commentaire..."></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-mono text-xs font-bold px-4 py-2 rounded-lg transition-all">
                            POSTER LE COMMENTAIRE
                        </button>
                    </div>
                </form>
            @else
                <div class="p-4 bg-slate-950/60 border border-slate-800 rounded-lg text-xs font-mono text-slate-400">
                    Vous devez être <a href="{{ route('login') }}" class="text-cyan-400 underline">connecté</a> pour poster un
                    commentaire.
                </div>
            @endauth

            {{-- Liste des commentaires --}}
            <div class="space-y-4 pt-4">
                @if ($article->comments && $article->comments->isNotEmpty())
                    @foreach ($article->comments as $comment)
                        <div class="p-4 bg-slate-900/60 border border-slate-800/80 rounded-xl space-y-2">
                            <div class="flex items-center justify-between text-xs font-mono">
                                <span class="text-cyan-400 font-semibold">@
                                    {{ $comment->user->firstname ?? 'Utilisateur' }}</span>
                                <time class="text-slate-500">{{ $comment->created_at->diffForHumans() }}</time>
                            </div>
                            <p class="text-sm text-slate-300 font-sans leading-relaxed">
                                {{ $comment->content }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs font-mono text-slate-500">// Aucun commentaire pour le moment. Soyez le premier !</p>
                @endif
            </div>
        </section>

    </div>
@endsection
