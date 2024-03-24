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
        Schema::table('posts2', function (Blueprint $table) {
            //
            $table->string('image', 100)->nullable();
            //nullable()でnull値（記述無）を許容
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts2', function (Blueprint $table) {
            //
        });
    }
};
