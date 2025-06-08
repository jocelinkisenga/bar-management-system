<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'motif', 'montant', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'uder_id');
    }

        public function user () {
    return $this->belongsTo(User::class,'user_id','user_id');
    }
    
}
