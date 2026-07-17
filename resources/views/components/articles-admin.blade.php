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

     <td class="py-3.5 px-2.5 text-base tracking-[5px] whitespace-nowrap cursor-pointer">
         <a href="{{ route('admin.articles.edit', $article->slug) }}" class="text-orange-500 hover:text-orange-700">✏️</a>

         <a href="{{ route('admin.articles.destroy', $article->slug) }}" class="text-red-500 hover:text-red-700"
             onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">❌</a>

         <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-500 hover:text-blue-700">➔</a>
     </td>
 </tr>
