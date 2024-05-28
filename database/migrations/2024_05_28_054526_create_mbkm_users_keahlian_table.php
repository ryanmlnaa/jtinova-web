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
        Schema::create('mbkm_users_keahlian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mbkm_user_id')->constrained('mbkm_users')->onDelete('cascade');
            $table->foreignId('keahlian_id')->constrained('keahlian')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbkm_users_keahlian');
    }
};
