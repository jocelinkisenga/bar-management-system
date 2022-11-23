<?php 

namespace App\Http\Repositorie;

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


// $result = "SELECT produit.nom,
// (SELECT SUM(hystory_products.new_quantity) FROM hystory_products 
//                      WHERE hystory_products.product_id = produits.id 
//                      AND  DATE(hystory_products.created_at) >= $from AND DATE(hystory_products.created_at) <= $to )
//                      AS input,
//              (SELECT SUM(commandes.quantity_commande)  
//                  FROM commandes 
//                  WHERE commande.produit_id = produit.id 
//                  AND day(commande.created_at) <= day(CURRENT_DATE)-7)
//                  AS qty_commande, produit.quantite 
//                  AS qty_total, -commande.quantite + produit.quantite as solde
//      FROM produit,commande,quantite_produit 
//      WHERE  commande.produit_id = produit.id 
//      AND day(commande.created_at) <= day(CURRENT_DATE)-7 
//      AND day(quantite_produit.created_at) <= day(CURRENT_DATE)-7  
//      AND quantite_produit.id_produit = produit.id
//      GROUP BY produit.nom ";


//$result = DB::table('hystory_products')->join('produits', 'hystory_products.product_id', '=', 'produits.id')
// ->join('commandes', 'produits.id', '=', 'commandes.produit_id')
// ->select('produits.name', 'hystory_products.new_quantity', 'produits.quantity','commandes.quantity_commande')
// ->where("CAST(commandes.created_at AS DATE","=", "CURRENT_DATE")->get();


//$result = HystoryProduct::with('produit')->groupBy("hystory_products.product_id")->get();
return $result;
    }
} 