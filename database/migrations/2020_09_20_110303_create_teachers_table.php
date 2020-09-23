<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('teacher_email')->nullable();
            $table->string('teacher_position');
            $table->string('teacher_education');
            $table->string('teacher_profile');
            $table->mediumText('teacher_description')->nullable();
            $table->string('facebook_handler')->nullable();
            $table->string('twitter_handler')->nullable();
            $table->string('instagram_handler')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
