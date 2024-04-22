<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\n_post;
class n_PostController extends Controller
{
    public function n_index(){
        $posts = n_post::all();   //where('inputer','劉威佑') -> get();

        return view('n_PostIndex',
            ['posts'=>$posts]        
        );
    }
    public function n_create(){
        return view('n_create');
    }
    public function n_delete($id){
        $post = n_post::find($id);
        $post->delete($id);

        return redirect()->route('n_index');//->with('notice','文章已刪除');
    }

    public function n_store(Request $request){
        n_post::create([
            'content'=>$request->content,
            'inputer'=>Auth::user()->name,
        ]);
        return redirect()->route('n_index');
    }

    public function n_edit($id){
        $post = n_post::find($id);

        return view('n_edit',['post'=>$post]);
    }

    public function n_update(Request $request,$id){
        $post = n_post::find($id);

        $post->update(['content'=>$request->content]);
        return redirect()->route('n_index');
    }
}
