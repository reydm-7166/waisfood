<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++) {
            $pass = Str::random(10) . rand(1, 100);
            // \Log::info($pass);
            DB::table('users')->insert([
                'unique_id' => rand(5000, 1000000),
                'first_name' => "Reymond",
                'last_name' => "LastName",
                'age' => 22,
                'email_address' => "reydm.7166@gmail.com",
                'password' => bcrypt($pass),
                'service_id' => rand(5000, 1000000),
                'profile_picture' => "profile_picture.jpg",
            ]);
        }
    }
}