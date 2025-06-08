<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HystoryProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','new_quantity','old_quantity','prix_achat','user_id'];

    public function produit(){
        return $this->belongsTo(Produit::class,"product_id");
    }

    public function user () {
    return $this->belongsTo(User::class,'user_id','company_id');
    }
}
