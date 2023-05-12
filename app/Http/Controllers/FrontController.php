<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front(){
        return view('front.homefront');
    }
    public function multicritere(Request $request){
      $idcategorie= intval($request->idcategorie);
      $prixmin= intval($request->prixmin);
      $prixmax= intval($request->prixmax);
        $categorie = Categorie::with(
        ['produits'
        => function ($query) use($prixmin,$prixmax,$idcategorie){
              $query->where(function($q) use($prixmin,$prixmax,$idcategorie){
                if($idcategorie){
                  $q->where('idcategorie','=',$idcategorie);
                }
                if($prixmin && $prixmax){
                  $q->whereBetween('prix',[$prixmin,$prixmax]);    
                }
                if($prixmin){
                  $q->where('prix','>=',$prixmin);
                }
                if($prixmax){
                  $q->where('prix','<=',$prixmax);
                }
              });
            }])
        ->get();
        $cart = $request->session()->get('cart', []);
        if(empty($cart)){
          return view('index', [
            'categorie'=>$categorie,
            'cart'=>[]
          ]);          
        }
        else if(!empty($cart)){
          return view('index', [
            'categorie'=>$categorie,
            'cart'=>$cart
          ]); 
        }
    }

  public function search(Request $request){
  $categorie = Categorie::with(['produits'
  =>function ($query) use($request){
    $query->where('nomproduit','like','%'.$request->mot.'%')
          ->orwhere('detail','like','%'.$request->mot.'%');
    }
  ])
  ->get();
  $cart = $request->session()->get('cart', []);
  if(empty($cart)){
    return view('index', [
      'categorie'=>$categorie,
      'cart'=>[]
    ]);          
  }
  else if(!empty($cart)){
    return view('index', [
      'categorie'=>$categorie,
      'cart'=>$cart
    ]); 
    }
  }
}

//    // Where hoann'ny colonne ani produits
//    => function ($query) use($prixmin,$prixmax){
//     $query->where(function($q) use($prixmin,$prixmax){
//       $q->whereNull($prixmin)
//       ->orwhere('prix','>',$prixmin);            
//     })
//     // (prix is null ou prix > request)

//     ->where(function($q) use($prixmin,$prixmax){
//       $q->whereNull($prixmax)
//       ->orwhere('prix','>',$prixmax);            
//     // (prix is null ou prix < request)
//     });
//   }])
// ->where(function ($query) use($idcategorie){
//   $query->orwhere('idcategorie','=',$idcategorie);