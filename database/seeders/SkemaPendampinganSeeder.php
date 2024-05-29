<?php

namespace Database\Seeders;

use App\Models\SkemaPendampingan;
use Illuminate\Database\Seeder;

class SkemaPendampinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'SP1',
                'nama' => 'Skema Pendampingan 1',
                'deskripsi' => 'Deskripsi Skema Pendampingan 1',
                'harga' => 100000,
                'foto' => 'skema_pendampingan_1.jpg',
                'status' => 'Aktif',
            ],
            [
                'kode' => 'SP2',
                'nama' => 'Skema Pendampingan 2',
                'deskripsi' => 'Deskripsi Skema Pendampingan 2',
                'harga' => 200000,
                'foto' => 'skema_pendampingan_2.jpg',
                'status' => 'Aktif',
            ],
            [
                'kode' => 'SP3',
                'nama' => 'Skema Pendampingan 3',
                'deskripsi' => 'Deskripsi Skema Pendampingan 3',
                'harga' => 300000,
                'foto' => 'skema_pendampingan_3.jpg',
                'status' => 'Aktif',
            ],
        ];

        foreach ($data as $item) {
            SkemaPendampingan::create($item);
        }
    }
}
