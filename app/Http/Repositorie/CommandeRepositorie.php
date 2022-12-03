<?php

namespace App\Http\Repositorie;

use App\Models\Produit;
use App\Models\Precommande;
use App\Models\Commande;
use App\Models\Reduction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeRepositorie
{

        //returns commande by id
        public function produit_by_id(int $produitId)
        {

                return    Produit::whereId($produitId)->first();
        }

        //returns all precommandes
        public function all_precommandes()
        {
                return Precommande::whereStatus(false)->orderBy('id', 'desc')->get();
        }

        //returns all 
        public function all_commandes($code)
        {
                return Commande::wherePrecommande_id($code)->whereStatus(false)->with('produit')->get();
        }

        public function commande_by_id(int $commandId, int $produitId)
        {
                return  $result =  Commande::where('precommande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
        }

        //THIS FUNCTION UPDATES COMMANDES QUANTITY BY PRODUCT ID AND COMMAND ID
        public function update_quantity(int $commandId, int $produitId, $quantity)
        {

                if ($quantity < $this->product_qty($produitId)) {
                        $result =  Commande::where('precommande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
                        if (!empty($result)) {
                                $qty = $result->quantity_commande;
                                $new_qty = $qty + $quantity;

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
                                "quantity_commande" => $quantity
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
                $result =  Produit::where('id', '=', $productId)->first();
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

        public function reduire_quantity(int $commandId, int $produitId)
        {
                $result =  Commande::where('precommande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
                if (!empty($result)) {
                        $new_qty = $result->quantity_commande - 1;
                        $this->restore_product($produitId, 1);
                        $result->update([
                                'quantity_commande' => $new_qty
                        ]);
                }
        }


        public function delete_commande(int $commandId, int $produitId, $qty)
        {
                $result =  Commande::where('precommande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
                if (!empty($result)) {
                        $this->restore_product($produitId, $qty);
                        $result->delete();
                }
        }

        public function  restore_product($productId, $quantity)
        {
                $result =  Produit::where('id', '=', $productId)->first();
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

        public function product_qty($productId)
        {
                $produit =  Produit::whereId($productId)->first();
                return $produit->quantity;
        }

        public function facture($commandId)
        {

                return  DB::select("SELECT commandes.quantity_commande as qty,
                produits.name, produits.price, precommandes.created_at, precommandes.id as pId 
                FROM precommandes,commandes,produits 
                WHERE commandes.precommande_id = precommandes.id 
                AND precommandes.id = '$commandId' 
                AND commandes.produit_id = produits.id ");
        }



        public function last_commande($id)
        {

                return   Precommande::whereId($id)->whereStatus(false)->whereUser_id(Auth::user()->id)->with('reductions')->first();
        }

        public function confirm(int $id)
        {
                $precommande = Precommande::where('id', '=', $id)->first();
                $precommande->update([
                        'status' => true
                ]);
        }
}
