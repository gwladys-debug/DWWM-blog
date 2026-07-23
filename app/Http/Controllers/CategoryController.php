<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. On récupère toutes les catégories de la table SQL
        $categories = Category::withCount('articles')->paginate(2);

        // 2. On retourne la vue en lui passant les catégories
        return view('categories.category-list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. On valide les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
        ]);

        // 2. Génération du slug s'il n'est pas fourni, puis création
        Category::create([
            'name' => $validated['name'],
            'slug' => !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']),
        ]);

        // 3. On redirige vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.category-show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // 1. On valide les données du formulaire en ignorant l'ID actuel pour les règles uniques
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        // 2. On met à jour les données de la catégorie
        $category->update([
            'name' => $validated['name'],
            'slug' => !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']),
        ]);

        // 3. On redirige vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // 1. Règle métier : On vérifie si la catégorie contient des articles
        if ($category->articles()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car des articles y sont rattachés !');
        }

        // 2. On supprime la catégorie
        $category->delete();

        // 3. On redirige vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès !');
    }
}
