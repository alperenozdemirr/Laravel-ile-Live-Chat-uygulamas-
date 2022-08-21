<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class ProfilController extends Controller
{
    public function index($id){

        $data['profil']=Users::find($id);
        return view('profil',compact('data'));
    }

}
