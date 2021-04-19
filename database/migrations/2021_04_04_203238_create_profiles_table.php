<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('profile_link')->nullable();
            $table->text('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->date('birthday')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->string('about_me')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->boolean('profile_visibility')->default('1');
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
        Schema::dropIfExists('profiles');
    }
}
