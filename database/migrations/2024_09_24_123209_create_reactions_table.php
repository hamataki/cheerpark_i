<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    public function up()
    {
         Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->Integer('to_user_id'); //追加
            $table->Integer('from_user_id'); //追加
            $table->Integer('status'); //追加

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reactions');
    }
}