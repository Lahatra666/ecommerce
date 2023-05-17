<?php

namespace App\Http\Controllers;
use App\Models\Magasin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function getallmagasin(){
        $magasins = Magasin::all();
        return view('admin.homeback', [
            'magasins'=>$magasins
        ]);
    }
}
