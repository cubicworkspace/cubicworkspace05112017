<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentmethodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codecategorypaymentmethode');
            $table->string('codepaymentmethode');
            $table->string('nameuser');
            $table->integer('nouser');
            $table->string('description');
            $table->string('logo');
            $table->string('status');
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
        Schema::dropIfExists('paymentmethode');
    }
}
