<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class TableService
{

    public function table_with_precommandes()
    {
        return Table::with("precommande")->where("company_id", "=", Auth::user()->company_id)->get();
    }

    public function table_by_id(int $tableId)
    {
        return Table::findOrFail($tableId);
    }

    public function update_table(int $tableId)
    {
        $table = Table::findOrFail(intval($tableId));
        if ($table->status == false) {
            $table->update(["status" => true]);
        } else {
            $table->update(["status" => false]);
        }

    }
}