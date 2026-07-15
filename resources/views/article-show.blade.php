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
        Par {{ $article->user->name ?? 'Édith Orial' }} · {{ $article->created_at->format('d jan. Y') }}
    </div>

    <hr class="border-gray-300 my-6">

    <div class="text-sm text-gray-800 leading-relaxed space-y-4 mb-8">
        <p class="font-semibold text-black">Contenu complet.</p>

        <p>{{ $article->content }}</p>
    </div>

    <hr class="border-gray-300 my-6">

    <div class="mb-6">
        <h3 class="text-sm font-medium text-black mb-4">4 commentaires</h3>

        <div class="flex flex-col gap-4 mb-6">

            <div class="border border-gray-400 p-4 bg-white">
                <div class="flex justify-between items-baseline mb-2">
                    <div class="text-xs font-semibold text-black">
                        Henri Amédepan · <span class="text-gray-500 font-normal">15 jan. 2026</span>
                    </div>
                    <div class="text-xs space-x-2 text-gray-400"></div>
                </div>
                <p class="text-xs text-gray-700 leading-relaxed">
                    Contenu du commentaire. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin,
                    turpis sit amet placerat elementum, libero nisl rhoncus nisl, in consequat justo nisi et arcu.
                </p>
            </div>

            <div class="border border-gray-400 p-4 bg-white">
                <div class="flex justify-between items-baseline mb-2">
                    <div class="text-xs font-semibold text-black">
                        Théa Louest · <span class="text-gray-500 font-normal">13 jan. 2026</span>
                    </div>
                    <div class="text-xs space-x-2 text-gray-400"></div>
                </div>
                <p class="text-xs text-gray-700 leading-relaxed">
                    Contenu du commentaire. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin,
                    turpis sit amet placerat elementum, libero nisl rhoncus nisl, in consequat justo nisi et arcu.
                </p>
            </div>

            <div class="border border-gray-400 p-4 bg-white">
                <div class="flex justify-between items-baseline mb-2">
                    <div class="text-xs font-semibold text-black">
                        Marc Assin · <span class="text-gray-500 font-normal">12 jan. 2026</span>
                    </div>
                    <div class="text-xs space-x-2 text-gray-400"></div>
                </div>
                <p class="text-xs text-gray-700 leading-relaxed">
                    Superbe article ! Les explications sont claires et l'interface minimaliste rend la lecture très
                    agréable. Hâte de lire les prochains articles.
                </p>
            </div>

            <div class="border border-gray-400 p-4 bg-white">
                <div class="flex justify-between items-baseline mb-2">
                    <div class="text-xs font-semibold text-black">
                        Lucie Dité · <span class="text-gray-500 font-normal">10 jan. 2026</span>
                    </div>
                    <div class="text-xs space-x-2 text-gray-400"></div>
                </div>
                <p class="text-xs text-gray-700 leading-relaxed">
                    Est-ce qu'il serait possible d'avoir plus de détails ou des ressources supplémentaires sur le sujet de
                    la catégorie ? Merci pour ce partage.
                </p>
            </div>

        </div>

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
