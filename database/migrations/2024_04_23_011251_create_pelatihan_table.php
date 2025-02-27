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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_kategori")->constrained("categories")->onDelete("cascade");
            $table->string("kode");
            $table->string("nama");
            $table->text("deskripsi");
            $table->text("benefit");
            $table->integer("harga");
            $table->string("foto");
            $table->date("tanggal_mulai");
            $table->date("tanggal_selesai");
            $table->string("lokasi");
            $table->integer("kuota");
            $table->integer("kuota_tim");
            $table->enum("status", ["Aktif", "Tidak Aktif"])->default("Aktif");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
