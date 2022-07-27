<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('appointment_letter');
            $table->string('course_survey');
            $table->string('minutes_meeting');
            $table->string('students_feedback');
            $table->string('course_name');
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
        Schema::dropIfExists('course_management');
    }
}
