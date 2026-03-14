<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\SortieStock;

class SortieStockController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required',
            'quantite' => 'required|integer|min:1'
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        if ($request->quantite > $produit->quantite) {
            return back()->with('error', 'Stock insuffisant');
        }

        SortieStock::create([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite
        ]);

        $produit->quantite -= $request->quantite;
        $produit->save();

        return back()->with('success', 'Sortie de stock enregistrée');
    }
}
