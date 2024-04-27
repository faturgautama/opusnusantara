<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombaKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lomba_kategoris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lomba_id')->unsigned();
            $table->string('name');
            $table->integer('min'); //min kelas/umur
            $table->integer('max'); //max kelas/umur
            $table->integer('biaya'); //max kelas/umur
            $table->string('song_type'); //pilihan atau bebas
            $table->integer('song_set'); //jumlah lagu yang harus diisi
            //$table->string('song_selection')->nullable(); //berisi
            $table->string('song1')->nullable();
            $table->string('song2')->nullable();
            $table->string('song3')->nullable();
            $table->string('song4')->nullable();
            $table->timestamps();

            $table->foreign('lomba_id')->references('id')
                ->on('lombas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lomba_kategoris');
    }
}
