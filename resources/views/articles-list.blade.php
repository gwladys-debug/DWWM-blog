@extends('layouts.app')
@section('title', 'Liste des articles')

@section('content')

    <h1 class="text-3xl font-bold mb-7 text-black">Articles</h1>

    <div class="border border-black p-4 mb-7 flex gap-5 items-center">
        <span class="text-sm font-medium text-black">Filtres :</span>
        <select class="px-3 py-1.5 border border-gray-400 bg-white text-xs min-w-[160px] focus:outline-none">
            <option>Toutes les catégories</option>
        </select>
        <select class="px-3 py-1.5 border border-gray-400 bg-white text-xs min-w-[160px] focus:outline-none">
            <option>Tous les tags</option>
        </select>
    </div>

    <div class="flex flex-col gap-5 mb-10">
        @foreach ($articles as $article)
        <x-article :article="$article" />

        @endforeach
    </div>

    <div class="flex justify-center items-center gap-5 mt-5">
        <button
            class="bg-black text-white border-none px-4 py-2 text-xs font-semibold cursor-pointer hover:bg-zinc-800 transition-colors">-
            Précédent</button>
        <span class="text-xs text-gray-700">Page 1/4</span>
        <button
            class="bg-black text-white border-none px-4 py-2 text-xs font-semibold cursor-pointer hover:bg-zinc-800 transition-colors">Suivant
            -</button>
    </div>

@endsection
