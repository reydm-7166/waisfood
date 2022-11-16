<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 420; $i++) {
            DB::table('dishes')->insert([
                'dish_name' => "Adobong " . Str::random(6),
                'description' => Str::random(100)
            ]);
        }
    }
}
