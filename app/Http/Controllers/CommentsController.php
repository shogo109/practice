<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
     //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
     public function __construct()
     {
         // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
         $this->middleware('auth');
     }
    Public function store(Request $request)
    {
        //Commentモデル作成
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    Public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
