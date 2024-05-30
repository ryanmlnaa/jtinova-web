<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 2,
                'nip' => '1234567890',
                'nama' => 'Admin',
                'jabatan_id' => 1,
                'foto' => 'admin.jpg',
            ],
            [
                'user_id' => 3,
                'nip' => '0987654321',
                'nama' => 'Pegawai',
                'jabatan_id' => 3,
                'foto' => 'pegawai.jpg',
            ],
        ];

        foreach ($data as $pegawai) {
            \App\Models\Pegawai::create($pegawai);
        }
    }
}
