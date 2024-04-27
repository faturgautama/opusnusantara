<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDataInPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            // DB::table('payment_methods')->truncate();
            // $data = [
            //     [
            //         'code' => 'CREDIT_CARD',
            //         'type' => 'CREDIT_CARD'
            //     ],
            //     [
            //         'code' => 'BNI',
            //         'type' => 'BANK_TRANSFER'
            //     ],

            //     [
            //         'code' => 'BSI',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'BRI',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'BJB',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'MANDIRI',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'PERMATA',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'BSS',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'CIMB',
            //         'type' => 'BANK_TRANSFER'
            //     ],
            //     [
            //         'code' => 'ALFAMART',
            //         'type' => 'RETAIL_OUTLET'
            //     ],
            //     [
            //         'code' => 'OVO',
            //         'type' => 'EWALLET'
            //     ],
            //     [
            //         'code' => 'DANA',
            //         'type' => 'EWALLET'
            //     ],
            //     [
            //         'code' => 'SHOPEEPAY',
            //         'type' => 'EWALLET'
            //     ],
            //     [
            //         'code' => 'LINKAJA',
            //         'type' => 'EWALLET'
            //     ],
            //     [
            //         'code' => 'ASTRAPAY',
            //         'type' => 'EWALLET'
            //     ],
            //     [
            //         'code' => 'QRIS',
            //         'type' => 'QRIS'
            //     ]
            // ];

            // DB::table('payment_methods')->insert($data);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            //
        });
    }
}
