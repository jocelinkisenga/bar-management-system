<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['precommande_id','produit_id','quantity_commande','status','reduction'];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function precommande(){
        return $this->belongsTo(Precommande::class);
    }

    public function reduction(){
        return $this->belongsTo(Reduction::class,'precommande_id');
    }
}
