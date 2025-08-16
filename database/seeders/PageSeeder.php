<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        

        # Page 
        $page = Page::create([
            'title' => 'Home',
            'slug'=> Str::slug('home'),
            'content'=> 'tttt',            
        ]);
        
    }
}
