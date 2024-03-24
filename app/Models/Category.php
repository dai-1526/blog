<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model

{
    use HasFactory;
    use SoftDeletes;
    
    /**Postに対するリレーション
     * 「多対1」の関係なので'posts'と複数形に
     */
     public function posts()
     {
         return $this->hasMany(Post::class);
     }
}
