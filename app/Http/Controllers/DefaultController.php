<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Users;

class DefaultController extends Controller
{
    public function authenticate(Request $request){

    $request->flash();
    $credentials=$request->only('email','password');
    $remember_me=$request->has('remember_me') ? true : false;
    if (Auth::attempt($credentials,$remember_me)){
        $user=Users::find(Auth::user()->id);
        $user->user_status=1;
        $user->save();
        //Auth::user()->id;
        return redirect()->route('index');
    }else{
        return back()->with('error','Hatalı Kullanıcı');
    }
    }

    public function logout()
    {
        $user=Users::find(Auth::user()->id);
        $user->user_status=0;
        $user->save();
        Auth::logout();
        return redirect('user/login')->with('logout','Güvenli Çıkış Sağlandı');
    }

    public function login(){
        if(!empty(Auth::user()->id)){
            return redirect()->route('index');
        }
        return view('login');
    }

    public function back(){
        return back();
    }
}
