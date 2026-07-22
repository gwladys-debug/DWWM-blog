@extends('layouts.app')
@section('title', 'Liste des catégories')
@section('content')

    {{-- Affichage des messages Flash (Succès / Erreur) --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-7">
        <h1 class="text-3xl font-bold m-0 text-slate-900">Catégories</h1>
        <a href="{{ route('categories.create') }}"
            class="bg-black text-white border border-black px-5 py-2.5 text-xs font-bold uppercase tracking-wider no-underline hover:bg-zinc-800 transition-colors">
            + Nouvelle catégorie
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-slate-50 border-b border-gray-200">
                <th class="p-4 text-left text-sm font-medium text-gray-500">Nom</th>
                <th class="p-4 text-left text-sm font-medium text-gray-500">Articles</th>
                <th class="p-4 text-left text-sm font-medium text-gray-500">Date de création</th>
                <th class="p-4 text-left text-sm font-medium text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr class="border-b border-gray-100 hover:bg-slate-50/50 transition-colors">
                    <td class="p-4 text-sm font-semibold text-black">{{ $category->name }}</td>

                    <td class="p-4 text-sm text-gray-500">{{ $category->articles_count ?? 0 }}</td>

                    <td class="p-4 text-sm text-gray-500">
                        {{ $category->created_at ? $category->created_at->format('d/m/Y') : '01/06/2026' }}
                    </td>

                    <td class="p-4 text-sm whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            {{-- Bouton Éditer --}}
                            <a href="{{ route('categories.edit', $category) }}" title="Modifier"
                                class="hover:opacity-75 text-base">
                                ✏️
                            </a>

                            {{-- Bouton Supprimer --}}
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                onsubmit="return confirm('Es-tu sûre de vouloir supprimer cette catégorie ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:text-red-700 p-1 transition-colors flex items-center"
                                    title="Supprimer l'article">
                                    <!-- Icône Poubelle SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-sm text-gray-500">
                        Aucune catégorie trouvée.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Liens de pagination --}}
    <div class="mt-4">
        {{ $categories->links() }}
    </div>

@endsection
