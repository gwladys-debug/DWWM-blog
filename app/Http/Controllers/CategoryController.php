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
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validation des champs
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // 2. Création de la catégorie (avec génération du slug)
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        // 3. Redirection vers la liste avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès !');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
