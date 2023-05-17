<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login
Route::get('/',[LoginController::class, 'index'])->name('index');
Route::post('/login',[UtilityController::class, 'authenticate'])->name('authenticate');
Route::get('/logoutadmin',[UtilityController::class, 'logoutadmin'])->name('logoutadmin');
Route::get('/login',[UtilityController::class, 'login'])->name('login');


//frontoffice
Route::get('/frontoffice',[FrontController::class, 'front'])->name('front');



// backoffice
Route::get('/backoffice',[LoginController::class, 'getallmagasin'])->name('back');

// produit
Route::get('/formajoutproduit',[ProduitController::class, 'formajoutproduit'])->name('formajoutproduit');
Route::get('/listproduit',[ProduitController::class, 'getallproduit'])->name('listeproduit');
Route::post('/store',[ProduitController::class, 'store'])->name('store');

// Magasin
Route::get('/formajoutmagasin',[MagasinController::class, 'formajoutmagasin'])->name('formajoutmagasin');
Route::post('/storemagasin',[MagasinController::class, 'storemagasin'])->name('storemagasin');


// Magasin compte
Route::get('/logout',[UtilityController::class, 'logoutmagasin'])->name('logoutmagasin');

// COnfiguration
Route::get('/formajoutmarque',[ConfigController::class, 'formajoutmarque'])->name('formajoutmarque');
Route::get('/formajoutproc',[ConfigController::class, 'formajoutproc'])->name('formajoutproc');
Route::post('/storeprocesseur',[ConfigController::class, 'storeproc'])->name('storeprocesseur');
Route::post('/storemarque',[ConfigController::class, 'storemarque'])->name('storemarque');


// User
Route::get('/formajoutuser',[UserController::class, 'formajoutuser'])->name('formajoutuser');
Route::post('/storeuser',[UserController::class, 'storeuser'])->name('storeuser');
Route::get('/listuser',[UserController::class, 'getalluser'])->name('listuser');
Route::get('/edit/{iduser}',[UserController::class, 'formedituser'])->name('edit');
Route::post('/modifier',[UserController::class, 'edituser'])->name('modifier');
Route::get('/affecter/{iduser}',[UserController::class, 'formaffecteruser'])->name('affecter');
Route::post('/affecter',[UserController::class, 'affecter'])->name('affecteruser');

// Stock
Route::get('/achat',[StockController::class, 'formachat'])->name('achat');
Route::post('/achatlaptop',[StockController::class, 'achatlaptop'])->name('achatlaptop');
Route::get('/stocklaptop',[StockController::class, 'stocklaptop'])->name('stocklaptop');
Route::get('/formtransfer/{idlaptop}',[StockController::class, 'formtransfer'])->name('formtransfer');
Route::post('/transfermag',[StockController::class, 'transfermag'])->name('transfermag');

// STock magasin
Route::get('/entreemagasin',[StockController::class, 'entreemagasin'])->name('entreemagasin');
Route::post('/confirmetransfermag',[StockController::class, 'confirmetransfermag'])->name('confirmetransfermag');
Route::get('/tocentrale',[StockController::class, 'tocentrale'])->name('tocentrale');
Route::get('/formrenvoyer/{idlaptop}',[StockController::class, 'formrenvoyer'])->name('formrenvoyer');
Route::post('/confirmerrenvoie',[StockController::class, 'confirmerrenvoie'])->name('confirmerrenvoie');

Route::get('/vente',[StockController::class, 'vente'])->name('vente');
Route::get('/formvente',[StockController::class, 'formvente'])->name('formvente');
Route::post('/confirmervente',[StockController::class, 'confirmervente'])->name('confirmervente');



