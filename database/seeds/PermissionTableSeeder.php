<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-create',
           'product-edit',
           'product-delete',
           'product-list',
           'admin',

        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
