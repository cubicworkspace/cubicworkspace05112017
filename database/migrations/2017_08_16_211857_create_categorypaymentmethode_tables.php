<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorypaymentmethodeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorypaymentmethode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('categorypaymentmethode');
            $table->string('codecategorypaymentmethode');
            $table->string('description');
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
        Schema::dropIfExists('categorypaymentmethode');
    }
}
