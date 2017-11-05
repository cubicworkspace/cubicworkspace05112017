<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('favicon');
            $table->string('logo');
            $table->string('email');
            $table->integer('phone');
            $table->string('fax');
            $table->string('address');
            $table->string('maps');
            $table->string('profile');
            $table->string('history');
            $table->string('description');
            $table->string('vision');
            $table->string('mision');
            $table->datetime('registerdate');
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
        Schema::dropIfExists('companies');
    }
}
