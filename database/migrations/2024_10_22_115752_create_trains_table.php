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
        Schema::create('trains', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('trainNumber')->unique(); // Train number
            $table->string('trainName'); // Train name
            $table->string('destinationPoint'); // Destination point
            $table->decimal('fare1stClass', 8, 2); // Fare for 1st class
            $table->decimal('fare2ndClass', 8, 2); // Fare for 2nd class
            $table->decimal('fare3rdClass', 8, 2); // Fare for 3rd class
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
