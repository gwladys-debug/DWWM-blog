<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorie list</title>
</head>

<body>
    <h1>Categorie list</h1>
    @foreach ($categories as $category)
        <div>
            <h2>{{ $category->name }}</h2>
            <p>{{ $category->description }}</p>
        </div>
    @endforeach
</body>

</html>
