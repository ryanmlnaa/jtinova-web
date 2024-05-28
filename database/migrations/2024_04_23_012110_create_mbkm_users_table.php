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
        Schema::create('mbkm_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade');
            $table->string("nim", 10)->unique();
            $table->enum("semester", [1, 2, 3, 4, 5, 6, 7, 8]);
            $table->enum("golongan", ['A', 'B', 'C', 'D', 'E']);
            $table->string("tahun_masuk", 4);
            $table->string("no_hp", 15);
            $table->string("photo")->nullable();
            $table->string("khs")->nullable();
            $table->enum("status", ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbkm_users');
    }
};
