<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-[#111111] font-sans max-w-[950px] mx-auto my-10 px-4">

    <div class="text-right mb-5">
        <a href="#" class="text-xs font-medium underline text-[#111111] ml-4">Se connecter</a>
        <a href="#" class="text-xs font-medium underline text-[#111111] ml-4">S'inscrire</a>
    </div>

    @yield('content')

</body>

</html>
