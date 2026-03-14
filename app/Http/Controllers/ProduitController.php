<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\SortieStock;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::with(['categorie', 'fournisseur'])->get();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        return view('produits.create', compact('categories', 'fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'quantite' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::with(['categorie', 'fournisseur'])->findOrFail($id);
        $sorties = SortieStock::where('produit_id', $id)->get();

        return view('produits.show', compact('produit', 'sorties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();

        return view('produits.edit', compact('produit', 'categories', 'fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'quantite' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');    
    }
}
