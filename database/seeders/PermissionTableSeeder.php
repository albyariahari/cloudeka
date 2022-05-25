<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            'User',
            'Role',
            'Product Category',
            'Product',
            'Solution',
            'Calculator',
            'Calculator Component',
            'Package',
            'Setting',
        ];

        $permissions = ['Create', 'Edit', 'Show', 'Delete'];

        $role = Role::create(['name' => 'Super Admin']);
        foreach ($modules as $module) {
            foreach ($permissions as $key => $permission) {
                Permission::create(['name' => $module . ' ' . $permission]);
            }
        }
        $role->syncPermissions($permissions);
    }
}
