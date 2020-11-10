<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->longText('bio')->nullable();
            $table->string('tution_per_hour')->nullable();
            $table->string('gender')->nullable();
            $table->string('distance')->nullable();
            $table->string('age')->nullable();
            $table->string('description')->nullable();                   
            $table->string('rating')->nullable();

            $table->string('address')->nullable();                   
            $table->string('zipcode')->nullable();
            $table->string('state')->nullable();                   
            $table->string('country')->nullable();


            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
