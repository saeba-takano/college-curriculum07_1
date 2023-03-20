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
        <p>example</p>
        <div class = 'posts'> <!--記事一覧をまとめている。ここのpostsは単なるhtmlのクラス名-->
           @foreach($posts as $post)<!--with内の青地のpostsは$posts.$postもわかりやすいように単数かたちなだけで、なんでもいい。-->
             　 <div = 'post'>
                 <h2 class = 'title'>{{ $post->title }}<!--記事のタイトル--></h2>
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                </div>
           @endforeach
        </div>
        <div class = 'paginate'>{{ $posts->links()}}</div>
        <a href='/posts/create'>create</a>
        <script>
            function deletePost(id){
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
