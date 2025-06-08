<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['name','places','status' ,'user_id'];



    public function precommande(){ 
        return $this->HasOne(Precommande::class);
    }

     public function user () {
    return $this->belongsTo(User::class,'user_id','user_id');
    }
}
