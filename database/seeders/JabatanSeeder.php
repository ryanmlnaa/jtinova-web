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
            'Manager',
            'Chief Technology Officer',
            'Supervisor',
            'Staff',
            'Chief Executive Officer',
            'Chief Financial Officer',
            'Chief Operating Officer',
            'Chief Marketing Officer',
            'Chief Human Resources Officer',
            'Chief Information Officer',
            'Chief Security Officer',
            'Chief Legal Officer',
            'Chief Compliance Officer',
            'Chief Privacy Officer',
            'Chief Risk Officer',
            'Chief Strategy Officer',
        ];

        foreach ($jabatan as $item) {
            \App\Models\Jabatan::create([
                'nama' => $item,
            ]);
        }
    }
}
