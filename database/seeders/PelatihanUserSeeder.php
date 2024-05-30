<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelatihanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelatihanUsers = [
            [
                'pelatihan_id' => 1,
                'user_id' => 1,
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Raya No. 1',
                'jenis_kelamin' => 'L',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'PNS',
                'foto' => 'foto1.jpg',
            ],
            [
                'pelatihan_id' => 1,
                'user_id' => 2,
                'no_hp' => '081234567891',
                'alamat' => 'Jl. Raya No. 2',
                'jenis_kelamin' => 'P',
                'pendidikan_terakhir' => 'S2',
                'pekerjaan' => 'Dosen',
                'foto' => 'foto2.jpg',
            ],
            [
                'pelatihan_id' => 2,
                'user_id' => 3,
                'no_hp' => '081234567892',
                'alamat' => 'Jl. Raya No. 3',
                'jenis_kelamin' => 'L',
                'pendidikan_terakhir' => 'S3',
                'pekerjaan' => 'Wirausaha',
                'foto' => 'foto3.jpg',
            ],
        ];

        foreach ($pelatihanUsers as $pelatihanUser) {
            \App\Models\PelatihanUser::create($pelatihanUser);
        }
    }
}
