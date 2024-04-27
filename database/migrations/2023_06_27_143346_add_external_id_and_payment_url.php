<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExternalIdAndPaymentUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lombakus', function (Blueprint $table) {
            $table->string('external_id')->nullable();
            $table->string('payment_url')->nullable();
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
            $table->dropColumn('external_id');
            $table->dropColumn('payment_url');
        });
    }
}
