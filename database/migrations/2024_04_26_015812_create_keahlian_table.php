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
        Schema::create('keahlian', function (Blueprint $table) {
            $table->increments("id_keahlian");
            $table->string("nama_keahlian");
            $table->enum("tipe_keahlian", ["utama", "lain"])->default("utama");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keahlian');
    }
};
