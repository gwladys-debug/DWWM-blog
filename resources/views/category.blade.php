<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // 1. On récupère toutes les catégories de la table SQL
        $categories = Category::all();

        // 2. On retourne la vue (ex: index.blade.php) en lui passant les catégories
        return view('blog.index', compact('categories'));
    }
}
