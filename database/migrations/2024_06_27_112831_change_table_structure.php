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
        
        Schema::table('skema_pendampingans', function (Blueprint $table) {
            $table->text('deskripsi')->change();
            $table->string('kode')->unique()->change();
        });

        Schema::table('pelatihan', function (Blueprint $table) {
            $table->string('kode')->unique()->change();
        });

        Schema::table('timelines', function (Blueprint $table) {
            $table->text('tahun_ajaran')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skema_pendampingans', function (Blueprint $table) {
            $table->string('deskripsi')->change();
            $table->string('kode')->change();
        });

        Schema::table('pelatihan', function (Blueprint $table) {
            $table->string('kode')->change();
        });

        Schema::table('timelines', function (Blueprint $table) {
            $table->string('tahun_ajaran')->change();
        });
    }
};
