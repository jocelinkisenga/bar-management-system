<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dette extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'precommande_id','client_name','client_phone', 'avance', 'paid'];

    public function precommande () {
        return $this->belongsTo(Precommande::class);
    }
}
