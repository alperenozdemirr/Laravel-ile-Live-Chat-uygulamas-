<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Mail\invitationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Sohbet;
class invitationController extends Controller
{
    public function userInvitation(Request $request){
        $data=$request->only(['name','email']);
        Mail::to($request->email)->send(new invitationMail($data));


        $sohbet= new Sohbet();
        $sohbet->kullanici_id=Auth::user()->id;
        $sohbet->name=Auth::user()->name;
        $sohbet->mesaj_icerik=$request->name." Adlı kullanıcı Davet Edildi";
        $sohbet->save();
        return redirect(route('index'));
    }
}
