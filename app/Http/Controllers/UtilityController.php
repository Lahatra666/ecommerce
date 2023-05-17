<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class UtilityController extends Controller
{

    public function creersession($nomsession,$session){
        Session::put($nomsession,$session);
        return true;
    }
    public function logoutadmin(Request $request){

          Session::forget('idadmin');
          return redirect()->route('index');
    }
    public function logoutmagasin(Request $request){

        Session::forget('idmagasin');
        return redirect()->route('index');
  }
    public function authenticate(Request $request){
        $info = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        if($request->email=='admin@gmail.com' && $request->password=='admin'){
          $idadmin = 1;
          Session::put('idadmin',$idadmin);
            return redirect()->route('back');
        }
        else{
            $idmagasin = DB::table('users')->select('iduser')
            ->where('emailuser','=', $request->email)
            ->where('mdpuser','=', $request->password)
            ->get();
        if(count($idmagasin)==1){
        // $categorie = Categorie::with('produits')->get();
        // $cart = $request->session()->get('cart', []);

        $array = json_decode($idmagasin,true);
        $id = $array[0]['iduser'];
        Session::put('iduser',$id);
        // session()->save();
        $ida = session('iduser');
        $magasin = DB::table('users')->select('*')
            ->where('iduser','=', $id)
            ->get();
        // return redirect()->route('index')->with();
        return view('magasin.home', [
            'users'=>$magasin
          ]);   
    }
        }
         return redirect()->back()->withErrors('erreur');
    }
}
