<!DOCTYPE html>
<html lang="fr" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'DevBlog // DWWM' }}</title>
    {{-- Ingestion directe via CDN Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-slate-100 antialiased min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    {{-- 🌌 GRILLE EN ARRIÈRE-PLAN --}}
    <div
        class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b15_1px,transparent_1px),linear-gradient(to_bottom,#1e293b15_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] -z-10">
    </div>

    {{-- 💡 EFFET GLOW DU FOND --}}
    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-gradient-to-tr from-cyan-500/20 via-indigo-500/20 to-purple-500/20 blur-[120px] rounded-full pointer-events-none -z-10">
    </div>

    {{-- 🧭 BARRE DE NAVIGATION REUTILISABLE --}}
    <nav class="border-b border-slate-800/80 bg-slate-950/70 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
                class="font-mono font-bold text-lg text-slate-100 hover:text-cyan-400 transition flex items-center gap-1.5">
                <span class="text-cyan-400">&lt;</span>DevBlog<span class="text-cyan-400">/&gt;</span>
                <span
                    class="text-[10px] font-normal px-2 py-0.5 rounded bg-slate-800 text-slate-400 border border-slate-700/50">v13.16</span>
            </a>

            {{-- Navigation --}}
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('articles.publicIndex') }}"
                    class="text-slate-400 hover:text-cyan-400 transition flex items-center gap-2">
                    <span class="text-xs text-slate-600 font-mono">01.</span> Articles
                </a>

                @auth
                    <a href="{{ route('categories.index') }}"
                        class="text-slate-400 hover:text-cyan-400 transition flex items-center gap-2">
                        <span class="text-xs text-slate-600 font-mono">02.</span> Catégories
                    </a>

                    {{-- 👑 Réservé strictement aux administrateurs --}}
                    @if (auth()->user()->is_admin)
                        <a href="{{ route('admin.articles.index') }}"
                            class="px-3 py-1.5 bg-amber-500/10 border border-amber-500/30 text-amber-400 rounded-lg hover:bg-amber-500/20 transition font-mono text-xs shadow-sm">
                            ⚡ Administration
                        </a>
                    @endif

                    {{-- 👤 Badge de l'utilisateur connecté --}}
                    <div class="flex items-center gap-2 pl-2 border-l border-slate-800 font-mono text-xs">
                        <span class="text-slate-300">@ {{ auth()->user()->name }}</span>
                        @if (auth()->user()->is_admin)
                            <span
                                class="px-1.5 py-0.5 rounded bg-amber-500/20 border border-amber-500/40 text-amber-300 text-[10px] uppercase font-bold">ADMIN</span>
                        @else
                            <span
                                class="px-1.5 py-0.5 rounded bg-slate-800 border border-slate-700 text-slate-400 text-[10px] uppercase">USER</span>
                        @endif
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="px-3 py-1.5 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-lg hover:bg-rose-500/20 transition text-xs font-mono">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-slate-400 hover:text-slate-100 transition font-mono text-xs">
                        // Connexion
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-indigo-600 text-white font-medium rounded-lg hover:brightness-110 transition shadow-lg shadow-cyan-500/20 text-xs font-mono">
                        Créer un compte
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- 🏠 CONTENU DYNAMIQUE DES PAGES --}}
    <main class="flex-1 max-w-6xl w-full mx-auto p-6 my-6">

        {{-- Message Flash Global --}}
        @if (session('success'))
            <div
                class="mb-6 p-4 bg-emerald-950/50 border border-emerald-500/30 text-emerald-300 text-sm rounded-xl font-mono flex items-center justify-between shadow-lg shadow-emerald-950/50">
                <div class="flex items-center gap-2">
                    <span class="text-emerald-400">✔</span>
                    <span>{{ session('success') }}</span>
                </div>
                <span class="text-xs text-emerald-600">200 OK</span>
            </div>
        @endif

        {{-- Emplacement du contenu spécifique à chaque vue --}}
        @yield('content')
    </main>

    {{-- 🦶 FOOTER STYLE TERMINAL --}}
    <footer class="border-t border-slate-800/80 bg-slate-950/80 py-4 text-center text-xs font-mono text-slate-500">
        DevBlog DWWM PROMO 2026 // Propulsé par Laravel & Tailwind CSS
    </footer>

</body>

</html>
