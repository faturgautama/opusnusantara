<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_pros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peserta_id')->unsigned()->nullable();
            $table->foreign('peserta_id')->references('id')->on('lombaku_pesertas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('kategori_id')->unsigned()->nullable();
            $table->foreign('kategori_id')->references('id')->on('lomba_kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->string('foto');
            $table->enum('type',['GAMBAR','URI']);
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
        Schema::dropIfExists('gallery_pros');
    }
}
