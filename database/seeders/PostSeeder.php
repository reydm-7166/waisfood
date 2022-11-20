<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++) {
            DB::table('posts')->insert([
                'unique_id' => rand(5000, 1000000),
                'user_id' => 1,
                'post_title' => Str::random(10),
                'post_content' => Str::random(30),
            ]);
        }
    }
}
