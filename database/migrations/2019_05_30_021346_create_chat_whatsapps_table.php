<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatWhatsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_whatsapps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->text('chat');
            $table->integer('lombaku_id')->unsigned();
            $table->foreign('lombaku_id')->references('id')->on('lombakus')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_whatsapps');
    }
}
