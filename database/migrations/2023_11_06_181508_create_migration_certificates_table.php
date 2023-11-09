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
        Schema::create('migration_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('withdraw_file_no')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('name_title')->nullable();
            $table->string('fathername_title')->nullable();
            $table->string('mothername_title')->nullable();
            $table->string('occupation');
            $table->string('last_institution_name')->nullable()->comment('if available');
            $table->string('cast_or_religion')->nullable();
            $table->string('province_of_residence')->nullable();
            $table->longText('class')->nullable();
            $table->longText('date_of_admission')->nullable();
            $table->longText('date_of_promotion')->nullable();
            $table->longText('date_of_removal')->nullable();
            $table->longText('cause_of_removal')->nullable();
            $table->longText('year_or_session')->nullable();
            $table->longText('conduct_or_concession')->nullable();
            $table->longText('work')->nullable();
            $table->foreign('student_id')
                ->references('id')
            ->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migration_certificates');
    }
};
