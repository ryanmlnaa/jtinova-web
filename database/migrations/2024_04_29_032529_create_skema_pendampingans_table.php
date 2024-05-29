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
        Schema::create('skema_pendampingans', function (Blueprint $table) {
            $table->id();
            $table->string("kode");
            $table->string("nama");
            $table->string("deskripsi");
            $table->integer("harga");
            $table->string("foto");
            $table->enum("status", ["Aktif", "Tidak Aktif"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skema_pendampingans');
    }
};
