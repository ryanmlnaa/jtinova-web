<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelatihanTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pelatihan_id' => 1,
                'nama' => 'Tim A',
            ],
            [
                'pelatihan_id' => 1,
                'nama' => 'Tim B',
            ],
            [
                'pelatihan_id' => 1,
                'nama' => 'Tim C',
            ],
            [
                'pelatihan_id' => 2,
                'nama' => 'Tim A',
            ],
            [
                'pelatihan_id' => 2,
                'nama' => 'Tim B',
            ],
            [
                'pelatihan_id' => 2,
                'nama' => 'Tim C',
            ],
            [
                'pelatihan_id' => 3,
                'nama' => 'Tim A',
            ],
            [
                'pelatihan_id' => 3,
                'nama' => 'Tim B',
            ],
            [
                'pelatihan_id' => 3,
                'nama' => 'Tim C',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\PelatihanTeam::create($item);
        }
    }
}
