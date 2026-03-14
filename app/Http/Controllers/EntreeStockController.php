<?php

namespace App\Http\Controllers;
use App\Models\EntreeStock;
use App\Models\Produit;

use Illuminate\Http\Request;

class EntreeStockController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required',
            'quantite' => 'required|integer|min:1'
        ]);

        EntreeStock::create([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite
        ]);

        $produit = Produit::find($request->produit_id);
        $produit->quantite += $request->quantite;
        $produit->save();

        return redirect()->back()->with('success','Entrée enregistrée');
    }
}
