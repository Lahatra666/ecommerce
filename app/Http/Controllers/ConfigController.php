<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Processeur;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function formajoutmarque(){
        return view('admin.formajoutmarque'); 
    }
    public function formajoutproc(){
        return view('admin.formajoutproc'); 
    }
    public function storemarque(Request $request){
        Marque::create([
            'nommarque'=>$request->nom
        ]);
        return redirect()->back()->withErrors('Reussi');
    }
    public function storeproc(Request $request){
        Processeur::create([
            'nomprocesseur'=>$request->nom
        ]);
        return redirect()->back()->withErrors('Reussi');
    }
}
