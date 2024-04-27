<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoUndian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lombaku_pesertas', function (Blueprint $table) {

            $table->string('no_undian')->nullable();
            $table->enum('absen',['1','0']);
      
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
            $table->dropColumn('no_undian');
        });
    }
}
