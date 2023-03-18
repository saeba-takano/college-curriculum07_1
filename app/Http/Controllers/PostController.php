<?php
//use宣言は外部にあるクラスをインポートする

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
        //viewの中のpostsディレクトリの中の話
        //withでDB内のデータを引っ張る。
        //with内の$postはindex内の$postをさし、index内の$postはPostを指し、PostはModel。
    }
    
    public function show(POST $post)
    {
        return view('posts/show')->with(['post'=>$post]);
    }
}
?>