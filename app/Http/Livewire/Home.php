<?php

namespace App\Http\Livewire;

use App\Enums\RoleEnum;
use App\Http\Repositorie\CommandeRepositorie;
use App\Http\Repositorie\ReductionRepositorie;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Precommande;
use App\Models\Produit;
use App\Models\Serveur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use SebastianBergmann\Type\NullType;

class Home extends Component

{
    public  $categories, $produits, $servers, 
            $server_id, $last_commande = null,
            $quantity_commande = 1, $produit_id, $commandes,
           $precommandes, $facture, $invoce, $reductions,$todays;

    protected $commande_repo, $reduction_repo;

    public function __construct()
    {
        $this->commande_repo = new CommandeRepositorie;
        $this->reduction_repo = new ReductionRepositorie;
    }


    public function render()
    {


        if ($this->last_commande) {
            $this->invoce = $this->commande_repo->facture($this->last_commande->id);
            $this->commandes  = $this->commande_repo->all_commandes($this->last_commande->id);
        }

        $this->categories = Categorie::with('produits')->get();
        $this->produits = Produit::all();
        $this->precommandes = $this->commande_repo->all_precommandes();
        $this->reductions = $this->reduction_repo->reductions();
        $this->todays = $this->commande_repo->todays();
      
     

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
        session()->flash('message','commande créer  avec succès');
    }

    public function reduction($commandeId)
    {
        $this->reduction_repo->store($commandeId);
    }



    public function ajouter($produitId)
    {


        $this->produit_id = $produitId;

        $produit = $this->commande_repo->produit_by_id($this->produit_id);

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

    public function facture($commandeId)
    {
        $this->facture = $this->commande_repo->facture($commandeId);
    }

    public function edit($id)
    {


        return $this->last_commande =  $this->commande_repo->last_commande($id);
    }

    public function confirmer(int $id)
    {

        $this->commande_repo->confirm($id);
    }

    public function confirm_reduction(int $id){
        $this->reduction_repo->confirm($id);
    }
}
