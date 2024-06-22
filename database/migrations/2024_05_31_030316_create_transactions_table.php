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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelatihan_team_id')->nullable()->constrained('pelatihan_teams')->onDelete('cascade');
            $table->foreignId('pelatihan_user_id')->nullable()->constrained('pelatihan_users')->onDelete('cascade');
            $table->foreignId('pendampingan_user_id')->nullable()->constrained('pendampingan_users')->onDelete('cascade');
            $table->string('invoice');
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->string('payment_method');
            $table->string('payment_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
