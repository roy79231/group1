<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jamespost;
use Illuminate\Support\Facades\Auth;
class postcontrollerjames extends Controller
{
    public function postindex(){
        $posts = jamespost::all();
        return view('Postindexjames',
            ['posts'=>$posts]);
    }
    public function create(Request $request){
        $content = $request ->content;
        jamespost::create([
            'content'=>$content,
            'inputer'=>Auth::user()->name ,
        ]);
        return redirect()->route('postindex');
    }
    public function edit($id) {

        $post = jamespost::find($id);
        return view('edit',['posts'=> $post]);
    }
    public function update(Request $request,$id){
        $post = jamespost::find($id);
        $post ->update(['content'=>$request->content]);
        return redirect()->route('postindex');
    }
    public function delete($id){
        $post =jamespost::find($id);
        $post->delete();

        return redirect()->route('postindex');
}
}