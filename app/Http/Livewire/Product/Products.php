<?php

namespace App\Http\Livewire\Product;


use App\Models\Categorie;
use App\Models\HystoryProduct;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;
    
    public $data, $name,$categorie_id, $categories, $produit_id, $produit_quantity,$product_price, $price, $prix_achat,$prix_vente,$photo;

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
        $fileName= time().'.'.$this->photo->getClientOriginalName();
        
        $path=$this->photo->storeAs('uploads', $fileName, 'public');

        
        // $valide = $this->validate([
        //     'categorie_id' => "required",
        //     'name' => "required",
        //     'price' => "required",
        //     'path'=>'require'
        // ]);

        Produit::create([
            'categorie_id'=>$this->categorie_id,
            'name'=>$this->name,
            'price'=>$this->price,
            'path'=>$fileName
        ]);
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
