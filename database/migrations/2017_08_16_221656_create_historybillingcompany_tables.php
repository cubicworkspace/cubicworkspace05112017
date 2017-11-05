<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorybillingcompanyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historybillingcompany', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codeservices');
            $table->string('codecompanypartnership');
            $table->string('codebilling');
            $table->integer('quota');
            $table->integer('currentquota');
            $table->integer('usedquota');
            $table->integer('price');
            $table->integer('currentquotauser');
            $table->integer('nowquotauser');
            $table->string('information');
            $table->datetime('datetime');
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
        Schema::dropIfExists('historybillingcompany');
    }
}
