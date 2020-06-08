<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicropostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microposts', function (Blueprint $table) {
            $table->bigIncrements('id'); //micropost識別
            $table->unsignedBigInteger('user_id'); //micropostを投稿したユーザーID 
            $table->string('content'); //投稿内容
            $table->timestamps();
            
            // 外部キー制約 Userとmicropostの繋がりを保証する
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('microposts');
    }
}
