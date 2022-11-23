<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HystoryProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','new_quantity','old_quantity','prix_achat'];

    public function produit(){
        return $this->belongsTo(Produit::class,"product_id");
    }
}
