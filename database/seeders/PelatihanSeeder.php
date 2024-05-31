<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_kategori' => 1,
                'kode' => 'PL1',
                'nama' => 'Laravel',
                'deskripsi' => 'Pelatihan Laravel',
                'benefit' => 'Sertifikat',
                'harga' => 1000000,
                'foto' => 'laravel.jpg',
                'tanggal_mulai' => '2024-04-23',
                'tanggal_selesai' => '2024-04-25',
                'lokasi' => 'Jakarta',
                'kuota' => 20,
                'kuota_tim' => 5,
                'status' => 'Aktif',
            ],
            [
                'id_kategori' => 2,
                'kode' => 'PL2',
                'nama' => 'VueJS',
                'deskripsi' => 'Pelatihan VueJS',
                'benefit' => 'Sertifikat',
                'harga' => 1000000,
                'foto' => 'vuejs.jpg',
                'tanggal_mulai' => '2024-04-23',
                'tanggal_selesai' => '2024-04-25',
                'lokasi' => 'Jakarta',
                'kuota' => 20,
                'kuota_tim' => 5,
                'status' => 'Aktif',
            ],
            [
                'id_kategori' => 3,
                'kode' => 'PL3',
                'nama' => 'ReactJS',
                'deskripsi' => 'Pelatihan ReactJS',
                'benefit' => 'Sertifikat',
                'harga' => 1000000,
                'foto' => 'reactjs.jpg',
                'tanggal_mulai' => '2024-04-23',
                'tanggal_selesai' => '2024-04-25',
                'lokasi' => 'Jakarta',
                'kuota' => 20,
                'kuota_tim' => 5,
                'status' => 'Aktif',
            ],
            [
                'id_kategori' => 4,
                'kode' => 'PL4',
                'nama' => 'Flutter',
                'deskripsi' => 'Pelatihan Flutter',
                'benefit' => 'Sertifikat',
                'harga' => 1000000,
                'foto' => 'flutter.jpg',
                'tanggal_mulai' => '2024-04-23',
                'tanggal_selesai' => '2024-04-25',
                'lokasi' => 'Jakarta',
                'kuota' => 20,
                'kuota_tim' => 5,
                'status' => 'Aktif',
            ],
            [
                'id_kategori' => 5,
                'kode' => 'PL5',
                'nama' => 'Dart',
                'deskripsi' => 'Pelatihan Dart',
                'benefit' => 'Sertifikat',
                'harga' => 1000000,
                'foto' => 'dart.jpg',
                'tanggal_mulai' => '2024-04-23',
                'tanggal_selesai' => '2024-04-25',
                'lokasi' => 'Jakarta',
                'kuota' => 20,
                'kuota_tim' => 5,
                'status' => 'Aktif',
            ]
        ];

        foreach ($data as $pelatihan) {
            \App\Models\Pelatihan::create($pelatihan);
        }
    }
}
