<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ingredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 100; $i++) {
            DB::table('ingredients')->insert([
                'dish_id' => rand(1, 30),
                'ingredient' => Str::random(10),
                'measurement' => Str::random(10) . rand(1, 100),
            ]);
        }
        
    }
}
