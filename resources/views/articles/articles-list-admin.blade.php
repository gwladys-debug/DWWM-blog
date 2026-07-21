@extends('layouts.app')
@section('title', 'Liste des articles (Admin)')

@section('content')

    <div class="flex justify-between items-center mb-7">
        <div class="flex items-baseline gap-3">
            <h1 class="text-3xl font-bold m-0 text-black">Articles</h1>
            <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">[ Mode Admin ]</span>
        </div>
        <a href="{{ route('admin.articles.create') }}"
            class="bg-black text-white border border-black px-4 py-2 text-xs font-semibold uppercase tracking-wide no-underline hover:bg-zinc-800 transition-colors">
            + Nouvel article
        </a>
    </div>

    {{-- Message de confirmation après suppression ou création --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse mb-10">
        <thead>
            <tr class="border-b-2 border-black">
                <th class="py-3.5 px-2.5 text-left text-xs font-bold uppercase tracking-wider text-black">Titre</th>
                <th class="py-3.5 px-2.5 text-left text-xs font-bold uppercase tracking-wider text-black">Catégorie</th>
                <th class="py-3.5 px-2.5 text-left text-xs font-bold uppercase tracking-wider text-black">Statut</th>
                <th class="py-3.5 px-2.5 text-left text-xs font-bold uppercase tracking-wider text-black">Date</th>
                <th class="py-3.5 px-2.5 text-left text-xs font-bold uppercase tracking-wider text-black">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <x-articles-admin :article="$article" />
            @endforeach
        </tbody>
    </table>

    <div class="mt-8 flex justify-center">
        {{ $articles->links() }}
    </div>

@endsection
