<?php

namespace App\Http\Livewire;

use App\Enums\RoleEnum;
use App\Http\Repositorie\CommandeRepositorie;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Precommande;
use App\Models\Produit;
use App\Models\Serveur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component

{
    public $categories, $produits, $servers, $server_id, $last_commande,
     $quantity_commande = 1, $produit_id, $commandes, $precommandes, $facture, $invoce;
     protected $commande_repo;

     public function __construct()
     {
        $this->commande_repo = new CommandeRepositorie;
     }


    public function render()
    {
        $this->last_commande = Precommande::latest('created_at')->with('reductions')->first();
        $this->invoce =$this->commande_repo->facture($this->last_commande->id);
        $this->commandes  = $this->commande_repo->all_commandes($this->last_commande->id);
        $this->categories = Categorie::all();
        $this->produits = Produit::all();
        $this->precommandes =$this->commande_repo->all_precommandes();
       // $this->facture =$this->commande_repo->facture($this->last_commande->id);

        $this->serveurs = User::whereRole_id(RoleEnum::SERVER)->get();

        return view('livewire.home');
    }

    public function store()
    {

        $code = '#' . date('Y-m-d') . rand(1, 1000);

        Precommande::create([
            'server_id' => $this->server_id,
            'user_id' => Auth::user()->id,
            'code' => $code
        ]);
    }

    public function reduction($commandeId){
       dd( $this->commande_repo->reduction($commandeId));
    }




    private function reset_fields()
    {
        $this->quantity_commande;
    }

    public function ajouter($produitId)
    {


        $this->produit_id = $produitId;

        $produit =$this->commande_repo->produit_by_id($this->produit_id);

        if ($produit) {

            $comm = $this->commande_repo->commande_by_id($this->last_commande->id, $this->produit_id);

            if (empty($comm)) {

               $this->commande_repo->store_command($this->last_commande->id, $this->produit_id, $this->quantity_commande);
            } else {

               $this->commande_repo->update_quantity($this->last_commande->id, $this->produit_id, $this->quantity_commande);
            }
        }
    }

    public function reduire($commandId, $produitId)
    {


        $result = $this->commande_repo->reduire_quantity($commandId, $produitId);
    }


    public function annuler($commandId, $produitId, $quantity)
    {


        $result = $this->commande_repo->delete_commande($commandId, $produitId, $quantity);
    }

    public function facture($commandeId){
        $this->facture =$this->commande_repo->facture($commandeId);
    }
}
