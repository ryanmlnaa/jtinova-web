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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments("id_pembayaran");
            // $table->foreignId("id_peserta")->references('id_peserta')->on('peserta');
            $table->integer("nominal");
            $table->string("no_rekening");
            $table->string("bukti_pembayaran");
            $table->enum("status", ["belum", "selesai", "terlambat"])->default("belum");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
