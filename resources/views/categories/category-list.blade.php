@extends('layouts.app')
@section('title', 'Liste des catégories')
@section('content')

    <div class="flex justify-between items-center mb-7">
        <h1 class="text-3xl font-bold m-0 text-slate-900">Catégories</h1>
        <a href="{{ route('admin.categories.create') }}"
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
            @foreach ($categories as $category)
                <tr class="border-b border-gray-100 hover:bg-slate-50/50 transition-colors">
                    <td class="p-4 text-sm font-semibold text-black">{{ $category->name }}</td>

                    <td class="p-4 text-sm text-gray-500">{{ $category->articles_count ?? 0 }}</td>

                    <td class="p-4 text-sm text-gray-500">
                        {{ $category->created_at ? $category->created_at->format('d/m/Y') : '01/06/2026' }}
                    </td>

                    <td class="p-4 text-base tracking-[12px] whitespace-nowrap cursor-pointer">✏️❌</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Liens de pagination ajoutés ici --}}
    <div class="mt-8 flex justify-center">
        {{ $categories->links() }}
    </div>

@endsection
