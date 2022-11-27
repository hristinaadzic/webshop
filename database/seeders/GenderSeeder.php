<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $genders = ["male", "female"];
    public function run()
    {
        foreach ($this->genders as $gender) {
            \DB::table('genders')->insert([
                'name' => $gender
            ]);
        }

    }
}
