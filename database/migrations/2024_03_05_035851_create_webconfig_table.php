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
        Schema::create('webconfig', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('alias', 50)->nullable();
            $table->text('brand_logo');
            $table->text('video');
            $table->text('video_preview');
            $table->text('introduction');
            $table->text('profil_link');
            $table->text('map');
            $table->text('location');
            $table->text('open_hours');
            $table->text('email');
            $table->text('phone');
            $table->text('facebook');
            $table->text('twitter')->nullable();
            $table->text('instagram');
            $table->text('youtube');
            // $table->text('stamp');
            // $table->text('signature');
            $table->string('manager', 100)->nullable();
            $table->string('nip', 100)->nullable();
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webconfig');
    }
};
