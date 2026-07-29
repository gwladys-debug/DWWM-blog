<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| 🌐 1. ROUTES PUBLIQUES (Visiteurs & Connectés)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Articles publics
Route::get('/articles', [ArticleController::class, 'publicIndex'])->name('articles.publicIndex');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');


/*
|--------------------------------------------------------------------------
| 🚪 2. GUEST MIDDLEWARE (Uniquement pour les visiteurs NON connectés)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Inscription
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store')->name('register.store');
    });

    // Connexion
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });
});


/*
|--------------------------------------------------------------------------
| 🔒 3. AUTH MIDDLEWARE (Uniquement pour les utilisateurs CONNECTÉS)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Déconnexion (Accessible par tout utilisateur connecté)
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | 👑 4. ADMIN MIDDLEWARE (Uniquement pour l'ADMINISTRATEUR)
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin')->group(function () {

        // --- 📁 ESPACE CATÉGORIES (Noms : categories.*) ---
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/creer', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/categories/{category}/modifier', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // --- 📝 ESPACE ADMINISTRATION ARTICLES (Noms : admin.articles.*) ---
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('articles.index');
            Route::get('/articles/creer', [ArticleController::class, 'create'])->name('articles.create');
            Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
            Route::get('/articles/{slug}/modifier', [ArticleController::class, 'edit'])->name('articles.edit');
            Route::put('/articles/{slug}', [ArticleController::class, 'update'])->name('articles.update');
            Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
        });
    });
});
