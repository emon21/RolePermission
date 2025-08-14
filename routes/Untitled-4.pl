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
        //

        # Create Roles
        $RoleSuperAdmin = Role::create(["name" => "super-admin"]);
        $RoleAdmin = Role::create(["name" => "admin"]);
        $RoleEditor = Role::create(["name" => "editor"]);
        $RoleUser = Role::create(["name" => "user"]);
        $RoleManager = Role::create(["name" => "manager"]);

        $RolePermission = Role::create(["name" => "role"]);

        # Permission List as Array
        $RolePermission = Role::create(["name" => "role"]);

        $permissions = [
            ["name" => "role-menu"],
            ["name" => "role-create"],
            ["name" => "role-edit"],
            ["name" => "role-delete"],
            ["name" => "role-view"],
            ["name" => "index"],
        ];

        # Permission assign in role
        $RolePermission->syncPermissions($permissions);
        $role = Role::create(["name" => "permission"]);

        $role->syncPermissions($permissions);

        # users Permissions

        $RolePermission = Role::create(["name" => "permission"]);

        $permissions = [

            # Group Name 

            # Dashboard
            [
                'group_name' => 'Dashboard',

                'permissions' => [
                    'dashboard-menu',
                    'dashboard-create',
                    'dashboard-edit',
                    'dashboard-delete',
                    'dashboard-view'
                ]
            ],
            # Admin
            [
                'group_name' => 'Admin',
                'permissions' => [
                    'admin-menu',
                    'admin-create',
                    'admin-edit',
                    'admin-delete',
                    'admin-view'
                ]

            ],

            # Role
            [
                'group_name' => 'Role',
                'permissions' => [
                    'role-menu',
                    'role-create',
                    'role-edit',
                    'role-delete',
                    'role-view'
                ]
            ],

            # Permission
            [
                'group_name' => 'Permission',
                'permissions' => [
                    'permission-menu',
                    'permission-create',
                    'permission-edit',
                    'permission-delete',
                    'permission-view'
                ]
            ],

            # User
            [
                'group_name' => 'User',
                'permissions' => [
                    'user-menu',
                    'user-create',
                    'user-edit',
                    'user-delete',
                    'user-view'
                ]
            ],

            # Category

            [
                'group_name' => 'Category',
                'permissions' => [
                    'category-menu',
                    'category-create',
                    'category-edit',
                    'category-delete',
                    'category-view',
                    'category-status',
                ]
            ],

            # Blog

            [
                'group_name' => 'Blog',
                'permissions' => [
                    'blog-menu',
                    'blog-create',
                    'blog-edit',
                    'blog-delete',
                    'blog-view',
                    'blog-approve',
                    'blog-disapprove',
                    'blog-trash',
                    'blog-restore',
                    'blog-status'
                ]
            ],

            # Product
            [
                'group_name' => 'Product',
                'permissions' => [
                    'product-menu',
                    'product-create',
                    'product-edit',
                    'product-delete',
                    'product-view'
                ]
            ]
        ];

        # Foreach Loop
        foreach ($permissions as $permission) {

            # Create Permission
            $role = Role::create(["name" => $permission['group_name']]);
            $role->syncPermissions($permission['permissions']);
            $role->syncPermissions($permission['permissions']);
            $role->syncPermissions($permission['permissions']);
            $role->syncPermissions($permission['permissions']);

            # Create Role
            $role->syncPermissions($permission['permissions']);


            # Group Name  loop
            #foreach loop
            // foreach ($variable as  $value) {

            //     $role->givePermissionTo($value);

            // }

            $role->syncPermissions($permission['permissions']);
            # Dashboard
            $role->syncPermissions($permission['permissions']);
            
        }

        # Permission assign in role
        $RolePermission->syncPermissions($permissions);
        $role = Role::create(["name" => "permission"]);

        $role->syncPermissions($permissions);
        $role = Role::create(["name" => "role"]);




        # Permission List as Array
        $RolePermission = Role::create(["name" => "permission"]);

        $permissions = [

            # Group Name 
            // [
            //     'group_name' => 'Dashboard',
            //     'permissions' => [
            //         'dashboard-menu', 'dashboard-create', 'dashboard-edit', 'dashboard-delete','dashboard-view'

            //     ]
            // ];

            // Dashboard
            'dashboard-menu',
            'dashboard-create',
            'dashboard-edit',
            'dashboard-delete',
            'dashboard-view',

            // Blog Permissions

            'blog-menu',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'blog-view',
            'blog-approve',
            'blog-disapprove',
            'blog-trash',
            'blog-restore',
            'blog-status',

            // Admin Permissions

            'admin-menu',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'admin-view',

            # Role Permissions

            'role-menu',
            'role-create',
            'role-edit',
            'role-delete',
            'role-view',

            // Profile Permissions

            'profile-menu',
            'profile-create',
            'profile-edit',
            'profile-delete',
            'profile-view',


            // Category Permissions
            'category-menu',
            'category-create',
            'category-edit',
            'category-delete',
            'category-view',
            'category-approve',
            'category-disapprove',
            'category-trash',
            'category-restore',
            'category-status',

            // Slider Permissions
            'slider-menu',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'slider-view',
            'slider-approve',
            'slider-disapprove',
            'slider-trash',
            'slider-restore',
            'slider-status',

            // Order Permissions
            'order-menu',
            'order-create',
            'order-edit',
            'order-delete',
            'order-view',
            'order-approve',
            'order-disapprove',
            'order-trash',
            'order-restore',
            'order-status',

            // Contact Permissions
            'contact-menu',
            'contact-create',
            'contact-edit',
            'contact-delete',
            'contact-view',
            'contact-approve',
            'contact-disapprove',
            'contact-trash',
            'contact-restore',
            'contact-status',

            // Setting Permissions
            'setting-menu',
            'setting-edit',
            'setting-delete',
            'setting-view',
            'setting-approve',
            'setting-disapprove',
            'setting-trash',
            'setting-restore',
            'setting-status',

            // Product Permissions
            'product-menu',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-view',
            'product-approve',
            'product-disapprove',
            'product-trash',
            'product-restore',
            'product-status',



            // User
            'user-menu',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-menu',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-menu',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'

        ];

        # Permission List

        $permissions = [

            'user-menu',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',


            'role-menu',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',


            'product-menu',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'category-menu',
            'category-create',
            'category-edit',
            'category-delete',


            'blog-menu',
            'blog-create',
            'blog-edit',
            'blog-delete',


            'setting-menu',
            'setting-edit',
            'setting-delete',


            'slider-menu',
            'slider-create',
            'slider-edit',
            'slider-delete',


            'about-menu',
            'about-create',
            'about-edit',
            'about-delete',


            'faq-menu',
            'faq-create',
            'faq-edit',
            'faq-delete',


            'brand-menu',
            'brand-create',
            'brand-edit',
            'brand-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
