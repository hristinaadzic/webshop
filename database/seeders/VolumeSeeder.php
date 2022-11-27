<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $volumes = [100, 150, 300];
    public function run()
    {
        foreach ($this->volumes as $volume) {
            \DB::table('volumes')->insert([
                'volumeInMillilitres' => $volume
            ]);
        }
    }
}
