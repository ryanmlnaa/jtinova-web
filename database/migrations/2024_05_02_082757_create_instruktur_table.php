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
        Schema::create('instruktur', function (Blueprint $table) {
            $table->increments("id_instruktur");
            $table->string("nama_instruktur");
            $table->enum("j_kel", ["laki-laki", "perempuan"]);
            $table->string("email");
            $table->string("no_telp");
            $table->enum("agama", ["islam", "kristen", "katolik", "hindu", "buddha", "konghucu"]);
            $table->string("pekerjaan");
            $table->string("pendidikan_terakhir");
            $table->string("tmp_lahir");
            $table->date("tgl_lahir");
            $table->string("alamat");
            $table->string("bidang_keahlian");
            $table->string("foto_ktp")->nullable();
            $table->string("portofolio");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrukturs');
    }
};
