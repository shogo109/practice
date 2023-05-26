<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
  public function __construct()
  {
      // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
      $this->middleware('auth');
  }
  public function index()
  {
      $posts = Post::limit(10)
          ->orderBy('created_at', 'desc')
          ->get();
          
       // テンプレート「post/index.blade.php」を表示します。
      return view('post/index', ['posts' => $posts]);
  }
  public function new()
    {
         // テンプレート「post/new.blade.php」を表示します。
        return view('post/new');
        
    }
    public function store(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , ['caption' => 'required|max:255', 'photo' => 'required']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶ\p{Han}]+)/u', $request->tags, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $record = tags::firstOrCreate(['tag_label' => $tag]); // firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
            array_push($tags, $record); // $recordを配列に追加します(=$tags)
        };


        $post_tags = [];
        $items = tags::all();
        foreach($items as $item) {
            preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶ\p{Han}]+)/u', $request->tags, $match);
            foreach ($match[1] as $tag) {
                if($item->tag_label === $tag) {
                    array_push($post_tags,$item->id);
                }
            }
        }

        // Postモデル作成
        $post = new Post;
        $post->caption = $request->caption;
        $post->user_id = Auth::user()->id;
        $post->image = base64_encode(file_get_contents($request->photo));
        for($i = 0; $i < count($post_tags); $i++) {
            $columnName = 'tagId_' . ($i + 1);
            $post->$columnName = $post_tags[$i];
        }
        $post->save();
        
        // $request->photo->storeAs('public/post_images', $post->id . '.jpg');
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('/');
    }
}
