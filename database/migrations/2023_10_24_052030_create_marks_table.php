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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->string('semester1')->nullable();
            $table->string('semester2')->nullable();
            $table->string('periodic_test1')->nullable();
            $table->string('periodic_test2')->nullable();
            $table->foreign('student_id')
            ->references('id')->on('students')
            ->onDelete('cascade');
            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
