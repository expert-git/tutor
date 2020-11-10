<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeMigraModifyPagestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('pages', function($table) {
            $table->string('title');
            $table->string('meta');
            $table->string('tags');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function($table) {
            $table->dropColumn('title');
            $table->dropColumn('meta');
            $table->dropColumn('tags');            
        });
    }
}
