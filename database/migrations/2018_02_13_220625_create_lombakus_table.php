<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lombakus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('lomba_id')->unsigned();
            $table->bigInteger('total_biaya')->unsigned()->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onChange('cascade');

            $table->foreign('lomba_id')
                ->references('id')->on('lombas')
                ->onDelete('cascade')
                ->onChange('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lombakus');
    }
}
