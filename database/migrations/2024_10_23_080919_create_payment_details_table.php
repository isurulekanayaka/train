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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedInteger('noOfUsers'); // Number of users (integer)
            $table->string('ticketClass'); // Ticket class (string)
            $table->date('date'); // Date (date)
            $table->decimal('classPrice', 10, 2); // Class price (numeric with 2 decimal places)
            $table->decimal('totalPrice', 10, 2); // Total price (numeric with 2 decimal places)
            $table->foreignId('train_station_id')
                  ->constrained('train_stations')
                  ->onDelete('cascade'); // Foreign key to train_stations table with onDelete cascade
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Foreign key to users table with onDelete cascade
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
