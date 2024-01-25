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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId')->nullable();
            $table->foreign('studentId')->references('studentId')->on('student')->onDelete('cascade');
            $table->unsignedBigInteger('facultyId')->nullable();
            $table->foreign('facultyId')->references('facultyId')->on('faculty')->onDelete('cascade');
            $table->date('dateSubmitted');
            $table->string('reqFile');
            $table->string('reqName');
            $table->string('reqType');
            $table->string('reqStatus');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
