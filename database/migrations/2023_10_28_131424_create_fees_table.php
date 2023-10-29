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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receipt_no')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('admission_no');
            $table->float('amount', 10,2);
            $table->string('Payment_mode');
            $table->foreign('student_id')->references('id')
                    ->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
