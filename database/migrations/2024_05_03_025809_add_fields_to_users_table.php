<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom keahlian dan bio
            $table->string('keahlian')->nullable();
            $table->text('bio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom keahlian dan bio
            $table->dropColumn('keahlian');
            $table->dropColumn('bio');
        });
    }
}
