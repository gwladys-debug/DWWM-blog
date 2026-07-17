<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

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
            }

    /**
     * 1. Afficher le formulaire de création (Écran 5)
     */
        public function create()
            {
                $categories = Category::all();
                $tags = Tag::all(); // On récupère aussi les tags pour la sélection multiple

                return view('articles-create', compact('categories', 'tags'));
            }

/**
 * 2. Enregistrer un nouvel article en base de données
 */
        public function store(Request $request)
            {
    // Validation des données du formulaire
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:100|unique:articles,slug',
                'content' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'status' => 'required|in:DRAFT,PUBLISHED',
                'tags' => 'nullable|array',
                'tags.*' => 'exists:tags,id',
            ]);

    // On crée l'article
            $article = new Article();
            $article->title = $validated['title'];
            // On s'assure que le slug est bien formaté au cas où
            $article->slug = Str::slug($validated['slug']);
            $article->content = $validated['content'];
            $article->status = $validated['status'];
            $article->category_id = $validated['category_id'];

    // Pour l'auteur (id_user), on prend l'ID de l'administrateur connecté
    // Si l'authentification n'est pas encore en place, tu peux mettre temporairement : Auth::id() ?? 1
            $article->id_user = \Illuminate\Support\Facades\Auth::id() ?? 1;

            // Gestion de la date de publication selon le statut choisi[cite: 1]
            if ($validated['status'] === 'PUBLISHED') {
                $article->published_at = now();
            }

            $article->save();

            // Association des tags dans la table pivot articles_tags[cite: 1]
            if (!empty($validated['tags'])) {
                $article->tags()->sync($validated['tags']);
            }

            return redirect()->route('admin.articles.index')
                ->with('success', 'L\'article a bien été créé !');
        }

        /**
         * 3. Afficher le formulaire d'édition avec les données existantes (Écran 5 pré-rempli)
         */
        public function edit(string $slug)
        {
            // On cherche l'article par son slug avec ses relations
            $article = Article::with('tags')->where('slug', $slug)->firstOrFail();
            $categories = Category::all();
            $tags = Tag::all();

            return view('articles-create', compact('article', 'categories', 'tags'));
        }

        /**
         * 4. Mettre à jour l'article édité en base de données
         */
        public function update(Request $request, string $slug)
        {
            $article = Article::where('slug', $slug)->firstOrFail();

            // Validation
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                // Le slug doit rester unique sauf pour l'article en cours de modification
                'slug' => 'required|string|max:100|unique:articles,slug,' . $article->id,
                'content' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'status' => 'required|in:DRAFT,PUBLISHED',
                'tags' => 'nullable|array',
                'tags.*' => 'exists:tags,id',
            ]);

            // Mise à jour des champs
            $article->title = $validated['title'];
            $article->slug = Str::slug($validated['slug']);
            $article->content = $validated['content'];
            $article->id_category = $validated['id_category'];

            // Si l'article passe de Brouillon à Publié, on met à jour la date de publication[cite: 1]
            if ($validated['status'] === 'PUBLISHED' && $article->status !== 'PUBLISHED') {
                $article->published_at = now();
            } elseif ($validated['status'] === 'DRAFT') {
                $article->published_at = null;
            }

            $article->status = $validated['status'];
            $article->save();

            // Synchronisation des tags (retire les anciens non cochés, ajoute les nouveaux)[cite: 1]
            $article->tags()->sync($validated['tags'] ?? []);

            return redirect()->route('admin.articles.index')
                ->with('success', 'L\'article a bien été modifié !');
        }

        /**
         * 5. Supprimer un article (Écran 6)
         */
        public function destroy(string $slug)
        {
            $article = Article::where('slug', $slug)->firstOrFail();

            // On le supprime (Laravel va gérer la suppression en cascade de la table pivot et des commentaires si paramétré)[cite: 1]
            $article->delete();

            return redirect()->route('admin.articles.index')
                ->with('success', 'L\'article a bien été supprimé !');
        }
}

