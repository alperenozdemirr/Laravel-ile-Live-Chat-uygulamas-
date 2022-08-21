<?php

namespace App\Http\Controllers;

use App\Kullanici;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sohbet;
use App\Users;
class IndexController extends Controller
{
    public function page(){
        $sohbet=Sohbet::find('2')->user->email;

        dd($sohbet);
        /*foreach ($sohbet as $key){
            echo $key->user->name;
        }*/
        //return $sohbet->user->name;
    }
    public function index(){

        $data['chat']=Sohbet::all()->sortBy('id');
        $data['kullanicilar']=Users::all();
        //$data['kullaniciSor']=Users::where('id',1)->get();
        //return response()->view('index',compact('data'),200);
        return view('index',compact('data'));
        /*$chat=DB::table('sohbet')
            ->join('kullanici','sohbet.id','=','kullanici.id')
            ->select('kullanici_adsoyad','mesaj_icerik')
            ->get();
        $kullanici=DB::table('kullanici')->get();
        //$kullaniciSor=DB::table('kullanici')->where('id',$kid)->first();
        return view('index')->with('chats',$chat)->with('kullanicilar',$kullanici);
        //dd($chat);*/
    }
    public function indexChatData(){
        $chat=Sohbet::all()->sortBy('id');
        return response()->json($chat,200);
    }

    public function chatMessageInsertPost(Request $request){
        $sohbet= new Sohbet();
        /*$request->validate([
            'kullanici_id'=>'required',
            'mesaj'=>'required'
        ]);*/
        if($request->hasfile('message_image')){

            $request->validate([
                'message_image'=>'required|image|mimes:jpg,jpeg,image,png,tiff,gif|max:8096'
            ]);
            $image=uniqid().'.'.$request->message_image->getClientOriginalExtension();
            $request->message_image->move(public_path('chatMessageİmg'),$image);
            $sohbet->image=$image;
        }

            $sohbet->name=$request->kullanici_name;
            $sohbet->kullanici_id=$request->kullanici_id;
            if($request->mesaj==null){
                $sohbet->mesaj_icerik=" ";
            }else{
                $sohbet->mesaj_icerik=$request->mesaj;
            }


            $sohbet->save();
        return redirect()->intended(route('index'));

    }



public function ajax(){
        return view('deneme');
}

    public function ajaxData(){
        $data['chat']= Sohbet::all()->sortBy('id');
        return response()->json($data,200);


        /*return response()->json([
            'name' => 'Tayfun',
            'surname' => 'Erbilen'
        ], 200);*/

        //return response()->json(['name'=>'alp','soyad'=>'özdemir'],200);
       // return view('ajax');
    }
}
