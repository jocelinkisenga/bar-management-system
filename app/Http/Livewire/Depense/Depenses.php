<?php

namespace App\Http\Livewire\Depense;

use App\Models\Depense as ModelsDepense;
use Illuminate\Database\Events\ModelsPruned;
use Livewire\Component;

class Depenses extends Component
{
    public $depenses, $user_id, $motif, $montant;
    public function render()
    {
        $this->depenses = ModelsDepense::all();
        return view('livewire.depense.depenses');
    }

    public function store(){
            $valide = $this->validate([
                "user_id"=>"required",
                "motif"=>"required",
                "montant"=>"required"
            ]);

            ModelsDepense::create($valide);
            $this->reset_fields();
            $this->dispatchBrowserEvent('close-modal');
    }

    private function reset_fields(){
        $this->montant = "";
        $this->user_name = "";
        $this->motif = "";
    }
}
