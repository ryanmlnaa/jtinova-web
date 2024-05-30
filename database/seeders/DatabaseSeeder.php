<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            WebConfigSeeder::class,
            KeahlianSeeder::class,
            ProdiSeeder::class,
            MbkmUserSeeder::class,
            SkemaPendampinganSeeder::class,
            PendampinganUserSeeder::class,
            PelatihanSeeder::class,
            PelatihanUserSeeder::class,
        ]);
    }
}
