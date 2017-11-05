<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorybookingspaceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historybookingspace', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codebookingspace');
            $table->string('codecompanypartnership');
            $table->string('codebilling');
            $table->string('codeservice');
            $table->string('codemember');
            $table->string('invoice');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
            $table->integer('quota');
            $table->integer('quotauser');
            $table->integer('price');
            $table->integer('totalprice');
            $table->datetime('datein');
            $table->datetime('dateout');
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
        Schema::dropIfExists('historybookingspace');
    }
}
