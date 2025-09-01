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
        Schema::create('company__jobs', function (Blueprint $table) {
                $table->id();
    $table->string('designation');         // job title/designation
    $table->text('requirement')->nullable(); // job requirements (skills, etc.)
    $table->longText('description')->nullable(); // detailed job description
    $table->string('salary')->nullable();  // salary info (string so we can store ranges like "20k-30k")
    $table->string('location')->nullable(); // job location (city/country)
    $table->string('address')->nullable();  // full address
    $table->unsignedBigInteger('employer_id'); // relation with employer

    $table->timestamps();
  // foreign key relation (agar employers table hai)
    $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company__jobs');
    }
};
