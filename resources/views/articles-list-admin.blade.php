@extends('layouts.app')
@section('title', 'Liste des articles (Admin)')

@section('content')

    <div class="flex justify-between items-center mb-7">
        <div class="flex items-baseline gap-3">
            <h1 class="text-3xl font-bold m-0 text-black">Articles</h1>
            <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">[ Mode Admin ]</span>
        </div>
        <a href="#"
            class="bg-black text-white border border-black px-4 py-2 text-xs font-semibold uppercase tracking-wide no-underline hover:bg-zinc-800 transition-colors">
            + Nouvel article
        </a>
    </div>

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
                <tr class="border-b border-gray-200 hover:bg-slate-50/50 transition-colors">
                    <td class="py-3.5 px-2.5 text-sm text-black">{{ $article->title }}</td>

                    <td class="py-3.5 px-2.5 text-sm text-gray-600">{{ $article->category->name }}</td>

                    <td class="py-3.5 px-2.5 text-sm">
                        @if ($article->status === 'PUBLISHED')
                            <span class="text-green-600 font-medium">● Publié</span>
                        @else
                            <span class="text-gray-400 font-medium">● Brouillon</span>
                        @endif
                    </td>

                    <td class="py-3.5 px-2.5 text-sm text-gray-600">{{ $article->created_at->format('d/m/Y') }}</td>

                    <td class="py-3.5 px-2.5 text-base tracking-[5px] whitespace-nowrap cursor-pointer">✏️ ❌ ➔</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center items-center gap-5 mt-5">
        <button
            class="bg-black text-white border-none px-4 py-2 text-xs font-semibold cursor-pointer hover:bg-zinc-800 transition-colors">-
            Précédent</button>
        <span class="text-xs text-gray-700">Page 1/2</span>
        <button
            class="bg-black text-white border-none px-4 py-2 text-xs font-semibold cursor-pointer hover:bg-zinc-800 transition-colors">Suivant
            -</button>
    </div>

@endsection
