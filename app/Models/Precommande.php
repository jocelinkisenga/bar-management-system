<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precommande extends Model
{
    use HasFactory;
    protected $fillable = ['server_id','user_id','code'];

public function server(){
    return $this->belongsTo(User::class,'server_id');
}

public function reductions(){
    return $this->hasMany(Reduction::class);
}

}
