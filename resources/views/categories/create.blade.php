@extends('layouts.app')
@section('title', 'Créer une catégorie')
@section('content')

    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-7">
            <h1 class="text-3xl font-bold text-slate-900">Nouvelle catégorie</h1>
            <a href="{{ route('categories.index') }}"
                class="text-sm font-semibold text-gray-600 hover:text-black transition-colors">
                ← Retour à la liste
            </a>
        </div>

        {{-- Gestion des erreurs de validation --}}
        @if ($errors->any())
            <div class="p-4 mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire de création --}}
        <form action="{{ route('admin.categories.store') }}" method="POST"
            class="bg-white p-6 border border-gray-200 rounded shadow-sm">
            @csrf

            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nom de la catégorie
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    placeholder="Ex: Technologie, Design, Actualités..." required
                    class="w-full border border-gray-300 p-3 text-sm rounded focus:outline-none focus:border-black">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-black text-white px-6 py-3 text-xs font-bold uppercase tracking-wider hover:bg-zinc-800 transition-colors cursor-pointer">
                    Enregistrer la catégorie
                </button>
            </div>
        </form>
    </div>

@endsection
