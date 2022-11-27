<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<16; $i++){
            \DB::table('prices')->insert([
                "priceValue" => rand(35,150),
                "productVolumeId" => $i
            ]);

        }
    }
}
