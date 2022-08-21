<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){
        return view('settings');
    }
    public function settingsUpdate(Request $request){
        //$this->validate('image'=> 'image|mimes,image,img,png')

        $user = Users::find($request->id);
        if($request->hasfile('image')){
            $request->validate([
                'image'=>'required|image|mimes:jpg,jpeg,image,png|max:4096'
            ]);
            $image=uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$image);
            $user->image=$image;
        }
        $user->info=$request->info;
        $user->phone=$request->phone;
        $user->name=$request->name;
        $user->save();
        if ($user){
            return redirect(route('user/settings'))->with('profilOk','ok');
        }else{
            return redirect(route('user/settings'))->with('profilNo','no');
        }
    }
    public function changePassword(Request $request){
        $message=[
            'required'=> 'Boş yerleri doldurup tekrar deneyiniz',
            'min'=>'En az 8 Hane Olmalıdır',
            'max'=>'En çok 25 Hane Olabilir',
        ];
        $request->validate([
            'new_password'=>'required|min:8|max:255',
            'confirm_password'=>'required|min:8|max:255'
        ],$message);
        if ($request->new_password==$request->confirm_password){
            $change_value= bcrypt($request->new_password);
            $user=Users::find(Auth::user()->id);
            $user->password=$change_value;
            $user->save();
            return redirect(route('user/settings'))->with('passwordOk','Şifreniz Başarıyla Güncellendi');
        }else{
            return redirect(route('user/settings'))->with('passwordNo','Şifreniz Değiştirilemedi');
        }
    }
}
