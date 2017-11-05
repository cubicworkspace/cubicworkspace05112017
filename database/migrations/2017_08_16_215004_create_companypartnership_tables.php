<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanypartnershipTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companypartnership', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codecompanypartnership');
            $table->string('favicon');
            $table->string('logo');
            $table->string('email');
            $table->integer('phone');
            $table->integer('fax');
            $table->string('address');
            $table->string('maps');
            $table->string('codecountry');
            $table->string('codecity');
            $table->string('profile');
            $table->string('history');
            $table->string('description');
            $table->string('vision');
            $table->string('mision');
            $table->string('faq');
            $table->string('information');
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
        Schema::dropIfExists('companypartnership');
    }
}
