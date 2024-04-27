<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLombaKonfirmasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lombakus', function (Blueprint $table) {

            $table->date('tanggal_bayar')->nullable();
            $table->time('jam_bayar')->nullable();
            $table->string('nama_bayar')->nullable();
            $table->string('bank_bayar')->nullable();
            $table->string('status_bayar')->nullable();
            $table->string('foto')->nullable();


      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lombakus', function (Blueprint $table) {

            $table->dropColumn('tanggal_bayar');
            $table->dropColumn('jam_bayar');
            $table->dropColumn('nama_bayar');
            $table->dropColumn('bank_bayar');
            $table->dropColumn('status_bayar');


      
        });
    }
}
