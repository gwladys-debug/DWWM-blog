<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Liste des articles (Vue Visiteur)
     */
    public function index()
    {
        // On récupère les articles en chargeant directement la catégorie et l'auteur associés
        $articles = Article::with(['category', 'user'])->get();

        return view('articles-list', compact('articles'));
    }

    /**
     * Liste des articles (Vue Admin)
     */
    public function adminIndex()
    {
        // On récupère les mêmes données, mais on les enverra à la vue admin
        $articles = Article::with(['category', 'user'])->get();

        return view('articles-list-admin', compact('articles'));
    }
    /**
     * Voir le détail d'un article spécifique (Écran 2 - Visiteur)
     */
    public function show(string $id)
    {
        // 1. On récupère l'article précis par son ID ou on renvoie une erreur 404 si introuvable
        $article = Article::with(['category', 'user'])->findOrFail($id);

        // 2. On retourne la vue "article-show" en lui passant les données de l'article
        return view('article-show', compact('article'));
    }
}
