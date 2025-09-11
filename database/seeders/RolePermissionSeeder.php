<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //get all permission exist in db kecauli 'data-pengguna' jika pertama kali seeder hapus method where
        $permissions = Permission::where('group', '!=', 'data-pengguna')->get();

        /**@var Role $role */
        $role = Role::where('name', User::$ROLE_SUPERADMIN)->first();
        $role->givePermissionTo($permissions);
    }
}
