<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public $clients ;
    public function index() {
        $this->clients = User::whereRole_id_(RoleEnum::ADMIN)->get();

        return view("superadmin.index", compact($this->clients));
        
    }
}
