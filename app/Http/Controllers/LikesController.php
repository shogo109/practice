<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LikesController extends Controller
{
    //コンストラクタ(このクラスが呼ばれると最初にこの処理をする)
    public function __construct()
    {
        //　ログインしていなかったらログインページに遷移する(この処理を消すとログインしなくてもページを表示する)
        $this->middleware('auth');
    }
    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        $post_id = $request->post_id;
        $already_liked = Like::where('user_id',$user_id)->where('post_id',$post_id)->first();


        if(!$already_liked) { //userがまだいいねしていなかった場合
            $like = new Like;    
            $like->post_id = $post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
            //「/」ルートにリダイレクト
            return redirect('/');
        } else { //もしいいねしていたら、DELETEする
            Like::where('user_id',$user_id)->where('post_id',$post_id)->delete();
            return redirect('/');
        }


    }
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }
}
