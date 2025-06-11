<?php 

declare(strict_types=1);

namespace App\Http\Services;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService {

    public function servers () {
       return  User::whereRole_id(RoleEnum::SERVER)->where("company_id", "=", Auth::user()->company_id)->get();
    }
}