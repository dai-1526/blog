<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->foreignID('category_id')->constrained()->onDelete('cascade');
             /**foreignIDはUNSIGNED BIGINTを作るメソッド
             * すなわち、整数かつ大きな数字を許容させるための処理。
             * →元のID（カテゴリーテーブルのID）と共通させるため。
             * （laravel9の仕様でマイグレーションを使ってテーブルを
             * 作成する際、IDにbigIncrementが設定される。）
             * ＝外部キー制約の定義
             * constrainedメソッドは参照先のテーブルとカラムの名前を
             * 決めるために使う。
             * →categoriesテーブルのIDカラムと関連すると推測。
             * onDelete('cascade')は、主テーブル（categories）の削除操作を
             * 従テーブル（posts2）にも反映させるためのメソッド。
             * 仮に主テーブルの1のIDを持つレコードが削除された場合、
             * 従テーブルの1の外部キーを持つデータも削除される。
             * cascadeが、主の操作を従に紐づけるという意味を持つ。
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
