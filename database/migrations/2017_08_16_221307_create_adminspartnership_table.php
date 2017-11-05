<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminspartnershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminspartnership', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codecompanypartnership');
            $table->string('codeadminpartnership');
            $table->string('email');
            $table->integer('phone');
            $table->string('password');
            $table->string('image');
            $table->string('address');
            $table->datetime('lastlogin');
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
        Schema::dropIfExists('adminspartnership');
    }
}
