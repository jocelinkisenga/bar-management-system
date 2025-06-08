<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reduction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','precommande_id','prix_reduit','status','pourcentage','reduit'];

    public function precommande(){
        return $this->belongsTo(Precommande::class);
    }

    public function user_company () {
    return $this->belongsTo(User::class,'user_id','company_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function commande(){
        return $this->belongsTo(Commande::class,'precommande_id');
    }
}
