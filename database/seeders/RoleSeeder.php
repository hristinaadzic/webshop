<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $roles = ["user", "admin-assets"];
    public function run()
    {
        foreach ($this->roles as $role) {
            \DB::table('roles')->insert([
                'name' => $role
            ]);
        }

    }
}
