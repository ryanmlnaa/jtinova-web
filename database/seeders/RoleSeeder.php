<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'admin',
            'pegawai',
            'mahasiswa-mbkm',
            'user-pelatihan',
            'user-pendampingan',
            'instruktur',
            'user'
        ];

        foreach ($data as $role) {
            Role::create(['name' => $role, 'guard_name' => 'web']);
        }

        $permissionsAdmin = Permission::pluck('id', 'id')->all();
        $admin = Role::findByName('admin');
        $admin->syncPermissions($permissionsAdmin);

        $permissionPegawai = Permission::whereNotIn('name', ['role-list', 'role-create', 'role-edit', 'role-delete'])->pluck('id', 'id')->all();
        $pegawai = Role::findByName('pegawai');
        $pegawai->syncPermissions($permissionPegawai);
    }
}
