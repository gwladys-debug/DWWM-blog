<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des articles (Admin)</title>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 40px auto;
            max-width: 950px;
            color: #111111;
            background-color: #ffffff;
        }

        /* --- Barre du haut (Déconnexion / Profil) --- */
        .auth-bar {
            text-align: right;
            margin-bottom: 20px;
        }

        .auth-link {
            font-size: 13px;
            color: #111111;
            text-decoration: underline;
            margin-left: 15px;
            font-weight: 500;
        }

        /* --- En-tête avec Titre et Bouton Créer --- */
        .admin-header {
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
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-create:hover {
            background-color: #333333;
        }

        /* --- Tableau des Articles --- */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 40px;
        }

        th,
        td {
            border-bottom: 1px solid #eaeaea;
            padding: 14px 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #ffffff;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            font-weight: 700;
            border-bottom: 2px solid #111111;
        }

        .actions-cell {
            font-size: 16px;
            letter-spacing: 5px;
            white-space: nowrap;
        }

        .status-published {
            color: #2ecc71;
            font-weight: 500;
        }

        .status-draft {
            color: #95a5a6;
            font-weight: 500;
        }

        /* --- Pagination --- */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }

        .btn-pagination {
            background-color: #000000;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .page-info {
            font-size: 13px;
            color: #333333;
        }
    </style>
</head>

<body>

    <div class="auth-bar">
        <span style="font-size: 13px; color: #555555;">Dashboard Admin</span>
        <a href="#" class="auth-link">Déconnexion</a>
    </div>

    <div class="admin-header">
        <h1>Articles</h1>
        <a href="#" class="btn-create">+ Nouvel article</a>
    </div>

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
                    <td class="actions-cell">✏️ ❌ ➔</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-container">
        <button class="btn-pagination">- Précédent</button>
        <span class="page-info">Page 1/2</span>
        <button class="btn-pagination">Suivant -</button>
    </div>

</body>

</html>
