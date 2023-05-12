<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(Request $request){
        $categorie = Categorie::with(['produits'])->get();
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
    public function login(){
        return view('login');
    }
    // session()->forget('cart');
    public function logout(Request $request){
      $iduser = session('iduser');   
      // if(Session::has('iduser')){
        Session::forget('iduser');
        return $this->index($request);
      // }
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
            $iduser = DB::table('users')->select('iduser')
            ->where('emailuser','=', $request->email)
            ->where('mdpuser','=', $request->password)
            ->get();
        if(count($iduser)==1){
        $categorie = Categorie::with('produits')->get();
        $cart = $request->session()->get('cart', []);

        $array = json_decode($iduser,true);
        $id = $array[0]['iduser'];
        Session::put('iduser',$id);
        // session()->save();
        $ida = session('iduser');
        $user = DB::table('users')->select('*')
            ->where('iduser','=', $ida)
            ->get();
        // return redirect()->route('index')->with();
        return view('index', [
            'categorie'=>$categorie,
            'users'=>$user,
            'cart'=>$cart
          ]);   
    }
        }
         return redirect()->back()->withErrors('erreur');
    }
}
