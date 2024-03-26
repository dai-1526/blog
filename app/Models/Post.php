<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 5)
{
	    // updated_atで降順に並べたあと、limitで件数制限をかける
     return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
     
        /**このモデル :: with(リレーション名) -> paginate()* 
         *またはget()など;という形は、Eagerローディング という
         * 機能を使う書き方です。
         * 簡単に言うと リレーションによって増えてしまう
         * データベースアクセスの回数を減らす ための機能です。
         * アプリケーションの動作が重くならないよう、
         * なるべくこの形でアクセスを行うようにしましょう。
         */
     }
     
     protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
    //PostControllerで使用したfill関数を使えるようにするため。
    
    /**Categoryに対するリレーション
     * 「1対多」の関係なので単数形に
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
        
    }

}

