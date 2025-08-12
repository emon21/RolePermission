<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Product::whereIn('id', [1, 2,3,4,5,6,7,8,9,10])->delete(); // ek sathe onegulo data delete korar jonno use kora hoi.
        Product::truncate();

        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => fake()->sentence(3),
                'description' => fake()->paragraph(5),
                'price' => fake()->randomFloat(2, 0, 100),
                'quantity' => fake()->randomFloat(2, 0, 100),
            ]);
        }

        // for ($i=0; $i <10 ; $i++) { 

        //     DB::table('products')->insert([
        //         'name' => fake()->sentence(10),
        //         'description' => fake()->paragraph(30),
        //         'price' => fake()->sentence(10),
        //         'quantity' => fake()->randomFloat(2,0,100),
        //     ]);
        // }
    }
}
