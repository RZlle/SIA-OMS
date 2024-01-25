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
        Schema::create('student', function (Blueprint $table) {
            $table->id('studentId');
            $table->unsignedBigInteger('accountId');
            $table->foreign('accountId')->references('accountId')->on('account')->onDelete('cascade');
            $table->string('studentNo');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('suffix')->nullable();
            $table->string('address');
            $table->date('birthday');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
