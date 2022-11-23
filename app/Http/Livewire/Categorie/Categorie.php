<?php

namespace App\Http\Livewire\Categorie;

use App\Models\Categorie as ModelsCategorie;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Utilities\FormatDate;

class Categorie extends Component
{
    public  $name;
    public $data;
    public function render()
    {
        $this->data = ModelsCategorie::all();
        return view('livewire.categorie.categorie');
    }
     
    public function reset_fields(){
        $this->name = "";
    }

    public function store(){
            $validate = $this->validate(['name'=>'required']);

            ModelsCategorie::create($validate);
            session()->flash('message','categorie created successfully');
            $this->reset_fields();
            $this->emit('categorieStore');
    }

    public function modifier ($id){
        $categorie = ModelsCategorie::find($id);
        $categorie->update([
            "name"=>$this->name
        ]);

        session()->flash('message','categorie modifier avec succès');

    }
}
