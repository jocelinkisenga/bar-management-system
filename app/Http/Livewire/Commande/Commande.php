<?php

namespace App\Http\Livewire\Commande;

use App\Http\Repositorie\CommandeRepositorie;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Commande as ModelsCommande;

class Commande extends Component
{
    public $commande_id, $products, $produit_id, $precommande_id, $quantity_commande, $commandes;



    private function reset_fields()
    {
        $this->quantity_commande;
    }

    public function ajouter( $commandeId)
    {
        $validate = $this->validate([
            'quantity_commande'=>'required'
        ]);
        $commande = new  CommandeRepositorie;
        $this->precommande_id = $commandeId;
        

        $produit = $commande->produit_by_id($this->produit_id);

        if ($produit) {

            $comm =  $commande->commande_by_id($this->precommande_id, $this->produit_id);

            if ($comm->isEmpty()) {

                $commande->store_command($this->precommande_id, $this->produit_id, $this->quantity_commande);
            } else {

                $commande->update_quantity($this->precommande_id, $this->produit_id, $this->quantity_commande);
            }
        }
    }

    public function reduire($commandId, $produitId)
    {
       
        $commande = new  CommandeRepositorie;
       $result =  $commande->reduire_quantity($commandId, $produitId);
     
      
    }

    
    public function annuler($commandId, $produitId,$quantity)
    {
       
        $commande = new  CommandeRepositorie;
       $result =  $commande->delete_commande($commandId, $produitId,$quantity);
     
      
    }

    public function render()
    {
        $commande = new  CommandeRepositorie;

        $this->products = Produit::all();
        $this->commandes = $commande->commande_by_product($this->commande_id);
        return view('livewire.commande.commande');
    }
}
