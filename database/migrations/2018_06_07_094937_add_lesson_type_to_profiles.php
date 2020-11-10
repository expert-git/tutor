<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLessonTypeToProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function($table) {
                $table->integer('lesson_type')->nullable()->after('username');
                $table->foreign('lesson_type')->references('id')->on('lesson_types')
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
