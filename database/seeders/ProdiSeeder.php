<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['code' => 'TIF', 'name' => 'Teknik Informatika'],
            ['code' => 'MIF', 'name' => 'Manajemen Informatika'],
            ['code' => 'TKK', 'name' => 'Teknik Komputer'],
            ['code' => 'TIF-BWS', 'name' => 'Teknik Informatika - Bondowoso'],
            ['code' => 'TIF-INTER', 'name' => 'Teknik Informatika - Internasional'],
            ['code' => 'TIF-SDA', 'name' => 'Teknik Informatika - PSDKU Sidoarjo'],
            ['code' => 'TIF-NGA', 'name' => 'Teknik Informatika - PSDKU Nganjuk'],
            ['code' => 'TIF-PLJ', 'name' => 'Teknik Informatika - Program Lintas Jenjang'],
            ['code' => 'MIF-INTER', 'name' => 'Manajemen Informatika - Internasional'],
            ['code' => 'TKK-WUX', 'name' => 'Teknik Komputer - WUXIT'],
            ['code' => 'BSD', 'name' => 'Bisnis Digital'],
        ];

        foreach ($data as $prodi) {
            Prodi::create($prodi);
        }
    }
}
