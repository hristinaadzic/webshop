<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10; $i++){
            \DB::table('product_categories')->insert([
                "productId" => rand(1,6),
                "categoryId" => rand(1,4)
            ]);

        }
    }
}
