<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrukturUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 8,
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Jalan No. 1',
                'jenis_kelamin' => 'L',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'PNS',
                'foto' => 'foto.jpg',
                'portofolio' => 'portofolio.pdf',
                'cv' => 'cv.pdf',
                'linkedin' => 'https://linkedin.com/in/username',
                'status' => 'Aktif',
            ],
            [
                'user_id' => 9,
                'no_hp' => '081234567891',
                'alamat' => 'Jl. Jalan No. 2',
                'jenis_kelamin' => 'P',
                'pendidikan_terakhir' => 'S2',
                'pekerjaan' => 'Dosen',
                'foto' => 'foto.jpg',
                'portofolio' => 'portofolio.pdf',
                'cv' => 'cv.pdf',
                'linkedin' => 'https://linkedin.com/in/username',
                'status' => 'Aktif',
            ],
        ];

        foreach ($data as $instruktur) {
            \App\Models\InstrukturUser::create($instruktur);
        }
    }
}
