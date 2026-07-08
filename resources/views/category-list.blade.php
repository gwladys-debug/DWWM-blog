<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorie list</title>
</head>

<body>
    <h1>Categorie list</h1>
    @foreach ($categories as $category)
        <div>
            <h2>{{ $category->name }}</h2>
            <p>{{ $category->description }}</p>
        </div>
    @endforeach
</body>

</html>
<?php namespace App\Http\Controllers;

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
