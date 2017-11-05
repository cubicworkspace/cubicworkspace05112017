<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyservicesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyservices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codeservices');
            $table->string('codecompanypartnership');
            $table->string('codetagservices');
            $table->integer('quota');
            $table->integer('price');
            $table->integer('quotauser');
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
        Schema::dropIfExists('companyservices');
    }
}
