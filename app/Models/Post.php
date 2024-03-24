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
     return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
     }
     
     protected $fillable = [
        'title',
        'body',
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

