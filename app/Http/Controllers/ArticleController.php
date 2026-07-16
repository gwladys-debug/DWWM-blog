<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**    Liste des articles (Vue Visiteur)    */
        public function index()
            {
            // On récupère les articles en chargeant directement la catégorie et l'auteur associés
                $articles = Article::with(['category', 'user'])->paginate(9); // Pagination de 10 articles par page

         return view('articles-list', compact('articles'));
            }

            /** Liste des articles (Vue Admin)        */
        public function adminIndex()
            {
            // On récupère les mêmes données, mais on les enverra à la vue admin
                $articles = Article::with(['category', 'user'])->latest()->paginate(7); // Pagination de 10 articles par page, triés par date de création décroissante

                return view('articles-list-admin', compact('articles'));
            }
            /** Voir le détail d'un article spécifique (Écran 2 - Visiteur) */
        public function show(string $slug) : View
            {
                // 1. On récupère l'article précis par son slug ou on renvoie une erreur 404 si introuvable
                $article = Article::with(['category', 'user'])->where('slug', $slug)->firstOrFail();

                // 2. On retourne la vue "article-show" en lui passant les données de l'article
                return view('article-show', compact('article'));
 } }
