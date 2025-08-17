<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        # User Create

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('12345678'),
            'profile_Photo' => "https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg",
        ]);

        # User Profile

        $userProfile = new UserProfile();
        $userProfile->user_id = $superAdmin->id;
        $userProfile->website = fake()->url();
        $userProfile->github_url = fake()->url();
        $userProfile->facebook_url = fake()->url();
        $userProfile->twitter_url = fake()->url();
        $userProfile->linkedin_url = fake()->url();
        $userProfile->instagram_url = fake()->url();
        $userProfile->save();


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'profile_Photo' => fake()->addProvider(User::class),

        ]);



        # Create Role
        $role = Role::create(['name' => 'admin']);

        # Assign Permission to Role

        // Permission::create(['name' => 'user-menu']);

        $permission = Permission::pluck('id')->all();

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
