<?php

namespace App\Http\Controllers;


use App\Http\Repositorie\UserRepository;
use App\Models\Commande;
use App\Models\Precommande;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
 protected $user_repo;

    public function __construct()
    {
        $this->user_repo = new UserRepository;
    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        return view('pages.users');
    }


    
    /**
     * Summary of show
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return ['data'=>user-detail','precommande']
     */
    public function show(int $id){
        $data = User::find($id);
       DB::statement("SET SQL_MODE=''");
       $precommandes = Commande::latest('commandes.created_at')->join('precommandes','precommandes.id','commandes.precommande_id')->with('reduction')->where('precommandes.server_id',$id)->groupBy('commandes.precommande_id')->get();
   
        return view('pages.userdetail',compact('data','precommandes'));
    }
}
