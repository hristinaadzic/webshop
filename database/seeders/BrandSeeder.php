<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $brands = ["Armani", "Chanel", "Gucci", "Dior", "Tom Ford", "Versace"];
    public function run()
    {
        foreach ($this->brands as $brand) {
            \DB::table('brands')->insert([
                'name' => $brand
            ]);
        }

    }
}
