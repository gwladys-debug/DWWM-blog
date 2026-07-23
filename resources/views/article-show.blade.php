@extends('layouts.app')
@section('title', $article->title)

@section('content')

    <div class="mb-6">
        <a href="{{ url('/articles') }}" class="text-xs text-black underline font-medium hover:text-gray-600">
            ← Retour à la liste
        </a>
    </div>

    <div class="text-sm text-black font-medium mb-2">
        [ {{ $article->category->name }} ] [ Tag 1 ] [ Tag 2 ]
    </div>

    <h1 class="text-4xl font-bold text-black mb-1">{{ $article->title }}</h1>

    <div class="text-xs text-gray-500 mb-4">
        Par {{ $article->user->name ?? 'Édith Orial' }} · {{ $article->created_at->format('d M Y') }}
    </div>

    <hr class="border-gray-300 my-6">

    <div class="mb-6">
        <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article" class="w-full h-auto mb-4">
        <p class="text-sm text-gray-500 mb-4">Publié le {{ $article->created_at->format('d M Y') }} par
            {{ $article->user->name ?? 'Édith Orial' }}</p>
        <p class="text-sm text-gray-500 mb-4">Catégorie : {{ $article->category->name }}</p>
        <p class="text-sm text-gray-500 mb-4">Tags :
            @foreach ($article->tags as $tag)
                <span
                    class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs mr-2">{{ $tag->name }}</span>
            @endforeach
        </p>
        <hr class="border-gray-300 my-6">
        <p>{{ $article->content }}</p>
    </div>

    <hr class="border-gray-300 my-6">

    @auth
        <div class="mt-4 p-4 bg-gray-50 border border-gray-300">
            <p class="text-xs text-gray-500 mb-2">Formulaire de commentaire actif (Écran 3)</p>
        </div>
    @else
        <div class="mt-4">
            <a href="#"
                class="bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-wide no-underline inline-block hover:bg-zinc-800 transition-colors">
                Connectez-vous pour commenter
            </a>
        </div>
    @endauth

    </div>

@endsection
