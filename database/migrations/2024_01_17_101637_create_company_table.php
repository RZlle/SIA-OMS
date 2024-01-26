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
        Schema::create('company', function (Blueprint $table) {
            $table->id('companyID');
            $table->string('companyName');
            $table->string('address');
            $table->string('moaFile')->nullable();
            $table->string('companyContact');
            $table->string('contactEmail');
            $table->string('contactNumber');
            $table->integer('validityPeriod')->nullable();
            $table->date('signedDate')->nullable();
            $table->integer('assignedStudents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
