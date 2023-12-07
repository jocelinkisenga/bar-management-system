<?php

namespace App\Http\Repositorie;

use Illuminate\Support\Facades\DB;

class ProduitRepository
{


    public function hystory_entrie(int $id)
    {
        DB::statement("SET SQL_MODE=''");
        $result = DB::select("SELECT hystory_products.new_quantity as qte,hystory_products.prix_achat as achat
                                    FROM hystory_products, produits
                                    WHERE DATE(hystory_products.created_at) = CURRENT_DATE
                                    AND hystory_products.product_id = $id
                                    AND produits.id = $id
                                ");
        return $result;
    }
}
