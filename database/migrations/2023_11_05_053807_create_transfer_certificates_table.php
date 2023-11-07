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
        Schema::create('transfer_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('name_title')->nullable();
            $table->string('fathername_title')->nullable();
            $table->string('mothername_title')->nullable();
            $table->string('register_no')->nullable();
            $table->string('caste')->nullable();
            $table->string('tahsil')->nullable();
            $table->string('period_of_stay_in_state')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('admission_regsiter_no')->nullable();
            $table->date('admission_last_date')->nullable();
            $table->date('last_date_of_school')->nullable();
            $table->date('leaving_date')->nullable();
            $table->string('reason_for_leaving')->nullable();
            $table->string('character')->nullable();
            $table->string('higher_examination')->nullable();
            $table->date('passed_out_date')->nullable();
            $table->string('language_of_student')->nullable();
            $table->string('free_of_cost')->nullable();
            $table->string('days_school_is_open')->nullable();
            $table->string('illness_days')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('status')->nullable();
            $table->foreign('student_id')->references('id')
                ->on('students')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_certificates');
    }
};
