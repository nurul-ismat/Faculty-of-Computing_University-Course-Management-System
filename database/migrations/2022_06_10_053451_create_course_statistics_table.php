<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_statistics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_name');
            $table->string('test_name');
            $table->string('student_id');
            $table->string('average');
            $table->string('maximum');
            $table->string('minimum');
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
        Schema::dropIfExists('course_statistics');
    }
}
