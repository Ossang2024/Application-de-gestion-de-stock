<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'categorie_id', 'fournisseur_id', 'quantite', 'prix', 'description'];

    // Relation : produit appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Relation : produit appartient à un fournisseur
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    // Relation : produit a plusieurs entrées
    public function entrees()
    {
        return $this->hasMany(EntreeStock::class);
    }

    // Relation : produit a plusieurs sorties
    public function sorties()
    {
        return $this->hasMany(SortieStock::class);
    }
}
