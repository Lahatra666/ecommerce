<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function formajoutuser(){
        $magasins = Magasin::all();
        return view('admin.formajoutuser', [
            'magasins'=>$magasins
        ]);
    }
    public function storeuser(Request $request){
        User::create([
         'nameuser'=>$request->nameuser,
         'emailuser'=>$request->emailuser,
         'mdpuser'=>$request->mdpuser,
         'idmagasin'=>$request->idmagasin
     ]);
     return redirect()->back()->withErrors('Reussi');
    }
    public function getalluser(){
        $users = DB::table('v_user')->select('*')
        ->get();
        return view('admin.listuser', [
            'users'=>$users
        ]);
    }
    public function edituser(Request $request){
        $iduser = $request->iduser;
        $user = User::find($iduser);
        $user->update([
         'nameuser'=>$request->nameuser,
         'emailuser'=>$request->emailuser,
         'mdpuser'=>$request->mdpuser
        ]);
     return redirect()->back()->withErrors('Reussi');
    }

    public function formedituser($iduser){
        $user = DB::table('v_user')->select('*')
        ->where('iduser','=', $iduser)
        ->get();
        return view('admin.formedituser', [
            'users'=>$user
        ]);
    }
    public function formaffecteruser($iduser){
        $user = DB::table('v_user')->select('*')
        ->where('iduser','=', $iduser)
        ->get();
        $magasins = Magasin::all();
        return view('admin.affecteruser', [
            'users'=>$user,
            'magasins'=>$magasins

        ]);
    }
    public function affecter(Request $request){
        $iduser = $request->iduser;
        $user = User::find($iduser);
        $user->update([
         'idmagasin'=>$request->idmagasin
        ]);
     return redirect()->back()->withErrors('Reussi');
    }
}
