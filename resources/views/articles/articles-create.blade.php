@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">

        {{-- En-tête --}}
        <div class="flex items-center justify-between border-b border-slate-800 pb-5">
            <div>
                <h1 class="text-2xl font-bold font-mono text-slate-100 tracking-tight flex items-center gap-3">
                    <span class="text-cyan-400">~/admin/articles/</span>nouveau
                </h1>
                <p class="text-xs font-mono text-slate-400 mt-1">// Rédiger et publier un nouvel article</p>
            </div>
            <a href="{{ route('admin.articles.index') }}"
                class="text-xs font-mono text-slate-400 hover:text-cyan-400 transition-colors">
                &larr; Annuler
            </a>
        </div>

        {{-- Formulaire de Création --}}
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-6 backdrop-blur-xl shadow-2xl space-y-6">

                {{-- Titre --}}
                <div>
                    <label for="title" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                        <span class="text-cyan-400">#</span> Titre de l'article
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg px-4 py-2.5 text-sm font-sans focus:border-cyan-400 focus:outline-none placeholder-slate-600"
                        placeholder="ex: Tout comprendre sur les Middlewares Laravel">
                    @error('title')
                        <p class="text-rose-400 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div>
                    <label for="slug" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                        <span class="text-cyan-400">#</span> Slug (URL)
                    </label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg px-4 py-2.5 text-sm font-sans focus:border-cyan-400 focus:outline-none placeholder-slate-600"
                        placeholder="ex: tout-comprendre-sur-les-middlewares">
                    <p class="text-[10px] font-mono text-slate-500 mt-1.5">// Personnalisez l'URL ou laissez vide pour une
                        génération automatique.</p>
                    @error('slug')
                        <p class="text-rose-400 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Extrait / Chapeau --}}
                <div>
                    <label for="excerpt" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                        <span class="text-cyan-400">#</span> Extrait de l'article (Accroche / Résumé)
                    </label>
                    <textarea name="excerpt" id="excerpt" rows="3" required
                        class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg p-3 text-xs font-sans leading-relaxed focus:border-cyan-400 focus:outline-none placeholder-slate-600"
                        placeholder="Un court résumé de 2 à 3 phrases qui apparaîtra sur les cartes d'articles de la page d'accueil...">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-rose-400 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Catégorie & Statut (Grille 2 colonnes) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Catégorie --}}
                    <div>
                        <label for="category_id" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                            <span class="text-cyan-400">#</span> Catégorie
                        </label>
                        <select name="category_id" id="category_id" required
                            style="background-color: #020617; color: #f8fafc;"
                            class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg px-3 py-2.5 text-xs font-mono focus:border-cyan-400 focus:outline-none cursor-pointer">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-rose-400 text-xs font-mono mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Statut --}}
                    <div>
                        <label for="status" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                            <span class="text-cyan-400">#</span> Statut de publication
                        </label>
                        <select name="status" id="status" style="background-color: #020617; color: #f8fafc;"
                            class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg px-3 py-2.5 text-xs font-mono focus:border-cyan-400 focus:outline-none cursor-pointer">
                            <option value="PUBLISHED" {{ old('status') == 'PUBLISHED' ? 'selected' : '' }}>Publié</option>
                            <option value="DRAFT" {{ old('status') == 'DRAFT' ? 'selected' : '' }}>Brouillon</option>
                        </select>
                    </div>
                </div>

                {{-- Image de couverture --}}
                <div>
                    <label for="image" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                        <span class="text-cyan-400">#</span> Image de couverture (optionnel)
                    </label>
                    <input type="file" name="image" id="image"
                        class="w-full text-xs font-mono text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-mono file:bg-slate-800 file:text-cyan-400 hover:file:bg-slate-700 cursor-pointer">
                </div>

                {{-- Contenu (Markdown) --}}
                <div>
                    <label for="content" class="block text-xs font-mono text-slate-300 font-semibold mb-2">
                        <span class="text-cyan-400">#</span> Contenu de l'article (compatible Markdown)
                    </label>
                    <textarea name="content" id="content" rows="12" required
                        class="w-full bg-slate-950 text-slate-100 border border-slate-800 rounded-lg p-4 text-sm font-mono leading-relaxed focus:border-cyan-400 focus:outline-none placeholder-slate-700"
                        placeholder="Écrivez votre article ici... Utilisation des titres ### et du gras **autorisée**.">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-rose-400 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-4">
                <button type="submit"
                    class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-mono text-xs font-bold px-6 py-3 rounded-lg transition-all shadow-lg shadow-cyan-500/10">
                    ENREGISTRER L'ARTICLE
                </button>
            </div>
        </form>
    </div>
@endsection
