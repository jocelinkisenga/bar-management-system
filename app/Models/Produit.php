<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['categorie_id','name','price','quantity','path', 'user_id'];

    public function hystories(){
        return $this->hasMany(HystoryProduct::class);
    }

    public function user () {
    return $this->belongsTo(User::class,'user_id','company_id');
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
