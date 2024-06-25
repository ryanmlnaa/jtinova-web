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
        Schema::table('instruktur_users', function (Blueprint $table) {
            $table->foreignId('timeline_id')->nullable()->constrained('timelines')->onDelete('set null');
            $table->enum("status_pendaftaran", ['proses', 'gagal', 'lolos'])->default('proses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
