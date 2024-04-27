<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddXenditPaymentIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lombakus', function (Blueprint $table) {
            $table->string('xendit_payment_id')->nullable()->after('status_bayar');
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
            $table->dropColumn('xendit_payment_id');
        });
    }
}
