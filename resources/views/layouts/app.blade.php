<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mon Application')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-[#111111] font-sans max-w-[950px] mx-auto my-10 px-4">

    {{-- Barre d'authentification en haut à droite --}}
    <div class="text-right mb-5">
        @auth
            {{-- Si l'utilisateur est connecté --}}
            <span class="text-xs font-semibold mr-4 text-slate-600">
                Bonjour, {{ auth()->user()?->name }}
            </span>

            {{-- Formulaire de déconnexion --}}
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-xs font-medium underline text-red-600 ml-2 cursor-pointer">
                    Se déconnecter
                </button>
            </form>
        @else
            {{-- Si l'utilisateur n'est pas connecté --}}
            <a href="{{ route('login') }}" class="text-xs font-medium underline text-[#111111] ml-4 hover:text-gray-600">
                Se connecter
            </a>
            <a href="{{ route('register') }}" class="text-xs font-medium underline text-[#111111] ml-4 hover:text-gray-600">
                S'inscrire
            </a>
        @endauth
    </div>

    @yield('content')

</body>

</html>
