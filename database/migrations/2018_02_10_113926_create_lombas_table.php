<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lombas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organizer_id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('poster')->nullable();
            $table->date('tanggal_lomba')->nullable();
            $table->string('type');
            $table->string('status')->default(1);
            $table->string('show')->default(1);
            $table->boolean('is_registration_open')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lombas');
    }
}
