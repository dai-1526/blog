<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
	public function index(Post $post)
	{
		return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
		//blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postsを代入。
		//getPaginateByLimit()はPost.phpで定義したメソッドです。
	}
	
	/**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
 	public function show(Post $post) //web.phpに記述したURLの{}内の文字（今回はpost）とコントローラーの変数（今回は$post）は一致させる。
	{
		return view('posts.show')->with(['post'=>$post]);
		//'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
	}
	
    public function create()
    {
    	return view('posts.create');
    }
    
public function store(PostRequest $request, Post $post)
    {
    	$input = $request['post']; //postはcreate.blade.php内のFormタグのname属性と一致。
    	$post ->fill($input) ->save(); //Postインスタンスを上書き。fill使用によりタイトルと内容
    	return redirect('/posts/' . $post ->id);  //投稿済ブログにリダイレクト
    }

public function edit(Post $post)
    {
    	return view('posts.edit')->with(['post'=>$post]);
    }
    
public function update(PostRequest $request, Post $post)
    {
    	$input_post = $request['post']; //postはcreate.blade.php内のFormタグのname属性と一致。
    	$post ->fill($input_post)->save(); //Postインスタンス上書き
    	return redirect('/posts/' . $post ->id);
    }

public function delete(Post $post)
    {
    	$post->delete();
    	return redirect('/');
    }

}
