<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('admission_no');
            $table->string('class');
            $table->string('roll_no');
            $table->string('address');
            $table->date('dob');
            $table->string('profile_pic')->nullable();
            $table->float('course_fee')->nullable();
            $table->integer('totalmarks')->nullable();
            $table->integer('rank_in_class')->nullable();
            $table->integer('attendance')->nullable();
            $table->string('remarks',600)->nullable();
            $table->string('sports_cultural_activities')->nullable();
            $table->string('punctual_activities')->nullable();
            $table->string('holiday_assignment')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps('');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
