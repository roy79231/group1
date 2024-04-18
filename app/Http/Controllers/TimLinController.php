<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\tim_lin_post;

class TimLinController extends Controller
{
    public function timindex(){
        return view('tim_input');
    }
    public function timcreate(Request $request){//Requset 接收傳過來的資料
        $content = $request->content;//從物件request指向content屬性
        $inputer = $request->inputer;
        tim_lin_post::create(['content'=>$content,'inputer'=>$inputer]);
        //修改post資料庫 把'inputer'的資料傳給 inputer
        $posts =tim_lin_post::all();
        return view('tim_comment',['posts'=>$posts]);//
    }
    public function timchange(Request $request,$id){
        $change=$request->content;
        $post=tim_lin_post::find($id);
        $post->content = $change;
        $post->save();//處存資料庫動作
        $posts =tim_lin_post::all();
        return view('tim_comment',['posts'=>$posts]);
    }
    public function timdelete($id){
        $post=tim_lin_post::find($id);
        $post->delete();
        $posts =tim_lin_post::all();
        return view('tim_comment',['posts'=>$posts]);
    }
    public function timlastpage(){
        return redirect()->route('timindex');
    }
}