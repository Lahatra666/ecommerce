<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function commande(Request $request){
        $categorie = Categorie::with(['produits'])->get();
        $cart = $request->session()->get('cart', []);
        $iduser = session('iduser');
        $user = DB::table('users')->select('*')
        ->where('iduser','=', $iduser)
        ->get();
        if(empty($cart)){
          return view('users.commande', [
            'users'=>$user,
            'categorie'=>$categorie,
            'cart'=>[]
          ]);          
        }
        else if(!empty($cart)){
          return view('users.commande', [
            'users'=>$user,
            'categorie'=>$categorie,
            'cart'=>$cart
          ]); 
     }
    }
    public function savecommande(Request $request){
        $arrayproduits= $request->idproduit;
        $arrayuser =$request->iduser;

        foreach($arrayproduits as $arrayproduit){
            $jsonproduit = intval($arrayproduit);
            $jsonuser = intval($arrayuser);
            Panier::create([
                'idproduit'=>$jsonproduit,
                'iduser'=>$jsonuser
            ]);
                // echo $jsonproduit;
                // echo $jsonuser;
                session()->forget('cart');
            }
    }
}
