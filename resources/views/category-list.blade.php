<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorie list</title>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 40px;
            color: #111111;
            background-color: #ffffff;
            line-height: 1.6;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .category-container {
            max-width: 600px;
            /* Aligné sur une largeur propre */
        }

        .category-item {
            font-size: 18px;
            font-weight: 600;
            padding: 16px 0;
            border-bottom: 1px solid #eaeaea;
            /* Même bordure fine que ton tableau */
            color: #000000;
            display: flex;
            align-items: center;
        }

        /* Un petit effet discret au survol si tu passes la souris */
        .category-item:hover {
            color: #555555;
        }
    </style>
</head>

<body>

    <div class="category-container">
        <h1>Categorie list</h1>

        @foreach ($categories as $category)
            <div class="category-item">
                {{ $category->name }}
            </div>
        @endforeach
    </div>

</body>

</html>
