<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codemember');
            $table->string('userid');
            $table->string('email');
            $table->string('password');
            $table->string('institution');
            $table->date('birthday');
            $table->integer('phone');
            $table->string('address');
            $table->string('image');
            $table->string('description');
            $table->string('providerid');
            $table->string('provider');
            $table->string('information');
            $table->datetime('registerdate');
            $table->datetime('lastlogin');
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
        Schema::dropIfExists('member');
    }
}
