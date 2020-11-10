<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameStateColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function($t) {
                        $t->integer('state')->unsigned()->change();
                        $t->integer('country')->unsigned()->change();
                        $t->renameColumn('state', 'city_id');
                        $t->renameColumn('country', 'country_id');
                        $t->foreign('city_id')->references('id')->on('cities')
                ->onUpdate('cascade')->onDelete('cascade');
                $t->foreign('country_id')->references('id')->on('countries')
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
        Schema::table('profiles', function($t) {
                        $t->renameColumn('state', 'city_id');
                        $t->renameColumn('country', 'country_id');
                });
    }
}
