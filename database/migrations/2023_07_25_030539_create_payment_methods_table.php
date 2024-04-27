<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('type');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $data = [
            [
                'code' => 'CREDIT_CARD',
                'type' => 'CREDIT_CARD'
            ],
            [
                'code' => 'BCA',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'BNI',
                'type' => 'BANK_TRANSFER'
            ],

            [
                'code' => 'BSI',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'BRI',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'BJB',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'MANDIRI',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'PERMATA',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'BSS',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'CIMB',
                'type' => 'BANK_TRANSFER'
            ],
            [
                'code' => 'ALFAMART',
                'type' => 'RETAIL_OUTLET'
            ],
            [
                'code' => 'INDOMARET',
                'type' => 'RETAIL_OUTLET'
            ],
            [
                'code' => 'OVO',
                'type' => 'EWALLET'
            ],
            [
                'code' => 'DANA',
                'type' => 'EWALLET'
            ],
            [
                'code' => 'SHOPEEPAY',
                'type' => 'EWALLET'
            ],
            [
                'code' => 'LINKAJA',
                'type' => 'EWALLET'
            ],
            [
                'code' => 'ASTRAPAY',
                'type' => 'EWALLET'
            ],
            [
                'code' => 'QRIS',
                'type' => 'QRIS'
            ],
            [
                'code' => 'DD_BRI',
                'type' => 'DIRECT_DEBIT'
            ],
            [
                'code' => 'DD_BCA_KLIKPAY',
                'type' => 'DIRECT_DEBIT'
            ],
            [
                'code' => 'ID_KREDIVO',
                'type' => 'PAYLATER'
            ],
            [
                'code' => 'ID_AKULAKU',
                'type' => 'PAYLATER'
            ],
            [
                'code' => 'ID_ATOME',
                'type' => 'PAYLATER'
            ],
            [
                'code' => 'UANGME',
                'type' => 'PAYLATER'
            ]

        ];

        DB::table('payment_methods')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
