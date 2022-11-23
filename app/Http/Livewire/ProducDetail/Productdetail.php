<?php

namespace App\Http\Livewire\ProducDetail;

use App\Http\Repositorie\ProduitRepository;
use App\Models\Produit;
use Livewire\Component;
use App\Models\HystoryProduct;

class Productdetail extends Component
{
    public $data, $product_id, $prix_achat, $produit_quantity, $prix, $commandes, $entries ;


 

    public function render()
    {
     $repo = new ProduitRepository;
      $this->data =  Produit::findOrFail($this->product_id);
      $this->entries = $repo->hystory_entrie($this->product_id);
      $this->commandes = $repo->hystory_commandes($this->product_id);

        return view('livewire.produc-detail.productdetail');
    }

    
    public function ajouter($produitI)
    {
     
        $produit = Produit::find($produitI);
   
        $old_quantity = $produit->quantity;

        $history =  HystoryProduct::create([
            'product_id' => $produitI,
            'new_quantity' => $this->produit_quantity,
            'old_quantity' => $old_quantity,
            'prix_achat' => $this->prix_achat
        ]);
        if ($history) {
            $updated_quantity = $old_quantity + $this->produit_quantity;
            $produit->update([
                'quantity' => $updated_quantity
            ]);
            $this->reset_fields();
            session()->flash('message', 'quantite ajouté avec succès');
        }
    }

    public function reset_fields()
    {
        $this->name = "";
        $this->categorie_id = "";
        $this->price = "";
        $this->produit_quantity = "";
        $this->product_price = "";
        $this->prix_achat = "";
        $this->produit_id = "";
        $this->prix_vente = "";
        $this->prix = "";
    }

    public function modifier_prix($id){
       $produit =  Produit::find($id);
       $produit->update([
        "price"=>$this->prix
       ]);
       $this->reset_fields();
     session()->flash('message','prix modifier avec succès');
        
    }


}
