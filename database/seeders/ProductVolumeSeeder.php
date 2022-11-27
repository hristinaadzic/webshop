<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for($i = 0; $i<15; $i++){
            \DB::table('product_volumes')->insert([
                "productId" => rand(1,6),
                "volumeId" => rand(1,3)
            ]);

        }
    }
}
