<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataBaseInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //init user
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('created_at');
        });

        //init country
        Schema::create('country', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        //init company
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('country_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('country');
        });

        //init company_user
        Schema::create('company_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->timestamp('connected_at');

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_user');
        Schema::dropIfExists('user');
        Schema::dropIfExists('company');
        Schema::dropIfExists('country');
    }
}
