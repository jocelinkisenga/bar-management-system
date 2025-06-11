<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class TableService {

    public function table_with_precommandes () {
     return    Table::with("precommande")->where("company_id", "=", Auth::user()->company_id)->get();
    }

    public function table_by_id (int $tableId) {
        return Table::findOrFail($tableId);
    }
}