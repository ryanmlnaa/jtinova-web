<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
            [
                'name' => 'Pegawai 1',
                'email' => 'pegawai1@jtinova.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'Pegawai 2',
                'email' => 'pegawai2@jtinova.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'Mahasiswa MBKM Tefa 1',
                'email' => 'mhsmbkm1@jtinova.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'Mahasiswa MBKM Tefa 2',
                'email' => 'mhsmbkm2@jtinova.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'User Pelatihan 1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'User Pelatihan 2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'Instruktur 1',
                'email' => 'instruktur1@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'Instruktur 2',
                'email' => 'instruktur2@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'User Pendampingan 1',
                'email' => 'userpendampingan1@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
            [
                'name' => 'User Pendampingan 2',
                'email' => 'userpendampingan2@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => '2024-05-01 13:57:03',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $role1 = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $permission = Permission::pluck('id', 'id')->all();
        $role1->syncPermissions($permission);
        $user1 = User::find(1);
        $user1->assignRole($role1->id);

        $role2 = Role::create(['name' => 'pegawai', 'guard_name' => 'web']);
        $permission = Permission::whereNotIn('name', ['role-list', 'role-create', 'role-edit', 'role-delete'])->pluck('id', 'id')->all();
        $role2->syncPermissions($permission);
        $user2 = User::find(2);
        $user2->assignRole($role2->id);
        $user2_1 = User::find(3);
        $user2_1->assignRole($role2->id);


        $role3 = Role::create(['name' => 'mahasiswa-mbkm', 'guard_name' => 'web']);
        $permission = Permission::whereIn('name', [
            'produk-list',
        ])->pluck('id', 'id')->all();
        $role3->syncPermissions($permission);
        $user3 = User::find(4);
        $user3->assignRole($role3->id);
        $user3_1 = User::find(5);
        $user3_1->assignRole($role3->id);
        
        $role4 = Role::create(['name' => 'user-pelatihan', 'guard_name' => 'web']);
        $permission = Permission::whereIn('name', [
            'produk-list',
        ])->pluck('id', 'id')->all();
        $role4->syncPermissions($permission);
        $user4 = User::find(6);
        $user4->assignRole($role4->id);
        $user4_1 = User::find(7);
        $user4_1->assignRole($role4->id);

        $role5 = Role::create(['name' => 'instruktur', 'guard_name' => 'web']);
        $permission = Permission::whereIn('name', [
            'produk-list',
        ])->pluck('id', 'id')->all();
        $role5->syncPermissions($permission);
        $user5 = User::find(8);
        $user5->assignRole($role5->id);
        $user5_1 = User::find(9);
        $user5_1->assignRole($role5->id);

        $role6 = Role::create(['name' => 'user-pendampingan', 'guard_name' => 'web']);
        $permission = Permission::whereIn('name', [
            'produk-list',
        ])->pluck('id', 'id')->all();
        $role6->syncPermissions($permission);
        $user6 = User::find(10);
        $user6->assignRole($role6->id);
        $user6_1 = User::find(11);
        $user6_1->assignRole($role6->id);

        // seed user factory
        User::factory(10)->userPelatihan()->create();
    }
}
