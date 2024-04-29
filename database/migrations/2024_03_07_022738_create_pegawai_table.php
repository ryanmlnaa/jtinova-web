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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id_pegawai');
            $table->string('nip', 50)->unique();
            $table->string('nama_pegawai');
            $table->integer('id_jabatan');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->text('link_linkdIn')->nullable();
            $table->text('instagram')->nullable();
            $table->string('foto_profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
