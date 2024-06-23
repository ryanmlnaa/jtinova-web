<?php

namespace Database\Seeders;

use App\Models\InstrukturUser;
use App\Models\MbkmUser;
use App\Models\Pegawai;
use App\Models\PendampinganUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@jtinova.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $user1 = User::find(1);
        $user1->assignRole('admin');

        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('pegawai');
            Pegawai::factory(1)->create(['user_id' => $user->id]);
        });

        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('mahasiswa-mbkm');
            MbkmUser::factory(1)->create(['user_id' => $user->id])->each(function ($mbkmUser) {
                $mbkmUser->keahlian()->attach([rand(1, 30), rand(1, 30), rand(1, 30), rand(1, 30), rand(1, 30)]);
            });
        });

        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('user-pelatihan');
        });

        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('user-pendampingan');
            PendampinganUser::factory(1)->create(['user_id' => $user->id]);
        });

        // User::factory(5)->create()->each(function ($user) {
        //     $user->assignRole('instruktur');
        //     InstrukturUser::factory(1)->create(['user_id' => $user->id]);
        // });
    }
}
