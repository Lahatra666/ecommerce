<?php

namespace App\Http\Controllers;

use App\Models\Entreecentrale;
use App\Models\Entreemagasin;
use App\Models\Laptop;
use App\Models\Magasin;
use App\Models\Sortiecentrale;
use App\Models\Sortiemagasin;
use App\Models\Stockactuel;
use App\Models\Stockactuelmagasin;
use App\Models\Stocksuspendumagasin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function formachat(){
           $produits = DB::table('v_laptop')->select('*')
        ->get();
        return view('admin.entreecentrale', [
            'produits'=>$produits
        ]);
    }
    public function achatlaptop(Request $request){
        Entreecentrale::create([
            'idlaptop'=>$request->idlaptop,
            'quantite'=>$request->quantite,
        ]);
       $quantite =  $request->quantite;
        $idlaptop =  $request->idlaptop;
    $id = DB::table('stockactuels')->select('idlaptop')
    ->where('idlaptop','=', $idlaptop)
    ->get();
     $entry = Stockactuel::where('idlaptop',$idlaptop);
    if(count($id)==1){
    $entry->update([
            'quantite'=>DB::raw('quantite+'.$quantite)
           ]);
    }
    else if(count($id)!=1){
        Stockactuel::create([
            'idlaptop'=>$request->idlaptop,
            'quantite'=>$request->quantite,
        ]); 
    }
        return redirect()->back()->withErrors('Reussi');
    }
    public function stocklaptop(){
        $produits = DB::table('v_stockslaptop')->select('*')
     ->get();
     return view('admin.liststocklaptop', [
         'produits'=>$produits
     ]);
 }
 public function formtransfer($idlaptop){
    $quantites = DB::table('v_stockslaptop')->select('quantite')
    ->where('idlaptop',$idlaptop)
    ->get();

    $array = json_decode($quantites,true);
    $quantite = $array[0]['quantite'];

    $magasins = Magasin::all();
 return view('admin.formtransfer', [
     'magasins'=>$magasins,
     'quantite'=>$quantite,
     'idlaptop'=>$idlaptop
 ]);
}
public function confirmetransfermag(Request $request){
    $quantite =  $request->quantite;
    $idlaptop =  $request->idlaptop;
    $idmagasin = $request->idmagasin;
    $entry = Stockactuel::where('idlaptop',$idlaptop);  
    $etat = Stocksuspendumagasin::where('idlaptop',$idlaptop);   
    if($entry->update(['quantite'=>DB::raw('quantite-'.$quantite)])){
        Entreemagasin::create([
            'idmagasin'=>$idmagasin,
            'idlaptop'=>$request->idlaptop,
            'quantite'=>$request->quantite,
        ]);    
        $etat->update(['etat'=>DB::raw('1')]);
    }

    $id = DB::table('stockactuelmagasins')->select('idlaptop')
    ->where('idlaptop','=', $idlaptop)
    ->get();
    $entry2 = Stockactuelmagasin::where('idlaptop',$idlaptop);
    if(count($id)==1){
    $entry2->update([
            'quantite'=>DB::raw('quantite+'.$quantite)
        ]);
    }
    else if(count($id)!=1){
        Stockactuelmagasin::create([
            'idmagasin'=>$idmagasin,
            'idlaptop'=>$request->idlaptop,
            'quantite'=>$request->quantite,
        ]); 
    }
        return redirect()->back()->withErrors('Reussi');
    }

    public function transfermag(Request $request){
        $quantite =  $request->quantite;
        $idlaptop =  $request->idlaptop;
        $idmagasin = $request->idmagasin;
        Stocksuspendumagasin::create([
            'idmagasin'=>$idmagasin,
            'idlaptop'=>$idlaptop,
            'quantite'=>$quantite,
        ]); 
            return redirect()->back()->withErrors('Reussi');
        }
    public function entreemagasin(){
        $ida = session('iduser');

        $idmagas= DB::table('users')->select('idmagasin')
        ->where('iduser','=', $ida)
        ->get();

        $array = json_decode($idmagas,true);
        $idmagasin = $array[0]['idmagasin'];

        $produits = DB::table('v_stocksuspendu')->select('*')
        ->where('idmagasin','=', $idmagasin)
        ->where('etat','=', 0)
        ->get();
       
        $users = DB::table('users')->select('*')
            ->where('iduser','=', $ida)
            ->get();
        return view('magasin.entreesuspendu', [
            'produits'=>$produits,
            'users'=>$users
        ]);
    }
    public function tocentrale(){
        $ida = session('iduser');

        $idmagas= DB::table('users')->select('idmagasin')
        ->where('iduser','=', $ida)
        ->get();

        $array = json_decode($idmagas,true);
        $idmagasin = $array[0]['idmagasin'];

        $produits = DB::table('v_stockslaptopmag')->select('*')
        ->where('idmagasin','=', $idmagasin)
        ->get();
        $users = DB::table('users')->select('*')
            ->where('iduser','=', $ida)
            ->get();
        return view('magasin.tocentrale', [
            'produits'=>$produits,
            'users'=>$users
        ]);
    }
    public function formrenvoyer($idlaptop){
        $ida = session('iduser');
        $users = DB::table('users')->select('*')
        ->where('iduser','=', $ida)
        ->get();

        $quantites = DB::table('v_stockslaptopmag')->select('quantite')
        ->where('idlaptop',$idlaptop)
        ->get();
    
        $array = json_decode($quantites,true);
        $quantite = $array[0]['quantite'];

        $produits = DB::table('v_stockslaptopmag')->select('*')
        ->where('idlaptop','=', $idlaptop)
        ->get();
     return view('magasin.formrenvoie', [
        'users'=>$users,
        'produits'=>$produits,
         'quantite'=>$quantite,
         'idlaptop'=>$idlaptop
     ]);
    }
    public function confirmerrenvoie(Request $request){
        $quantite =  $request->quantite;
        $idlaptop =  $request->idlaptop;
        $idmagasin = $request->idmagasin;
        $entry = Stockactuelmagasin::where('idlaptop',$idlaptop);  
        if($entry->update(['quantite'=>DB::raw('quantite-'.$quantite)])){
            Entreecentrale::create([
                'idlaptop'=>$request->idlaptop,
                'quantite'=>$request->quantite,
            ]);    
        }
    
        $id = DB::table('stockactuels')->select('idlaptop')
        ->where('idlaptop','=', $idlaptop)
        ->get();
        $entry2 = Stockactuel::where('idlaptop',$idlaptop);
        if(count($id)==1){
        $entry2->update([
                'quantite'=>DB::raw('quantite+'.$quantite)
            ]);
        }
        else if(count($id)!=1){
            Stockactuel::create([
                'idlaptop'=>$request->idlaptop,
                'quantite'=>$request->quantite,
            ]); 
        }
            return redirect()->back()->withErrors('Reussi');
    
    }
    public function vente(){
        $ida = session('iduser');

        $idmagas= DB::table('users')->select('idmagasin')
        ->where('iduser','=', $ida)
        ->get();

        $array = json_decode($idmagas,true);
        $idmagasin = $array[0]['idmagasin'];

        $produits = DB::table('v_stockslaptopmag')->select('*')
        ->where('idmagasin','=', $idmagasin)
        ->get();
        $users = DB::table('users')->select('*')
            ->where('iduser','=', $ida)
            ->get();
        return view('magasin.vente', [
            'produits'=>$produits,
            'users'=>$users
        ]);
    }
    public function formvente($idlaptop){
        $ida = session('iduser');
        $users = DB::table('users')->select('*')
        ->where('iduser','=', $ida)
        ->get();

        $quantites = DB::table('v_stockslaptopmag')->select('quantite')
        ->where('idlaptop',$idlaptop)
        ->get();
    
        $array = json_decode($quantites,true);
        $quantite = $array[0]['quantite'];

        $produits = DB::table('v_stockslaptopmag')->select('*')
        ->where('idlaptop','=', $idlaptop)
        ->get();
     return view('magasin.formvente', [
        'users'=>$users,
        'produits'=>$produits,
         'quantite'=>$quantite,
         'idlaptop'=>$idlaptop
     ]);
    }
    public function confirmervente(Request $request){
        $quantite =  $request->quantite;
        $idlaptop =  $request->idlaptop;
        $entry = Stockactuelmagasin::where('idlaptop',$idlaptop);  
        if($entry->update(['quantite'=>DB::raw('quantite-'.$quantite)])){
            Sortiemagasin::create([
                'idlaptop'=>$request->idlaptop,
                'quantite'=>$request->quantite,
            ]);    
        }
            return redirect()->back()->withErrors('Reussi');
    
    }
}
