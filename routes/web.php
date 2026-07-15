<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/admin/articles', [ArticleController::class, 'adminIndex']);

//Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
