<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Pendaftaran Mahasiswa MBKM Semester Pendek Tahun Ajaran 2023/2024',
                'jenis' => 'mbkm',
                'tahun_ajaran' => '2023/2024 Semester Pendek',
                'timeline' => '[{"title": "Pendaftaran","start": "2023-03-01","end": "2023-03-31"},{"title": "Verifikasi Berkas","start": "2023-04-01","end": "2023-04-07"},{"title": "Pengumuman","start": "2023-04-08","end": "2023-04-10"},{"title": "Daftar Ulang","start": "2023-04-11","end": "2023-04-14"}]',
                'status' => 0,
            ],
            [
                'title' => 'Pendaftaran Instruktur 2024',
                'jenis' => 'instruktur',
                'tahun_ajaran' => '2023/2024 Semester Pendek',
                'timeline' => '[{"title": "Pendaftaran","start": "2023-03-01","end": "2023-03-31"},{"title": "Verifikasi Berkas","start": "2023-04-01","end": "2023-04-07"},{"title": "Pengumuman","start": "2023-04-08","end": "2023-04-10"},{"title": "Daftar Ulang","start": "2023-04-11","end": "2023-04-14"}]',
                'status' => 0,
            ],
        ];

        foreach ($data as $timeline) {
            \App\Models\Timeline::create($timeline);
        }
    }
}
