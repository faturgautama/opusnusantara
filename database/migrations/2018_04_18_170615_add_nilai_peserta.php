<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lombaku_pesertas', function (Blueprint $table) {

            $table->string('nilai1')->nullable();
            $table->string('nilai2')->nullable();
            $table->string('nilai3')->nullable();
            $table->string('rata2')->nullable();
            $table->string('juara')->nullable();
            $table->string('juara_keterangan')->nullable();
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lombaku_pesertas', function (Blueprint $table) {

            $table->dropColumn('nilai1');
            $table->dropColumn('nilai2');
            $table->dropColumn('nilai3');
            $table->dropColumn('rata2');
            $table->dropColumn('juara');
            $table->dropColumn('juara_keterangan');
      
        });
    }
}
