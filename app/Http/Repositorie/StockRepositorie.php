<?php 

namespace App\Http\Repositorie;

use App\Models\Commande;
use App\Models\HystoryProduct;
use Illuminate\Support\Facades\DB;

class StockRepositorie {

    public function stock($from, $to){
        DB::statement("SET SQL_MODE=''");
     $result =   DB::select("SELECT produits.name,DATE(hystory_products.created_at), 
                                    hystory_products.prix_achat as achat, produits.price as vente, 
                                    (SELECT SUM(new_quantity) 
                                        FROM hystory_products 
                                        WHERE hystory_products.product_id = produits.id 
                                        AND DATE(hystory_products.created_at) >= '$from'AND DATE(hystory_products.created_at) <= '$to') as entries,
                                        (SELECT SUM(old_quantity) 
                                        FROM hystory_products 
                                        WHERE hystory_products.product_id = produits.id 
                                        AND DATE(hystory_products.created_at) >= '$from'AND DATE(hystory_products.created_at) <= '$to') as solde,
                                     (SELECT SUM(commandes.quantity_commande)
                                         FROM commandes
                                          WHERE commandes.produit_id = produits.id
                                          AND DATE(commandes.created_at) >= '$from'AND DATE(commandes.created_at) <= '$to') as outputs 
                                FROM hystory_products, produits,commandes WHERE DATE(hystory_products.created_at) >= '$from' AND DATE(hystory_products.created_at) <= '$to' GROUP BY (produits.name)");




//$result = HystoryProduct::with('produit')->groupBy("hystory_products.product_id")->get();
return $result;
    }

} 