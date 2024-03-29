<?php
//use宣言は外部にあるクラスをインポートする

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Http\Requests\PostRequest;
 use App\Models\Post;
 use App\Models\Category;

class PostController extends Controller
{
     //use宣言は外部にあるクラスをインポートする
    public function index(Post $post)
        {
       $client = new \GuzzleHttp\Client();
       $url = 'https://teratail.com/api/v1/questions';
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        $questions = json_decode($response->getBody(), true);
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions'],
            ]);  //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        }
    
    public function show(Post $post)
        {
        return view('posts/show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        }
        
    public function create(Category $category)
        {
        return view('posts/create')->with(['categories' => $category->get()]);
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
     
    public function edit(Post $post)
        {
            return view('posts/edit')->with(['post' => $post]);
        }
        
    public function update(PostRequest $request, Post $post)
        {
            $imput_post = $request['post'];
            $post->fill($imput_post)->save();
            return redirect('/posts/'.$post->id);
        }
        
    public function delete(Post $post)
        {
            $post->delete();
            return redirect('/');
        }
    
 
}
   
        