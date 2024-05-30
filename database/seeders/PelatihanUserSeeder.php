<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PelatihanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // run factory
        \App\Models\PelatihanUser::factory(20)->create();
    }
}
