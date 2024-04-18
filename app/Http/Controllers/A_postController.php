<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\A_post;
use App\Models\a_post as ModelsA_post;
use Illuminate\Support\Facades\Redirect;

class A_postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = ModelsA_post::orderBy('id', 'DESC')->paginate(10);
        return view("index")->with("records", $records);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        ModelsA_post::create([
            "name" => Request::get("name"),
            "phone" => Request::get("phone"),
            "title" => Request::get("title"),
            "content" => Request::get("content"),
        ]);
        return Redirect()->back()->with("message", "留言成功");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = ModelsA_post::find($id);
        return view("edit")->with("record", $record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = ModelsA_post::find($id);

        $record->name = Request::get("name");
        $record->phone = Request::get("phone");
        $record->title = Request::get("title");
        $record->content = Request::get("content");

        $record->save();

        return Redirect()->back()->with("message", "編輯成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelsA_post::destroy($id);

        return Redirect()->back()->with("message", "刪除成功");
    }
}
