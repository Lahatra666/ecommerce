<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    public function formajoutmagasin(){
        return view('admin.formajoutmagasin');
    }
    public function storemagasin(Request $request){
        Magasin::create([
            'nommagasin'=>$request->nommagasin,
            'lieu'=>$request->lieu
        ]);
        return redirect()->back()->withErrors('Reussi');
    }
}
