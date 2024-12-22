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
        Schema::create('team_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Συνδεδεμένο με τον χρήστη
            $table->string('team_name'); // Όνομα προτεινόμενης ομάδας
            $table->text('description')->nullable(); // Περιγραφή εφαρμογής
            $table->string('environmental_data')->nullable(); // Επιλεγμένα δεδομένα
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Κατάσταση αίτησης
            $table->text('rejection_reason')->nullable(); // Λόγος απόρριψης
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_requests');
    }
};
