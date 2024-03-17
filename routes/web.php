<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //外部のPostControllerクラス>をインポート

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
//「/posts/create」は「/posts/{post}」よりも上に書く！
Route::post('/posts', [PostController::class, 'store']);
//DBへの登録
Route::get('/posts/{post}', [PostController::class, 'show']);
//'posts/{対象の投稿のID}'にGETリクエストが来たら、PostControllerのshowメソッドを実行する。