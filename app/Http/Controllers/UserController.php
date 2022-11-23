<?php

namespace App\Http\Controllers;

use App\Http\Repositorie\UserRepository;
use App\Models\Precommande;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;

class UserController extends Controller
{
    
    public function index(){
        return view('pages.users');
    }

    public function show($id){
        $data = User::find($id);

        $user = new UserRepository;
        $precommandes = $user->serveur_commandes($id);
        return view('pages.userdetail',compact('data','precommandes'));
    }
}
