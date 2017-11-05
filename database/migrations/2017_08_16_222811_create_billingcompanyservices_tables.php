<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingcompanyservicesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billingcompanyservices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codeservices');
            $table->string('codecompanypartnership');
            $table->string('codebilling');
            $table->integer('quota');
            $table->integer('currentquota');
            $table->integer('usedquota');
            $table->integer('currentquotauser');
            $table->integer('nowquotauser');
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
        Schema::dropIfExists('billingcompanyservices');
    }
}
