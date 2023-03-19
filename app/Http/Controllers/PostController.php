<?php
//use宣言は外部にあるクラスをインポートする

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Http\Requests\PostRequest;
 use App\Models\Post;

class PostController extends Controller
{
     //use宣言は外部にあるクラスをインポートする
    public function index(Post $post)
        {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        }
    
    public function show(Post $post)
        {
        return view('posts/show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        }
    public function create()
        {
     return view('posts/create');
         }
    public function store(PostRequest $request, Post $post)
     //ユーザーからのリクエストに含まれるデータを扱う場合、Requestインスタンスを使う。
     //入力データをDBのpostsテーブルに保存する必要があるため、空のPostインスタンスを利用する。
     { $input = $request['post'];
        //postをキーに持つリクエストパラメーターを取得することができる。
        //$requestのキーはHTMLのFormタグで定義したname属性と一致する。
        $post->fill($input)->save();
        //空だったPostインスタンスのプロパティを受けとったキーごとに上書きができる。
        //$post->create($input)でも同じ挙動。
        return redirect('/posts/'. $post->id);
     }
 
}
   
        