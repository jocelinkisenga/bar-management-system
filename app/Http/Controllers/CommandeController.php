<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Precommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function new (int $id){
        $id = $id;
        return view('pages.commandes',compact('id'));
    }

    public function admin_commande(){




        DB::statement("SET SQL_MODE=''");
        $commandes = Commande::latest()->with('precommande')->with('reduction')->groupBy('precommande_id')->get();
       
        return view('Pages.adminCommandes',compact('commandes'));
    }
    // public function show(int $id){
    //     return view("Pages.CommandeDetail");'
    // }
}
