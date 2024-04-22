<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Liang;

class LiangController extends Controller
{
    // 顯示留言板首頁
    public function liangIndex()
    {
        $posts = Liang::all();
        return view('liangIndex', compact('posts'));
    }

    // 新增留言
    public function liangStore(Request $request)
    {
        // 驗證
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // 創建新留言
        $chat = new Liang();
        $chat->inputer = Auth::user()->name;
        $chat->content = $request->content;
        $chat->save();

        return redirect()->route('liangIndex');
    }

    // 刪除留言
    public function liangDestroy($id)
    {
        $chat = Liang::find($id);
        $chat->delete($id);
        return redirect()->route('liangIndex');
    }

    // 編輯留言
    public function liangEdit(Request $request ,$id)
    {
        // 取得要編輯的留言 ID 和新的內容
        $content = $request->input('content');

        // 找到對應的留言並更新內容
        $chat = Liang::find($id);
        $chat->content = $request->content;
        $chat->save();

        // 重定向回留言板首頁
        return redirect()->route('liangIndex');
    }
    public function liangUpdate($id)
    {
        // 取得要編輯的留言 ID 和新的內容
        $id = $request->input('id');
        $content = $request->input('content');

        // 找到對應的留言並更新內容
        $chat = Liang::find($id);
        $chat->content = $content;
        $chat->save();

        // 重定向回留言板首頁
        return redirect()->route('liangIndex');
    }

}
