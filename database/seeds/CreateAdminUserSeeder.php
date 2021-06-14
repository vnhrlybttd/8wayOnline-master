<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shan = User::create([
        	'name' => 'Shan Battad', 
        	'email' => 'shanadmin@gmail.com',
        	'password' => bcrypt('shanadmin')
        ]);

        $vin = User::create([
        	'name' => 'Vin Battad', 
        	'email' => 'vhbattad@gmail.com',
        	'password' => bcrypt('Friendster12s')
        ]);
  
        $role = Role::create(['name' => 'Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $shan->assignRole([$role->id]);
        $vin->assignRole([$role->id]);
    }
}
