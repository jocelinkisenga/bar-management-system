<?php

namespace App\Http\Livewire\Product;

use App\Models\Categorie;
use App\Models\HystoryProduct;
use App\Models\Produit;
use Livewire\Component;

class Products extends Component
{
    public $data, $name,$categorie_id, $categories, $produit_id, $produit_quantity,$product_price, $price, $prix_achat,$prix_vente;

    public function render()
    {
        $this->categories = Categorie::all();
        $this->data = Produit::all();
        
        return view('livewire.product.products');
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
    }

    public function store()
    {

        $valide = $this->validate([
            'categorie_id' => "required",
            'name' => "required",
            'price' => "required"
        ]);

        Produit::create($valide);
        session()->flash('message', 'produit ajouté avec succès');
    }


    public function modifier_prix($produitId)
    {

        $produit = Produit::find($produitId);
        $produit->update([
            'price' => $this->product_price
        ]);
        $this->reset_fields();
        session()->flash('message', 'prix modifier');
    }
}
