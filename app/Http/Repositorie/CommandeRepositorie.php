<?php

namespace App\Http\Repositorie;

use App\Models\Produit;
use App\Models\Precommande;
use App\Models\Commande;
use App\Models\Reduction;
use App\Models\Table;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeRepositorie
{
        //returns commande by id
        public function produit_by_id(int $produitId)
        {
                return Produit::whereId($produitId)->where("company_id", "=", Auth::user()->company_id)->first();
        }

        //returns all precommandes
        public function all_precommandes()
        {
                return Precommande::latest()->whereStatus(false)->where("company_id", "=", Auth::user()->company_id)->get();
        }
        public function today_commandes()
        {
                return Precommande::where();
        }

        //returns all 
        public function all_commandes($code)
        {
                return Commande::wherePrecommande_id($code)->where("company_id", "=", Auth::user()->company_id)->whereStatus(false)->with('produit')->get();
        }

        public function commande_by_id(int $commandId, int $produitId)
        {
                return $result = Commande::wherePrecommande_id($commandId)->whereProduit_id($produitId)->whereCompany_id(Auth::user()->company_id)->first();
        }

        //THIS FUNCTION UPDATES COMMANDES QUANTITY BY PRODUCT ID AND COMMAND ID
        public function update_quantity(int $commandId, int $produitId, $quantity)
        {

                if ($quantity < $this->product_qty($produitId)) {
                        $result = Commande::wherePrecommande_id($commandId)->whereCompany_id(Auth::user()->company_id)->where('produit_id', '=', $produitId)->first();
                        if (!empty($result)) {
                                $Oldqty = $result->quantity_commande;
                                $new_qty = $Oldqty + $quantity;

                                $result->update([
                                        "quantity_commande" => $new_qty
                                ]);

                                $this->substract_quantity($produitId, $quantity);
                        }
                } else {
                        session()->flash('message', 'vous n\'avez plus bcp des produits');
                }
        }

        //this function creates a new command
        public function store_command($commande, int $produitId, $quantity)
        {
                if ($quantity < $this->product_qty($produitId)) {

                        Commande::create([
                                'precommande_id' => $commande,
                                "produit_id" => $produitId,
                                "quantity_commande" => $quantity,
                                "company_id" => Auth::user()->company_id
                        ]);
                        $this->substract_quantity($produitId, $quantity);
                } else {
                        session()->flash('message', 'vous n\'avez plus bcp des produits');
                }
        }

        public function commande_by_product($commandId)
        {
                return Commande::where('precommande_id', '=', $commandId)
                        ->join('produits', 'commandes.produit_id', '=', 'produits.id')
                        ->get(['commandes.*', 'produits.name', 'produits.id as pId']);
        }

        //this function updates product quantity by substracting it 
        public function substract_quantity($productId, $quantity)
        {
                $result = Produit::where('id', '=', $productId)->first();
                if (!empty($result)) {
                        $qty = $result->quantity;
                        if ($qty >= $quantity) {
                                $new_qty = $qty - $quantity;

                                $result->update([
                                        "quantity" => $new_qty
                                ]);
                        }
                }
        }

        // diminue la quatinté des produits d'une commande
        public function reduire_quantity(int $commandId, int $produitId)
        {
                $result = Commande::wherePrecommande_id($commandId)->whereCompany_id(Auth::user()->company_id)->whereProduit_id($produitId)->first();
                if (!empty($result)) {
                        $new_qty = $result->quantity_commande - 1;
                        $this->restore_product($produitId, 1);
                        $result->update([
                                'quantity_commande' => $new_qty
                        ]);
                }
        }

        //annule une commande
        public function delete_commande(int $commandId, int $produitId, $qty)
        {
                $result = Commande::wherePrecommande_id($commandId)->whereCompany_id(Auth::user()->company_id)->where('produit_id', '=', $produitId)->first();
                if (!empty($result)) {
                        $this->restore_product($produitId, $qty);
                        $result->delete();
                }
        }

        // mets à jour la quantité des produits après reduction ou annulation de la commande
        public function restore_product($productId, $quantity)
        {
                $result = Produit::whereId($productId)->first();
                if (!empty($result)) {
                        $qty = $result->quantity;
                        if ($qty >= $quantity) {
                                $new_qty = $qty + $quantity;

                                $result->update([
                                        "quantity" => $new_qty
                                ]);
                        }
                }
        }

        // retourne la quantité des produits
        public function product_qty($productId)
        {
                $produit = Produit::whereId($productId)->first();
                return $produit->quantity;
        }

        //retourne la facture
        public function facture($commandId)
        {

                return DB::select("SELECT SUM(commandes.quantity_commande) as qty,
                reductions.pourcentage,
                produits.name, 
                produits.price,
                produits.id as produit_id, 
                precommandes.created_at, 
                precommandes.id as pId,
                precommandes.invoiced,
                 precommandes.code 
                FROM commandes
                INNER JOIN precommandes ON commandes.precommande_id = precommandes.id
                INNER JOIN produits ON commandes.produit_id = produits.id 
                LEFT JOIN reductions ON  reductions.precommande_id = precommandes.id
                WHERE precommandes.id = ?
                GROUP BY produit_id, produits.name,
                 produits.price,
                 reductions.pourcentage, 
                 precommandes.created_at, 
                 precommandes.id, 
                 precommandes.invoiced, 
                 precommandes.code
                ", [$commandId]);
        }

        // retourne la dernière commande
        public function last_commande($tableId)
        {
                return Precommande::whereTable_id($tableId)
                        ->whereStatus(false)
                        ->whereCompany_id(Auth::user()->company_id)
                        ->with('reductions')->first();
        }

        // confirme la commande
        public function confirm(int $id)
        {
                $precommande = Precommande::where('id', '=', $id)->first();
                $table = Table::findOrFail($precommande->table_id);

                $table->update([
                        "status" => false
                ]);
                $precommande->update([
                        'status' => true
                ]);
                session()->forget($table->name);
        }

        public function todays()
        {
                DB::statement("SET SQL_MODE=''");
                return DB::select("SELECT commandes.*, precommandes.code, produits.name, produits.price
         FROM commandes,produits, precommandes
          WHERE DATE(commandes.created_at) = DATE(now()) 
          AND produits.id = commandes.produit_id
          AND precommandes.id = precommande_id
         GROUP BY produit_id");
        }
}