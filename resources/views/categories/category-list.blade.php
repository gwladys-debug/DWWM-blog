@extends('layouts.app')

@section('content')
    <div class="bg-slate-900/90 border border-slate-800 rounded-2xl p-6 sm:p-8 backdrop-blur-xl shadow-2xl">

        {{-- En-tête --}}
        <div class="flex justify-between items-center mb-6 border-b border-slate-800 pb-4">
            <h1 class="text-2xl font-bold font-mono text-slate-100 flex items-center gap-2">
                <span class="text-cyan-400">#</span> Catégories
            </h1>
            <a href="{{ route('categories.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white font-mono text-xs font-semibold rounded-lg hover:bg-indigo-500 transition shadow-lg shadow-indigo-500/20">
                + Nouvelle catégorie
            </a>
        </div>

        {{-- Tableau des catégories --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 text-xs font-mono text-slate-400 uppercase tracking-wider">
                        <th class="p-3"># ID</th>
                        <th class="p-3">Nom</th>
                        <th class="p-3">Articles</th>
                        <th class="p-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-sm font-mono">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-3 text-slate-500">{{ $category->id }}</td>
                            <td class="p-3 text-slate-200 font-semibold">{{ $category->name }}</td>
                            <td class="p-3 text-slate-400">
                                <span
                                    class="px-2 py-0.5 rounded bg-slate-800 text-cyan-400 text-xs border border-slate-700/50">
                                    {{ $category->articles_count ?? $category->articles->count() }} article(s)
                                </span>
                            </td>
                            <td class="p-3 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="text-xs text-amber-400 hover:underline">
                                        [Modifier]
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                        onsubmit="return confirm('Supprimer cette catégorie ?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-rose-400 hover:underline">
                                            [Supprimer]
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-slate-500 font-mono text-sm">
                                Aucune catégorie trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 📄 BLOC DE PAGINATION --}}
        @if ($categories->hasPages())
            <div class="mt-6 pt-4 border-t border-slate-800">
                {{ $categories->links() }}
            </div>
        @endif

    </div>
@endsection
