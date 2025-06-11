<?php 

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class CategoryService {

    public function category_with_products () {
       return Categorie::with('produits')->whereCompany_id(Auth::user()->company_id)->get();
    }
}