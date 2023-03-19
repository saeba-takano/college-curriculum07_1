<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <!-- html langは言語を指定する。この場合、config/app.phpwp指定しているのか？　-->
    <head>
        <meta charset="utf-8">
         <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{$post->title}}
        </h1>
        <div class="content">
            <div class="content_post">
                <h3>本文</h3>
                <p>{{$post->body}}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    