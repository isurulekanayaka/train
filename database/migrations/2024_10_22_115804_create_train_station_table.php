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
        Schema::create('train_stations', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('train_id')->constrained('trains')->onDelete('cascade'); // Foreign key to trains table
            $table->time('time'); // Time at the station
            $table->string('start_station'); // Station Start
            $table->string('end_station'); // Station End
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('train_station');
    }
};
