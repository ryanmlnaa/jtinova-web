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
        Schema::create('pendampingan_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('prodi_id')->nullable()->constrained('prodis')->onDelete('cascade');
            $table->string("nim", 10)->nullable()->unique();
            $table->string("judul")->nullable();
            $table->string("dosen_pembimbing")->nullable();
            $table->string("no_hp", 15)->nullable();
            $table->string("kendala")->nullable();
            $table->foreignId('skema_pendampingan_id')->nullable()->constrained('skema_pendampingans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
