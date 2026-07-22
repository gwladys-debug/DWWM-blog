<tr class="border-b border-gray-200 hover:bg-slate-50/50 transition-colors">
    <td class="py-3.5 px-2.5 text-sm text-black">{{ $article->title }}</td>

    <td class="py-3.5 px-2.5 text-sm text-gray-600">{{ $article->category->name ?? 'Sans catégorie' }}</td>

    <td class="py-3.5 px-2.5 text-sm">
        @if ($article->status === 'PUBLISHED')
            <span class="text-green-600 font-medium">● Publié</span>
        @else
            <span class="text-gray-400 font-medium">● Brouillon</span>
        @endif
    </td>

    <td class="py-3.5 px-2.5 text-sm text-gray-600">{{ $article->created_at->format('d/m/Y') }}</td>

    <td class="py-3.5 px-2.5 text-base whitespace-nowrap">
        <div class="flex items-center gap-2">
            <!-- Bouton Éditer (Passe désormais l'ID grâce au Route Model Binding) -->
            <a href="{{ route('admin.articles.edit', $article->id) }}"
                class="text-orange-500 hover:text-orange-700 p-1 transition-colors" title="Modifier l'article">
                ✏️
            </a>

            <!-- Formulaire de suppression -->
            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ? Cette action est irréversible.');"
                class="inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="text-red-500 hover:text-red-700 p-1 transition-colors flex items-center"
                    title="Supprimer l'article">
                    <!-- Icône Poubelle SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>

            <!-- Lien vers la vue publique de l'article (Conserve le slug) -->
            <a href="{{ route('articles.show', $article->slug) }}"
                class="text-blue-500 hover:text-blue-700 p-1 transition-colors" title="Voir l'article">
                ➔
            </a>
        </div>
    </td>
</tr>
