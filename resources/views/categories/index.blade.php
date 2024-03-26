<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
  <!--
  str_replace('_','-', …)はアンダーバーをハイフンに置き換える。
  app()->getLocale())はアプリの現在の位置を取得する。
  波括弧で囲われているのはBladeの構文で動的な内容を埋め込むため
  -->

  <head>
    <meta charset = "utf-8">
    <title>BLOG</title>
    <!-- Fonts -->
    <link href = "https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  </head>

  <body>
    <h1>Blog Name</h1>
    <a href = "/posts/create">create</a>
    <div class = 'posts'>
     @foreach ($posts as $post)
      <div class = 'post'>
	<h2 class = 'title'>
	  <a href = '/posts/{{ $post->id }}'> {{ $post->title }}
	  </a>
	</h2>
	<a href = "">{{ $post->category->name }}</a>
	
	<p class = 'body'>{{ $post->body }}</p>
	<form action = "/posts/{{ $post->id }}" id = "form_{{ $post->id }}" method = "post">
	  @csrf
	  @method('DELETE')
	  <button type = "button" onclick = "deletePost({{ $post->id }})">delete</button>
	</form>
      </div>
     @endforeach
    </div>
    <div class='paginate'>
      {{ $posts->links() }}
    </div>
    <div class = "footer">
         <a href = "/">戻る</a>
    </div>

  <script>
    function deletePost(id){
      'use strict'
      
      if(confirm('削除すると復元できません。\n本当に削除しますか？')){
        document.getElementById(`form_${id}`).submit();
      }
    }
  </script>
  </body>
</html>