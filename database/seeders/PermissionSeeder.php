<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        # Permission List

        $permissions = [
            'user-menu','user-list', 'user-create', 'user-edit', 'user-delete',
            'role-menu','role-list', 'role-create', 'role-edit', 'role-delete',
            'product-menu','product-list','product-create', 'product-edit', 'product-delete'
            // 'permission-menu', 'permission-create', 'permission-edit', 'permission-delete',
            // 'category-menu', 'category-create', 'category-edit', 'category-delete',
            // 'blog-menu', 'blog-create', 'blog-edit', 'blog-delete',
            // 'setting-menu', 'setting-edit', 'setting-delete',
            // 'slider-menu', 'slider-create', 'slider-edit', 'slider-delete',
            // 'order-menu', 'order-create', 'order-edit', 'order-delete',
            // 'contact-menu', 'contact-create', 'contact-edit', 'contact-delete',
            // 'about-menu', 'about-create', 'about-edit', 'about-delete',
            // 'faq-menu', 'faq-create', 'faq-edit', 'faq-delete',
            // 'brand-menu', 'brand-create', 'brand-edit', 'brand-delete'
        ];

        foreach($permissions AS $permission){
           Permission::create(['name' => $permission]);
           
        }
    }
}
