<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombakuPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lombaku_pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lombaku_id')->unsigned();
            $table->integer('lomba_peserta_id')->unsigned()->default(0);
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('nohp');
            $table->string('email');
            $table->string('sekolah_nama');
            $table->string('sekolah_tingkat');
            $table->string('foto');
            // $table->integer('jumlah_kategori');
            $table->integer('kategori_id')->unsigned();
            $table->string('biaya');
            $table->string('song1')->nullable();
            $table->string('song2')->nullable();
            $table->string('song3')->nullable();
            $table->string('song4')->nullable();
            $table->timestamps();

            $table->foreign('lombaku_id')
                ->references('id')->on('lombakus')
                ->onDelete('cascade')
                ->onChange('cascade');

            $table->foreign('kategori_id')
                ->references('id')->on('lomba_kategoris')
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
        Schema::dropIfExists('lombaku_pesertas');
    }
}
