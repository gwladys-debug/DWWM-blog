@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto my-8 p-6 bg-white rounded-lg shadow-md">

        <!-- Bouton Retour à la liste -->
        <div class="mb-4">
            <a href="{{ route('admin.articles.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                ← Retour à la liste
            </a>
        </div>

        <!-- Titre dynamique selon le contexte -->
        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            {{ isset($article) ? 'Modifier l\'article' : 'Créer un nouvel article' }}
        </h1>

        <!-- Formulaire dynamique : Passe désormais l'ID en cas de modification -->
        <form action="{{ isset($article) ? route('admin.articles.update', $article->id) : route('admin.articles.store') }}"
            method="POST">
            @csrf
            @if (isset($article))
                @method('PUT')
            @endif

            <!-- Champ Titre -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Titre *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <!-- Champ Slug -->
            <div class="mb-4">
                <label for="slug" class="block text-gray-700 font-bold mb-2">Slug (URL de l'article) *</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $article->slug ?? '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <!-- Choix de la Catégorie -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie *</label>
                <select name="category_id" id="category_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
                    <option value="">Sélectionner une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $article->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Choix des Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-gray-700 font-bold mb-2">Tags</label>
                <select name="tags[]" id="tags"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ isset($article) && $article->tags->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Maintenez Ctrl (ou Cmd sur Mac) pour sélectionner plusieurs tags.</p>
            </div>

            <!-- Contenu de l'article -->
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Contenu *</label>
                <textarea name="content" id="content" rows="8"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>{{ old('content', $article->content ?? '') }}</textarea>
            </div>

            <!-- Statut de l'article -->
            <div class="mb-6">
                <span class="block text-gray-700 font-bold mb-2">Statut *</span>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="DRAFT" class="form-radio text-blue-600"
                            {{ old('status', $article->status ?? 'DRAFT') === 'DRAFT' ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Brouillon</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="PUBLISHED" class="form-radio text-blue-600"
                            {{ old('status', $article->status ?? '') === 'PUBLISHED' ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Publié</span>
                    </label>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="flex justify-end space-x-3 border-t pt-4">
                <a href="{{ route('admin.articles.index') }}"
                    class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition">
                    Annuler
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-black hover:bg-gray-800 text-white rounded-lg font-semibold transition">
                    {{ isset($article) ? 'Enregistrer les modifications' : 'Enregistrer l\'article' }}
                </button>
            </div>
        </form>
    </div>
@endsection
