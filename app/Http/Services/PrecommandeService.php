<?php 

declare(strict_types=1);

namespace App\Http\Services; 

use App\Models\Precommande;
use Illuminate\Support\Facades\Auth;

class PrecommandeService {
    
    protected  $table;
    public function __construct()
    {
        $this->table = new TableService;
    }
    public function store_precommande(int $serverId, string  $code, int $tableId  ) {
    return Precommande::create([
                'server_id' => $serverId,
                'gerant_id' => Auth::user()->id,
                'code' => $code,
                'table_id' => $tableId,
                'company_id' => Auth::user()->company_id
            ]);
            //mise a jour du status de la table
            $this->table->update_table($tableId);
    }

    public function invoice_precommande (int $precommandeId) {
            $precommande = Precommande::find($precommandeId);
            $precommande->update([
            "invoiced" => 1
        ]);
    }
}