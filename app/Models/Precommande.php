<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precommande extends Model
{
    use HasFactory;
    protected $fillable = ['status','server_id','user_id','code','invoiced'];

public function server(){
    return $this->belongsTo(User::class,'server_id');
}

public function commandes(){
    return $this->hasMany(Commande::class);
}

public function reductions(){
    return $this->hasMany(Reduction::class);
}

}
