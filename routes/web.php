<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PortefeuilleController;
use App\Http\Controllers\ProduitController;
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
Route::post('login',[LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::get('/mescommandes',[CommandeController::class, 'commande'])->name('commande');


//frontoffice
Route::get('/frontoffice',[FrontController::class, 'front'])->name('front');
Route::get('/multicritere',[FrontController::class, 'multicritere'])->name('multicritere');
Route::get('/search',[FrontController::class, 'search'])->name('search');
Route::get('/addtocart',[ProduitController::class, 'addToCart'])->name('addToCart');
Route::get('/validecommande',[LoginController::class, 'login'])->name('validecommande');
Route::post('/savecommande',[CommandeController::class, 'savecommande'])->name('savecommande');

// Porte feuille
Route::post('/addportefeuille',[PortefeuilleController::class, 'saveportefeuille'])->name('addportefeuille');
Route::get('/portefeuille',[PortefeuilleController::class, 'formportefeuille'])->name('portefeuille');
Route::get('/validerdepot',[PortefeuilleController::class, 'demandedepot'])->name('validerdepot');


// backoffice
Route::get('/backoffice',[BackController::class, 'back'])->name('back');
Route::get('/formajoutproduit',[BackController::class, 'formajoutproduit'])->name('formajoutproduit');
Route::post('/store',[BackController::class, 'store'])->name('store');

