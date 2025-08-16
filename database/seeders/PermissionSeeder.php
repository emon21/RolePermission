<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        # Create Roles
        $rolesSuperAdmin = Role::create(['name' => 'superadmin']);
        // $rolesAdmin = Role::create(['name' => 'admin']);
        $rolesEditor = Role::create(['name' => 'editor']);
        $rolesUser = Role::create(['name' => 'user']);

        # Permission List

        $permissions = [

            // Dashboard Permissions
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard-view',
                    'dashboard-edit',
                ]
            ],

            // Profile Permissions
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile-edit',
                    'profile-view'
                ]
            ],

            // Admin Permissions
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin-menu',
                    'admin-create',
                    'admin-edit',
                    'admin-delete',
                    'admin-view',
                ]
            ],

            // Role Permissions
            [
                'group_name' => 'role',
                'permissions' => [
                    'role-menu',
                    'role-create',
                    'role-edit',
                    'role-delete',
                    'role-view',
                    'role-list',
                ]
            ],

            // Role Permissions
            [
                'group_name' => 'permission',
                'permissions' => [
                    'permission-menu',
                    'permission-create',
                    'permission-edit',
                    'permission-delete',
                    'permission-view',
                ]
            ],

            // Blog Permissions
            [
                'group_name' => 'blog',
                'permissions' => [
                    'blog-menu',
                    'blog-create',
                    'blog-edit',
                    'blog-delete',
                    'blog-view'
                ]
            ],

            // User Permissions
            [
                'group_name' => 'user',
                'permissions' => [
                    'user-menu',
                    'user-create',
                    'user-edit',
                    'user-delete',
                    'user-view',
                    'user-list',
                ]
            ]

        ];


        # Create and Assign Permissions

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                //Create Permissions
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);

                //Assign Permission to Roles
                $rolesSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($rolesSuperAdmin);
            }
        }
    }
}
