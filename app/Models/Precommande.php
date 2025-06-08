<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precommande extends Model
{
    use HasFactory;
    protected $fillable = ['status','server_id','user_id','code','invoiced', 'table_id', 'gerant_id'];

public function server(){
    return $this->belongsTo(User::class,'server_id');
}

public function commandes(){
    return $this->hasMany(Commande::class);
}

public function reductions(){
    return $this->hasMany(Reduction::class);
}

public function table () {
    return $this->belongsTo(Table::class,'table_id')->withDefault();
}

    public function user () {
    return $this->belongsTo(User::class,'user_id','company_id');
    }

}
