<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        # User 

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('12345678')
        ]);
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678')
        ]);

        # Create Role
        $role = Role::create(['name' => 'admin']);

        # Assign Permission to Role

        // Permission::create(['name' => 'user-menu']);

        $permission =Permission::pluck('id')->all();

        $role->syncPermissions($permission);


        // $superAdmin->assignRole('Super Admin');
        // $superAdmin->assignRole('Admin');
        // $superAdmin->assignRole('User');
        // $superAdmin->assignRole('Customer');

        #Assign Role to User
        $superAdmin->assignRole($role);
        $admin->syncRoles($role);
            
    }
}
