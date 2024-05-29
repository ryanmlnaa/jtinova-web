<?php

namespace Database\Seeders;

use App\Models\PendampinganUser;
use Illuminate\Database\Seeder;

class PendampinganUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PendampinganUser::create([
            'user_id' => 10,
            'prodi_id' => 1,
            'nim' => '1234567890',
            'judul' => 'Judul Tugas Akhir',
            'dosen_pembimbing' => 'Dosen Pembimbing',
            'no_hp' => '081234567890',
            'kendala' => 'Kendala',
            'skema_pendampingan_id' => 1,
        ]);

        PendampinganUser::create([
            'user_id' => 11,
            'prodi_id' => 2,
            'nim' => '0987654321',
            'judul' => 'Judul Tugas Akhir',
            'dosen_pembimbing' => 'Dosen Pembimbing',
            'no_hp' => '081234567890',
            'kendala' => 'Kendala',
            'skema_pendampingan_id' => 2,
        ]);
    }
}
