<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLombasKategorisUdpate extends Migration
{


    public function up()
    {
        Schema::table('lomba_kategoris', function (Blueprint $table) {
            $table->string('song_set_final')->nullable();
            $table->string('song_type_final')->default('final')->nullable();
            $table->string('song1_final')->nullable();
            $table->string('song2_final')->nullable();
            $table->string('song3_final')->nullable();
            $table->string('song4_final')->nullable();
            $table->string('song5_final')->nullable();
            $table->string('song6_final')->nullable();
            $table->string('song7_final')->nullable();
            $table->string('song8_final')->nullable();
            $table->string('song9_final')->nullable();
            $table->string('song10_final')->nullable();


        });

        Schema::table('lombaku_pesertas', function (Blueprint $table) {
            $table->string('song_type_final')->default('final')->nullable();
            $table->string('song_set_final')->nullable();
            $table->string('song1_final')->nullable();
            $table->string('song2_final')->nullable();
            $table->string('song3_final')->nullable();
            $table->string('song4_final')->nullable();
            $table->string('song5_final')->nullable();
            $table->string('song6_final')->nullable();
            $table->string('song7_final')->nullable();
            $table->string('song8_final')->nullable();
            $table->string('song9_final')->nullable();
            $table->string('song10_final')->nullable();

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
            $table->dropColumn('song_set_final');
            $table->dropColumn('song_type_final');
            $table->dropColumn('song1_final');
            $table->dropColumn('song2_final');
            $table->dropColumn('song3_final');
            $table->dropColumn('song4_final');
            $table->dropColumn('song5_final');
            $table->dropColumn('song6_final');
            $table->dropColumn('song7_final');
            $table->dropColumn('song8_final');
            $table->dropColumn('song9_final');
            $table->dropColumn('song10_final');


        });

        Schema::table('lombaku_pesertas', function (Blueprint $table) {
            $table->dropColumn('song_set_final');
            $table->dropColumn('song_type_final');
            $table->dropColumn('song1_final');
            $table->dropColumn('song2_final');
            $table->dropColumn('song3_final');
            $table->dropColumn('song4_final');
            $table->dropColumn('song5_final');
            $table->dropColumn('song6_final');
            $table->dropColumn('song7_final');
            $table->dropColumn('song8_final');
            $table->dropColumn('song9_final');
            $table->dropColumn('song10_final');

        });
    }
}
