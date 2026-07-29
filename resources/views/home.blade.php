<!DOCTYPE html>
<html lang="fr" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevBlog // DWWM</title>
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

    {{-- 🧭 BARRE DE NAVIGATION --}}
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

                    <a href="{{ route('admin.articles.index') }}"
                        class="px-3 py-1.5 bg-indigo-500/10 border border-indigo-500/30 text-indigo-300 rounded-lg hover:bg-indigo-500/20 transition font-mono text-xs">
                        ⚡ Administration
                    </a>

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

    {{-- 🏠 SECTION PRINCIPALE --}}
    <main class="flex-1 flex items-center justify-center p-6 my-8">
        <div class="max-w-3xl w-full">

            {{-- Message Flash (Succès) --}}
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

            {{-- FENÊTRE STYLE TERMINAL --}}
            <div
                class="bg-slate-900/90 border border-slate-800 rounded-2xl shadow-2xl overflow-hidden backdrop-blur-xl">

                {{-- Barre supérieure de fenêtre --}}
                <div class="bg-slate-950/80 px-4 py-3 border-b border-slate-800/80 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                    </div>
                    <span class="text-xs font-mono text-slate-500">~/dwwm-blog/accueil.php</span>
                    <div class="w-12"></div>
                </div>

                {{-- Contenu du Terminal --}}
                <div class="p-8 sm:p-12 text-center">

                    {{-- Badge Status --}}
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 bg-slate-800/80 border border-slate-700/50 rounded-full mb-6">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                        <span class="text-xs font-mono text-slate-300">Laravel 13.16 // PHP 8.4</span>
                    </div>

                    {{-- Titre Principal --}}
                    <h1
                        class="text-4xl sm:text-6xl font-black tracking-tight mb-4 text-transparent bg-clip-text bg-gradient-to-r from-slate-100 via-slate-200 to-slate-400">
                        Coder. Écrire. Partager.
                    </h1>

                    {{-- Sous-titre --}}
                    <p class="text-slate-400 mb-8 font-mono text-sm max-w-lg mx-auto">
                        <span class="text-slate-600">//</span> Un espace de publication moderne conçu par et pour les
                        développeurs de la promo DWWM.
                    </p>

                    {{-- Boutons d'Action Principal --}}
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('articles.publicIndex') }}"
                            class="w-full sm:w-auto px-6 py-3.5 bg-slate-100 text-slate-900 font-mono text-xs font-bold rounded-xl hover:bg-cyan-400 hover:text-slate-950 transition shadow-lg shadow-white/5 flex items-center justify-center gap-2">
                            <span>📖</span> Lire les articles
                        </a>

                        @auth
                            <a href="{{ route('admin.articles.index') }}"
                                class="w-full sm:w-auto px-6 py-3.5 bg-indigo-600/20 text-indigo-300 border border-indigo-500/40 font-mono text-xs font-bold rounded-xl hover:bg-indigo-600/30 transition flex items-center justify-center gap-2">
                                <span>⚡</span> Tableau de bord
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                                class="w-full sm:w-auto px-6 py-3.5 bg-slate-800 text-slate-300 border border-slate-700/60 font-mono text-xs font-bold rounded-xl hover:border-slate-500 hover:text-white transition flex items-center justify-center gap-2">
                                <span>🚀</span> Rejoindre la communauté
                            </a>
                        @endauth
                    </div>
                </div>

                {{-- Pied de fenêtre --}}
                <div
                    class="bg-slate-950/50 px-6 py-2.5 border-t border-slate-800/50 flex items-center justify-between text-[11px] font-mono text-slate-500">
                    <div class="flex items-center gap-4">
                        <span><span class="text-cyan-500">utf-8</span></span>
                        <span><span class="text-emerald-500">●</span> Système en ligne</span>
                    </div>
                    <div>Environnement DWWM // Tailwind CSS</div>
                </div>

            </div>
        </div>
    </main>

</body>

</html>
