<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrecommandeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TauxController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')
->name('login');

// Route::middleware('auth')->group(function(){
//     Route::get('/home',)->name('home');
// });

// Route::get('/', function () {
//     return view('login');
// });

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::get('/taux',[TauxController::class,'index'])->name('taux');
});

Route::middleware(['gerant','auth'])->group(function(){
    Route::get('/tables',[TableController::class,'index'])->name('tables');
    Route::get('/home',[PrecommandeController::class,'index'])->name('commandes');
    Route::get('/commande/{id}',[CommandeController::class,'new'])->name('new_commande');
    Route::get('/facture/{id}',[HomeController::class,'facture'])->name('facture');
    Route::get('/produit-detail/{id}',[ProductController::class,'show'])->name('product-detail');
});

Route::middleware(['admin','auth'])->group(function(){
    Route::get('/produits',[ProductController::class,'index'])->name('products');
    Route::get('/categories',[CategorieController::class,'index'])->name('categories');


    Route::get("/rapports",[RapportController::class,'index'])->name('rapports');
    Route::get("/dailyRapport",[RapportController::class,'daily'])->name('daily-rapport');
    Route::get("/weeklyRapport",[RapportController::class,'monthly'])->name('weekly-rapport');
    Route::get("/monthlyRapport",[RapportController::class,'monthly'])->name('monthly-rapport');
    Route::post("/search",[RapportController::class,'search'])->name('search');

    Route::get('/dailyStock',[StockController::class,'daily'])->name("daily-stock");
    Route::get('/weeklyStock',[StockController::class,'weekly'])->name("weekly-stock");
    Route::get('/monthStock',[StockController::class,'monthly'])->name("monthly-stock");
    

    Route::get('/depenses',[DepenseController::class,'index'])->name('depenses');
    Route::get('/roles',[RoleController::class,'index'])->name('roles');
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/users-detail/{id}',[UserController::class,'show'])->name('user-detail');

});
require __DIR__.'/auth.php';
