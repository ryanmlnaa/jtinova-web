<?php

namespace Database\Seeders;

use App\Models\MbkmUser;
use Illuminate\Database\Seeder;

class MbkmUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MbkmUser::create([
            'user_id' => 4,
            'prodi_id' => rand(1, 5),
            'nim' => 'E41191234',
            'semester' => rand(1, 8),
            'golongan' => 'A',
            'tahun_masuk' => '2021',
            'no_hp' => '081234567890',
            'status' => 'aktif'
        ]);

        MbkmUser::create([
            'user_id' => 5,
            'prodi_id' => rand(1, 5),
            'nim' => 'E41191235',
            'semester' => rand(1, 8),
            'golongan' => 'A',
            'tahun_masuk' => '2021',
            'no_hp' => '081234567890',
            'status' => 'aktif'
        ]);

        MbkmUser::find(1)->keahlian()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        MbkmUser::find(2)->keahlian()->attach([1, 2, 3, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30]);
    }
}
