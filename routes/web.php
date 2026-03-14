<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\EntreeStockController;
use App\Http\Controllers\SortieStockController;
use App\Http\Controllers\DashboardController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('categories', CategorieController::class);

Route::resource('produits', ProduitController::class);

Route::post('/entrees', [EntreeStockController::class, 'store'])->name('entrees.store');

Route::post('/sorties', [SortieStockController::class, 'store'])->name('sorties.store');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



// Routes publiques (liste et détail)
Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');

Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');

// Routes protégées (admin seulement)
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::resource('produits', ProduitController::class)->except(['index', 'show']);
    Route::resource('categories', CategorieController::class)->except(['index', 'show']);
});