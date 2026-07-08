<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des articles (Admin)</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border-bottom: 1px solid #ccc;
            padding: 12px 10px;
            text-align: left;
        }

        th {
            background-color: #f9f9f9;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .status-published {
            color: #2ecc71;
            font-weight: bold;
        }

        .status-draft {
            color: #95a5a6;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Articles (Admin)</h1>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>

                    <td>{{ $article->category->name }}</td>

                    <td>
                        @if ($article->status === 'PUBLISHED')
                            <span class="status-published">● Publié</span>
                        @else
                            <span class="status-draft">● Brouillon</span>
                        @endif
                    </td>

                    <td>{{ $article->created_at->format('d/m/Y') }}</td>

                    <td>✏️ ❌ ➔</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
