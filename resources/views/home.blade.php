<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon Blog Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-xl w-full bg-white border border-slate-200 shadow-sm rounded-xl p-8 text-center">
        {{-- Message de succès après inscription --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-2">
            Hello World !
        </h1>
        <p class="text-slate-500 mb-8 text-sm">
            Bienvenue sur l'application blog DWWM.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('admin.articles.index') }}"
                class="w-full sm:w-auto px-6 py-3 bg-slate-900 text-white font-medium text-sm rounded-lg hover:bg-slate-800 transition">
                Découvrir les articles
            </a>

            <a href="{{ route('login.create') }}"
                class="w-full sm:w-auto px-6 py-3 bg-white text-slate-700 font-medium text-sm rounded-lg border border-slate-300 hover:bg-slate-50 transition">
                Se connecter
            </a>
        </div>
    </div>

</body>

</html>
