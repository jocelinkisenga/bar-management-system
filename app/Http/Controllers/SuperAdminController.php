<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
  public $clients;
  public function index()
  {
    $this->clients = User::whereRole_id(RoleEnum::ADMIN)->get();

    return view("superadmin.index", ['clients' => $this->clients]);

  }

  public function activate($user_id)
  {
    $user = User::findOrFail($user_id);
    $user->update([
      'elligible' => true
    ]);
    return redirect()->back();
  }

  public function deactivate($user_id)
  {
    $user = User::findOrFail($user_id);
    $user->update([
      'elligible' => false
    ]);

    return redirect()->back();
  }
}
