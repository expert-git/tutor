<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('subject_id');
            
            $table->string('date');
            $table->string('lesson_type');                                            
            $table->string('description');

            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('job_boards');
    }
}
