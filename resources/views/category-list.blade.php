<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des catégories</title>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 40px auto;
            max-width: 950px;
            color: #111111;
            background-color: #ffffff;
        }

        /* En-tête avec Titre et Bouton Créer */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 32px;
            margin: 0;
            font-weight: 700;
        }

        .btn-create {
            background-color: #000000;
            color: #ffffff;
            border: 1px solid #000000;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 0.5px;
            cursor: pointer;
        }

        /* Tableau style minimaliste pro */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #d1d5db;
            /* Bordure extérieure du tableau */
        }

        th,
        td {
            padding: 16px 20px;
            text-align: left;
            font-size: 15px;
            border-bottom: 1px solid #eaeaea;
        }

        th {
            background-color: #f8fafc;
            /* Fond très légèrement grisé pour l'en-tête */
            color: #4b5563;
            font-weight: 500;
        }

        /* Style des lignes de données */
        tbody tr td:first-child {
            font-weight: 600;
            /* Nom de la catégorie en gras */
            color: #000000;
        }

        .count-cell,
        .date-cell {
            color: #4b5563;
        }

        .actions-cell {
            font-size: 16px;
            letter-spacing: 12px;
            /* Espace net entre le crayon et la croix */
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <div class="header-section">
        <h1>Catégories</h1>
        <a href="#" class="btn-create">+ Nouvelle catégorie</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Articles</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>

                    <td class="count-cell">{{ $category->articles_count ?? 0 }}</td>

                    <td class="date-cell">
                        {{ $category->created_at ? $category->created_at->format('d/m/Y') : '01/06/2026' }}</td>

                    <td class="actions-cell">✏️❌</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
