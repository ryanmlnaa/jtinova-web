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
        Schema::create('recruitment', function (Blueprint $table) {
            $table->increments("id_recruitment");
            $table->string("nim", 10)->unique();
            $table->string("nama", 50);
            $table->string("prodi", 30);
            $table->integer("semester");
            $table->string("keahlian_utama");
            $table->string("keahlian_lain");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment');
    }
};
