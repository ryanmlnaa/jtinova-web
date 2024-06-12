<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            'Manager Tefa',
            'Dewan Pengarah',
            'Administrasi',
            'KADIV Pengembangan Sistem Informasi dan Start Up',
            'KADIV Layanan Jasa',
            'KADIV SDM dan Kerjasama',
            'KADIV Keuangan',
            'Tim Teknis',
        ];

        foreach ($jabatan as $item) {
            \App\Models\Jabatan::create([
                'nama' => $item,
            ]);
        }
    }
}
