<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $categories = ["Floral", "Citrus", "Fresh", "Woody"];

    public function run()
    {
        foreach ($this->categories as $category) {
            \DB::table('categories')->insert([
                'name' => $category
            ]);
        }

    }
}
