<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('passed');
            $table->timestamps();
            $table->primary(['course_id', 'user_id']);


        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
