<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles (Visiteur)</title>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 40px auto;
            max-width: 950px;
            color: #111111;
            background-color: #ffffff;
        }

        /* --- Barre du haut (Connexion / Inscription) --- */
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

        h1 {
            font-size: 32px;
            margin: 0 0 30px 0;
            font-weight: 700;
        }

        /* --- Section Filtres --- */
        .filters-section {
            border: 1px solid #111111;
            padding: 15px 20px;
            margin-bottom: 30px;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .filters-title {
            font-size: 14px;
            font-weight: 500;
        }

        .filter-select {
            padding: 6px 12px;
            border: 1px solid #767676;
            background-color: #ffffff;
            font-size: 13px;
            min-width: 160px;
        }

        /* --- Liste des Articles --- */
        .articles-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 40px;
        }

        .article-card {
            border: 1px solid #111111;
            padding: 20px;
            background-color: #ffffff;
        }

        .article-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #555555;
            margin-bottom: 10px;
        }

        .article-tags {
            font-weight: 500;
        }

        .article-date {
            font-size: 13px;
        }

        .article-card h2 {
            font-size: 20px;
            margin: 0 0 10px 0;
            font-weight: 700;
        }

        .article-excerpt {
            font-size: 14px;
            color: #333333;
            line-height: 1.5;
            margin: 0 0 15px 0;
        }

        .article-footer {
            text-align: right;
        }

        .read-more {
            font-size: 13px;
            color: #111111;
            text-decoration: underline;
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
        <a href="#" class="auth-link">Se connecter</a>
        <a href="#" class="auth-link">S'inscrire</a>
    </div>

    <h1>Articles</h1>

    <div class="filters-section">
        <span class="filters-title">Filtres :</span>
        <select class="filter-select">
            <option>Toutes les catégories</option>
        </select>
        <select class="filter-select">
            <option>Tous les tags</option>
        </select>
    </div>

    <div class="articles-container">
        @foreach ($articles as $article)
            <div class="article-card">

                <div class="article-header">
                    <span class="article-tags">[ {{ $article->category->name }} ] [ Tag 1 ]</span>
                    <span class="article-date">{{ $article->created_at->format('d M. Y') }}</span>
                </div>

                <h2>{{ $article->title }}</h2>

                <p class="article-excerpt">{{ $article->content }}</p>

                <div class="article-footer">
                    <a href="#" class="read-more">Lire -></a>
                </div>

            </div>
        @endforeach
    </div>

    <div class="pagination-container">
        <button class="btn-pagination">- Précédent</button>
        <span class="page-info">Page 1/4</span>
        <button class="btn-pagination">Suivant -</button>
    </div>

</body>

</html>
