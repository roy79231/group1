<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rpost;
use Auth;

class TryController extends Controller
{
    //
    public function index(){
        $rposts = rpost::all();

        return view('try',['rposts'=> $rposts]);
    }
    public function create(Request $request){
        $content = $request->content;

        rpost::create([
            'content'=>$content,
            'inputer'=>Auth::user()->name,
        ]);

        return redirect()->route('r_index');
    }
}
