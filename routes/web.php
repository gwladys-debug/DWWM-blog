<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

// --- ESPACE ARTICLES VISITEUR ---

Route::get('/articles', [ArticleController::class, 'publicIndex'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// --- ESPACE CATEGORIES ---
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


// --- ESPACE ADMINISTRATION (Route Ressource) ---
// Cette ligne remplace les 6 routes d'administration précédentes !
Route::resource('admin/articles', ArticleController::class)->names('admin.articles');
