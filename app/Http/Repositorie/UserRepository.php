<?php

namespace App\Http\Repositorie;

use App\Models\Precommande;
use Illuminate\Support\Facades\DB;

class UserRepository{

    public function serveur_commandes(int  $id){
        DB::statement("SET SQL_MODE=''");
        $precommandes = Precommande::whereUser_id($id)->join('commandes','precommandes.id','=','commandes.id')->join('users','users.id','=','precommandes.user_id')->
        join('tables','tables.id','=','precommandes.table_id')->join('produits','produits.id','=','commandes.produit_id')->groupBy('produits.name')->get();
        return $precommandes;
        
    }


}