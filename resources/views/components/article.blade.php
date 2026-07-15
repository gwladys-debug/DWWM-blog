<div class="border border-black p-5 bg-white">

    <div class="flex justify-between items-center text-sm text-gray-500 mb-2">
        <span class="font-medium text-black">[ {{ $article->category->name }} ] [ Tag 1 ]</span>
        <span class="text-xs">{{ $article->created_at->format('d M. Y') }}</span>
    </div>

    <h2 class="text-xl font-bold mb-2 text-black">{{ $article->title }}</h2>

    <p class="text-sm text-gray-700 leading-relaxed mb-4">{{ $article->content }}</p>

    <div class="text-right">
        <a href="{{ route('articles.show', $article->id) }}"
            class="text-xs text-black underline font-medium hover:text-gray-600">Lire -></a>
    </div>
</div>
