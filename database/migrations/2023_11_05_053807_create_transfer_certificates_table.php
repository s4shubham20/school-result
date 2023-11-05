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
            $table->string('reference_no')->nullable();
            $table->string('town')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('admission_date')->nullable();
            $table->year('leaving_date')->nullable();
            $table->string('leaving_class')->nullable();
            $table->date('examinaiton_month')->nullable();
            $table->date('examinaiton_year')->nullable();
            $table->string('character')->nullable();
            $table->string('reason_for_leaving')->nullable();
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
