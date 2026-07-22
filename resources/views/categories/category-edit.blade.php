@extends('layouts.app')
@section('title', 'Modifier la catégorie')
@section('content')

    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-slate-900">Modifier la catégorie</h1>
            <a href="{{ route('categories.index') }}" class="text-sm font-semibold text-slate-600 hover:text-black">
                ← Retour à la liste
            </a>
        </div>

        <form action="{{ route('categories.update', $category) }}" method="POST"
            class="bg-white p-6 border border-gray-200 shadow-sm rounded-none">
            @csrf
            @method('PUT')

            {{-- Champ Nom --}}
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nom de la catégorie *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                    class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror p-2.5 text-sm focus:outline-none focus:border-black">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Champ Slug --}}
            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-slate-700 mb-2">Slug (URL propre)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                    class="w-full border @error('slug') border-red-500 @else border-gray-300 @enderror p-2.5 text-sm focus:outline-none focus:border-black">
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Boutons d'action --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('categories.index') }}"
                    class="px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-slate-600 border border-gray-300 hover:bg-slate-50 transition-colors no-underline">
                    Annuler
                </a>
                <button type="submit"
                    class="bg-black text-white border border-black px-5 py-2.5 text-xs font-bold uppercase tracking-wider hover:bg-zinc-800 transition-colors">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

@endsection
