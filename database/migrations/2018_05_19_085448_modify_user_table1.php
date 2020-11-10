<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {

            $table->integer('status_id')->unsigned()->nullable();
            $table->string('email_token')->nullable()->after('email'); 
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onUpdate('cascade')->onDelete('cascade');            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
