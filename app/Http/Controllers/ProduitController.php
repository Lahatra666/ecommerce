<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Processeur;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function formajoutproduit(){
        $marques=Marque::all();
        $processeurs = Processeur::all();
        return view('admin.formajoutproduit',
        [
            'marques'=>$marques,
            'processeurs'=>$processeurs
        ]       
    );
    }
    public function store(Request $request){
        $filename = time() . "." .$request->image->extension();
        $path = $request->file('image')->storeAs(
             'produits',
             $filename,
             'public'
         );
        Laptop::create([
         'nomlaptop'=>$request->nomlaptop,
         'reference'=>$request->reference,
         'prix'=>$request->prix,
         'idmarque'=>$request->idmarque,
         'idprocesseur'=>$request->idprocesseur,
         'ram'=>$request->ram,
         'dur'=>$request->dur,
         'image'=>$path
     ]);
     return redirect()->back()->withErrors('Reussi');
    }
    public function getallproduit(){
        $produits = DB::table('v_laptop')->select('*')
        ->get();
        return view('admin.listeproduit', [
            'produits'=>$produits
        ]);
    }
}
