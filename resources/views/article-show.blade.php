@extends('layouts.app')
@section('title', $article->title)

@section('content')
    <div class="mb-6">
        <a href="{{ url('/articles') }}" class="text-xs text-black underline font-medium hover:text-gray-600">
            ← Retour à la liste
        </a>
    </div>

    <div class="text-sm text-black font-medium mb-2">
        [ {{ $article->category->name }} ] [ Tag 1 ]
    </div>

    <h1 class="text-4xl font-bold text-black mb-1">{{ $article->title }}</h1>

    <div class="text-xs text-gray-500 mb-4">
        Par {{ $article->user->name ?? 'Édith Orial' }} · {{ $article->created_at->format('d jan. Y') }}
    </div>

    <hr class="border-gray-300 my-6">

    <div class="text-sm text-gray-800 leading-relaxed space-y-4 mb-8">
        <p>{{ $article->content }}</p>
    </div>

    <hr class="border-gray-300 my-6">

    <div class="mb-6">
        <h3 class="text-sm font-medium text-black mb-4">2 commentaires</h3>
        <div class="flex flex-col gap-4 mb-6">
            <div class="border border-gray-400 p-4 bg-white">
                <div class="text-xs font-semibold text-black mb-2">Henri Amédepan · 15 jan. 2026</div>
                <p class="text-xs text-gray-700">Contenu du commentaire...</p>
            </div>
        </div>

        @auth
            <div class="mt-4 p-4 bg-gray-50 border border-gray-300 text-xs">Formulaire actif (Écran 3)</div>
        @else
            <div class="mt-4">
                <a href="#"
                    class="bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-wide inline-block hover:bg-zinc-800">
                    Connectez-vous pour commenter
                </a>
            </div>
        @endauth
    </div>
@endsection
