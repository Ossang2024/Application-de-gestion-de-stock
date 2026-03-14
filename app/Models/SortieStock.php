<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SortieStock extends Model
{
    use HasFactory;

    protected $fillable = ['produit_id', 'quantite', 'date_sortie'];
    protected $table = 'sorties_stock';


    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
