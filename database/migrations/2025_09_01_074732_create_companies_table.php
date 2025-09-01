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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
                // Basic Info
    $table->string('name');                 // Company name
    $table->string('slug')->unique();       // URL friendly name (optional)
    $table->string('email')->nullable();    // Official email
    $table->string('phone')->nullable();    // Contact phone

        // Address / Location
    $table->string('address')->nullable();
    $table->string('city')->nullable();
    $table->string('state')->nullable();
    $table->string('country')->nullable();
    $table->string('pincode')->nullable();

     // Profile / Branding
    $table->string('logo')->nullable();         // Company logo
    $table->string('website')->nullable();      // Website URL
    $table->text('description')->nullable();    // About company
    $table->string('industry')->nullable();     // IT, Finance, etc.
    $table->integer('team_size')->nullable();   // Team size (employees count approx)
    // Relation (Employer ID jiska company hai)
    $table->unsignedBigInteger('employer_id');  
    $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
