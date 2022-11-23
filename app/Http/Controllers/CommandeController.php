<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function new (int $id){
        $id = $id;
        return view('pages.commandes',compact('id'));
    }
}
