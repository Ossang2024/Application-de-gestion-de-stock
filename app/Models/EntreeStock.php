<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntreeStock extends Model
{
    use HasFactory;

    protected $fillable = ['produit_id', 'quantite', 'date_entree'];
    
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
