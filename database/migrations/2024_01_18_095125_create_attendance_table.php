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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('attendanceId');
            $table->unsignedBigInteger('studentId')->nullable();
            $table->foreign('studentId')->references('studentId')->on('student')->onDelete('cascade');
            $table->date('attendDate');
            $table->time('timeIn');
            $table->time('timeOut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
