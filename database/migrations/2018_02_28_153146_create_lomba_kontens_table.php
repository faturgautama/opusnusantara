<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombaKontensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lomba_kontens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lomba_id')->unsigned();
            $table->String('judul');
            $table->longText('konten')->nullable();
            $table->string('tipe');
            $table->string('pdf')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('lomba_kontens');
    }
}
