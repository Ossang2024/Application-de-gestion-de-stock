<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Fournisseur;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduits = Produit::count();
        $totalCategories = Categorie::count();
        $totalFournisseurs = Fournisseur::count();
        $produitsRecents = Produit::orderBy('created_at', 'desc')->take(5)->get();
        $totalQuantite = Produit::sum('quantite');

        $stockFaible = Produit::where('quantite', '<', 5)->get();

        return view('dashboard', compact(
            'totalProduits',
            'totalCategories',
            'totalFournisseurs',
            'stockFaible',
            'produitsRecents',
            'totalQuantite'
        ));
    }
}