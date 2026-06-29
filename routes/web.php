<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', [ArticleController::class,'show']);

Route::get('/categories', [CategoryController::class, 'index']);
