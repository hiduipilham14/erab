<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Akses;

class SpatieSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        // // 1️⃣ Buat Role
        // $roles = $this->buatRole();
        // $users = $this->buatUser();
        // $this->createPermission();
        //     // 2 Assign Role ke User
        // $users['admin']->assignRole($roles['admin']);
        // $users['user']->assignRole($roles['user']);
        // $users['superAdmin']->assignRole($roles['superadmin']);

        $this->buatUser();
    }

    public function buatRole(): array {
        $superAdminRole = Role::updateOrCreate(['name' => 'Super Admin']);
        $adminRole = Role::updateOrCreate(['name' => 'Admin']);
        $userRole = Role::updateOrCreate(['name' => 'User']);

        return [
            'superadmin' => $superAdminRole,
            'admin' => $adminRole,
            'user' => $userRole
        ];
    }

    public function buatUser() : array {
        $admin = User::updateOrCreate(
            [
                'name' => 'admin',
                'username' => 'adminsaja',
                'role_id' => 5, // kasi kosong
                'password' => Hash::make('12345678'),
            ]
        );
        $user = User::updateOrCreate(
            [
                'name' => 'user',
                'username' => 'usersaja',
                'role_id' => 6, // kasi kosong
                'password' => Hash::make('12345678'),
            ]
        );
        $superAdmin = User::updateOrCreate(
            [
                'name' => 'super admin',
                'username' => 'administrator',
                'role_id' => 4, // disable static assign jika seeding role dan user dari awal
                'password' => Hash::make('12345678'),
            ]
        );
        return compact('admin','user','superAdmin');
    }

    public function createPermission() {
        $permissions = [
            'akses' => [
                'lihat-akses',
                'edit-akses',
            ],
            'data-diameter' => [
                'lihat-diameter',
                'tambah-diameter',
                'hapus-diameter',
                'edit-diameter',
            ],
            'data-divisi' => [
                'lihat-divisi',
                'tambah-divisi',
                'edit-divisi',
                'hapus-divisi',
            ],
            'data-pipa' => [
                'lihat-pipa',
                'tambah-pipa',
                'edit-pipa',
                'hapus-pipa',
            ],
            'data-rab' => [
                'lihat-rab',
                'tambah-rab',
                'edit-rab',
                'hapus-rab',
            ],
            'update-gis' => [
                'lihat-gis',
                'tambah-gis',
                'edit-gis',
                'hapus-gis',
            ],
            'jaringan-baru' => [
                'lihat-jaringan-baru',
                'tambah-jaringan-baru',
                'edit-jaringan-baru',
                'hapus-jaringan-baru',
            ],
            'penggantian-pipa' => [
                'buat-penggantian-pipa',
                'lihat-penggantian-pipa',
                'edit-penggantian-pipa',
                'hapus-penggantian-pipa',
            ],
            'laporan-rab' => [
                'buat-laporan-rab',
                'lihat-laporan-rab',
                'edit-laporan-rab',
                'hapus-laporan-rab',
                'ekspor-laporan-rab',
            ],
            'laporan-gis' => [
                'buat-laporan-gis',
                'lihat-laporan-gis',
                'edit-laporan-gis',
                'hapus-laporan-gis',
                'ekspor-laporan-gis',
            ],
            'pengguna' => [
                'lihat-pengguna',
                'tambah-pengguna',
                'edit-pengguna',
                'hapus-pengguna',
            ],
            'profile' => [
                'tambah-profile',
                'edit-profile',
                'hapus-profile',
                'lihat-profile',
            ],
            'jabatan' => [
                'tambah-jabatan',
                'edit-jabatan',
                'hapus-jabatan',
                'lihat-jabatan',
            ],
        ];

        foreach ($permissions as $group => $permissionList) {
            foreach ($permissionList as $permissionName) {
                Akses::updateOrCreate([
                    'name' => $permissionName,
                    'group' => $group,
                ]);
            }
        }
    }     
}