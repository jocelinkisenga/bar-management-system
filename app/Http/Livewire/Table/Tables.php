<?php

namespace App\Http\Livewire\Table;

use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tables extends Component
{
    public $data, $name, $places;

    public function render()
    {
        $this->data = Table::latest()->whereCompany_id(Auth::user()->company_id)->get();
        return view('livewire.table.tables');
    }

    public function store(){
            $valide = $this->validate([
                'name'=>'required',
                'places'=>'required',
              
            ]);
        Table::create([
            'name' => $valide['name'],
            'places' => $valide['places'],
            "company_id" => Auth::user()->company_id
        ]);
        session()->flash('message','table ajoutée avec succès');
        $this->reset_fields();
    }

    public function reset_fields(){
        $this->places = "";
        $this->name = "";
    }

}
