<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BackController extends Controller
{
    public function back(){
        return view('back.homeback');
    }
    public function formajoutproduit(){
         $categories = Categorie::all();
        // $categories = "nomcategorie";
        return view('back.formajoutproduit', [
            'categories'=>$categories
        ]);
    }
    public function store(Request $request){
    //    $name = Storage::disk('local')->put('produits',$request->file('image'));
    $filename = time() . "." .$request->image->extension();
       $path = $request->file('image')->storeAs(
            'produits',
            $filename,
            'public'
        );
       Produit::create([
        'nomproduit'=>$request->nomproduit,
        'idcategorie'=>$request->idcategorie,
        'prix'=>$request->prix,
        'detail'=>$request->detail,
        'image'=>$path
    ]);
    }
}
