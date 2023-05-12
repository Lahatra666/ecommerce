<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Portefeuille;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortefeuilleController extends Controller
{
        public function formportefeuille(Request $request){
            $categorie = Categorie::with(['produits'])->get();
            $cart = $request->session()->get('cart', []);
            $iduser = session('iduser');
            $user = DB::table('users')->select('*')
            ->where('iduser','=', $iduser)
            ->get();
            if(empty($cart)){
              return view('users.formportefeuille', [
                'users'=>$user,
                'categorie'=>$categorie,
                'cart'=>[]
              ]);          
            }
            else if(!empty($cart)){
              return view('users.formportefeuille', [
                'users'=>$user,
                'categorie'=>$categorie,
                'cart'=>$cart
              ]); 
         }
    }
    public function saveportefeuille(Request $request){
      $id = session('iduser');
      $iduser = intval($id);
      $valeur = intval($request->valeur);
      // $portefeuille = Portefeuille::where('iduser',$iduser)->get();
      //  if(count($portefeuille)==1){
      // DB::table('portefeuilles')
      //   ->where('iduser','=',$iduser)
      //   ->update(['valeur'=>DB::raw('valeur+'.$valeur)]);
      //  }
      // else if(count($portefeuille)==0){
        Portefeuille::create([
          'iduser'=>$iduser,
          'valeur'=>$valeur
      ]);
      // }
        //  $iduser;
      // $this->formportefeuille($request);
    }

    // Admin
    
    public function demandedepot(){
      $users = User::with(['portefeuille'  
      // =>function ($query){
      //   $query->where('etat','=','0');
      // }
      ])->get();

      return view('back.demandedepot', [
        'users'=>$users
      ]); 
    }
  }
