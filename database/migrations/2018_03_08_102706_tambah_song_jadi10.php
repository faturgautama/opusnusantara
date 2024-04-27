<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahSongJadi10 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lomba_kategoris', function (Blueprint $table) {
            $table->string('song5')->nullable();
            $table->string('song6')->nullable();
            $table->string('song7')->nullable();
            $table->string('song8')->nullable();
            $table->string('song9')->nullable();
            $table->string('song10')->nullable();
        });

        Schema::table('lombaku_pesertas', function (Blueprint $table) {
            $table->string('song5')->nullable();
            $table->string('song6')->nullable();
            $table->string('song7')->nullable();
            $table->string('song8')->nullable();
            $table->string('song9')->nullable();
            $table->string('song10')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lomba_kategoris', function (Blueprint $table) {
            $table->dropColumn('song5');
            $table->dropColumn('song6');
            $table->dropColumn('song7');
            $table->dropColumn('song8');
            $table->dropColumn('song9');
            $table->dropColumn('song10');
        });

        Schema::table('lombaku_pesertas', function (Blueprint $table) {
            $table->dropColumn('song5');
            $table->dropColumn('song6');
            $table->dropColumn('song7');
            $table->dropColumn('song8');
            $table->dropColumn('song9');
            $table->dropColumn('song10');
        });
    }
}
