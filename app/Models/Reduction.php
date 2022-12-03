<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reduction extends Model
{
    use HasFactory;

    protected $fillable = ['precommande_id','prix_reduit','status','pourcentage','reduit'];

    public function precommande(){
        return $this->belongsTo(Precommande::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
