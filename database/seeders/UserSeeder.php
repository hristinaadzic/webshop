<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $firstNames = ["Admin", "Pera", "Mika"];
    private $lastNames = ["Admin", "Peric", "Mikic"];
    private $emails = ["admin-assets@gmail.com", "pera@gmail.com", "mika@gmail.com"];
    private $passwords = ["admin123", "pera123", "mika123"];
    private $roleIds = [2, 1, 1];
    public function run()
    {
        for($i = 0; $i<count($this->firstNames); $i++){
            \DB::table("users")->insert([
                "firstName" => $this->firstNames[$i],
                "lastName" => $this->lastNames[$i],
                "email" => $this->emails[$i],
                "password" => md5($this->passwords[$i]),
                "roleId" => $this->roleIds[$i]
            ]);
        }
    }
}
