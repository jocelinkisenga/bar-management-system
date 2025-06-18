<?php 

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Dette;
use Illuminate\Support\Facades\Auth;

class DetteService {

    protected $precommande;
    public function __construct() {
        $this->precommande = new PrecommandeService;
    }

    public function store_dette (string $clientName, string $clientPhone, float $advance, int $precommandeId) {
        Dette::create(
            [
                "company_id" => Auth::user()->company_id,
                "precommande_id" => $precommandeId,
                "client_name" => $clientName,
                "client_phone" => $clientPhone,
                "avance" => $advance,
                
            ]
            );

            $this->precommande->confirm($precommandeId);
            return true;

    }
}