<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--
        ビューポート設定。width~は画面幅をデバイスに合わせる。
        initial-scale~は初期のズームレベルを1に設定、すなわち標準表示させる。
        -->
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class = "title">
            {{ $post -> title }}
        </h1>
        <div class = "content_post"> <!--contentは内容という意味-->
            <h3>本文</h3>
            <p>{{ $post -> body }}</p>
        </div>
        <div class = "footer">
            <a href = "/">戻る</a>
        </div>
    </body>
</html>