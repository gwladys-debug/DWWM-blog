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


    <div class="mt-8 flex justify-center">
        {{ $articles->links() }}
    </div>


@endsection
