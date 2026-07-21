<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Liste des articles pour la vue PUBLIQUE / VISITEUR
     * Route : GET /articles
     */
    public function publicIndex()
    {
        $articles = Article::with(['category', 'user'])->paginate(9);

        return view('articles-list', compact('articles'));
    }

    /**
     * Liste des articles pour l'ADMINISTRATION
     * Route Ressource : GET /admin/articles
     */
    public function index()
    {
        // Si tu utilises Route::resource('admin/articles', ...),
        // Laravel appelle par défaut la méthode index().
        // Pour séparer la vue admin, on utilise cette méthode si ta route est personnalisée,
        // ou on la nomme index() si c'est la ressource principale.
        $articles = Article::with(['category', 'user'])->latest()->paginate(7);

        return view('articles-list-admin', compact('articles'));
    }

    /**
     * Voir le détail d'un article spécifique (Visiteur par Slug)
     * Route : GET /articles/{slug}
     */
    public function show(string $slug): View
    {
        $article = Article::with(['category', 'user'])->where('slug', $slug)->firstOrFail();

        return view('article-show', compact('article'));
    }

    /**
     * 1. Afficher le formulaire de création (Admin)
     * Route Ressource : GET /admin/articles/create
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('articles-create', compact('categories', 'tags'));
    }

    /**
     * 2. Enregistrer un nouvel article en BDD (Admin)
     * Route Ressource : POST /admin/articles
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:100|unique:articles,slug',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:DRAFT,PUBLISHED',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article = new Article();
        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['slug']);
        $article->content = $validated['content'];
        $article->status = $validated['status'];
        $article->category_id = $validated['category_id'];
        $article->user_id = Auth::id() ?? 1;

        if ($validated['status'] === 'PUBLISHED') {
            $article->published_at = now();
        }

        $article->save();

        if (!empty($validated['tags'])) {
            $article->tags()->sync($validated['tags']);
        }

        return redirect()->route('admin.articles.index')
            ->with('success', 'L\'article a bien été créé !');
    }

    /**
     * 3. Afficher le formulaire d'édition par ID (Admin)
     * Route Ressource : GET /admin/articles/{article}/edit
     */
    public function edit(Article $article)
    {
        // Laravel récupère automatiquement l'article par son ID !
        $article->load('tags');
        $categories = Category::all();
        $tags = Tag::all();

        return view('articles-create', compact('article', 'categories', 'tags'));
    }

    /**
     * 4. Mettre à jour l'article en BDD par ID (Admin)
     * Route Ressource : PUT /admin/articles/{article}
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:100|unique:articles,slug,' . $article->id,
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:DRAFT,PUBLISHED',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['slug']);
        $article->content = $validated['content'];
        $article->category_id = $validated['category_id'];

        if ($validated['status'] === 'PUBLISHED' && $article->status !== 'PUBLISHED') {
            $article->published_at = now();
        } elseif ($validated['status'] === 'DRAFT') {
            $article->published_at = null;
        }

        $article->status = $validated['status'];
        $article->save();

        $article->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.articles.index')
            ->with('success', 'L\'article a bien été modifié !');
    }

    /**
     * 5. Supprimer un article par ID (Admin)
     * Route Ressource : DELETE /admin/articles/{article}
     */
    public function destroy(Article $article)
    {
        // Laravel trouve l'article par son ID et le supprime directement
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'L\'article a été supprimé avec succès !');
    }
}
