<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <!-- html langは言語を指定する。この場合、config/app.phpwp指定しているのか？　-->
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>投稿の一覧表示</h1>
        <div class = 'posts'> <!--記事一覧をまとめている。ここのpostsは単なるhtmlのクラス名-->
           @foreach($posts as $post)<!--with内の青地のpostsは$posts.$postもわかりやすいように単数かたちなだけで、なんでもいい。-->
             　 <div = 'post'>
                 <h2 class = 'title'>{{ $post->title }}<!--記事のタイトル-->
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h2>
                </div>
           @endforeach
        </div>
        <div class = 'paginate'>{{ $posts->links()}}</div>
    </body>
</html>
