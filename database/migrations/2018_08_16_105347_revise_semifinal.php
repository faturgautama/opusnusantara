<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReviseSemifinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lombaku_pesertas', function (Blueprint $table) {

            $table->string('nilai4')->nullable();
            $table->string('nilai5')->nullable();
            $table->string('nilai6')->nullable();

            $table->string('nilai_final_1')->nullable();
            $table->string('nilai_final_2')->nullable();
            $table->string('nilai_final_3')->nullable();
            $table->string('nilai_final_4')->nullable();
            $table->string('nilai_final_5')->nullable();
            $table->string('nilai_final_6')->nullable();
            $table->string('rata2_final')->nullable();
            $table->string('juara_final')->nullable();
            $table->string('juara_final_keterangan')->nullable();
      
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

            $table->dropColumn('nilai4');
            $table->dropColumn('nilai5');
            $table->dropColumn('nilai6');

            $table->dropColumn('nilai_final_1');
            $table->dropColumn('nilai_final_2');
            $table->dropColumn('nilai_final_3');
            $table->dropColumn('nilai_final_4');
            $table->dropColumn('nilai_final_5');
            $table->dropColumn('nilai_final_6');
            $table->dropColumn('rata2_final');
            $table->dropColumn('juara_final');
            $table->dropColumn('juara_final_keterangan');
      
        });
    }
}
