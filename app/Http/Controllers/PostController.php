<?php
//use宣言は外部にあるクラスをインポートする

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    use App\Models\Post;
    //use宣言は外部にあるクラスをインポートする

public function index(Post $post)
{
    return $post -> get();//インポートしたPostをインスタンス化して＄postとして使用
}

}
