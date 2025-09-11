<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSigner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void {
        $roleAdministrator = Role::findByName('Super Admin');
        $roleAdministrator->syncPermissions([
            'tambah-pengguna',
            'edit-pengguna',
            'hapus-pengguna',
            'lihat-user',
            'lihat-akses',
            'edit-akses'
        ]);

        // assign role to user
        $user = User::where('name', 'administrator')->first();

        if ($user) {
            $user->syncRoles($roleAdministrator);
            echo "Role 'Administrator' assigned to 'Super Administrator'.";
        } else {
            echo "User 'Super Administrator' not found.";
        }
    }
}
