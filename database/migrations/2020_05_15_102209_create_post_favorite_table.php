<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostFavoriteTable extends Migration
{
    
    public function up()
    {
        Schema::create('post_favorite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('micropost_id')->unsigned()->index();
            $table->timestamps();
            
            // 外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('micropost_id')->references('id')->on('microposts')->onDelete('cascade');
            
            //重複を許さない
            $table->unique(['user_id', 'micropost_id']);
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_favorite');
    }
}
