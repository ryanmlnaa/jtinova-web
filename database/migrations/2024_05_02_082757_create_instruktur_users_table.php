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
        Schema::create('instruktur_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('no_hp', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('foto')->nullable();
            $table->string("portofolio")->nullable();
            $table->string("cv")->nullable();
            $table->string("linkedin")->nullable();
            $table->enum('status', ["Aktif", "Tidak Aktif"])->default("Aktif");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrukturs_users');
    }
};
