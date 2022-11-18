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
        $dish_list = [
            'manok',
            'baboy',
            'ibon',
            'baka',
            'pig',
            'ahas',
            'frogs',
            'rat',
            'boar',
            'wild boar',
            'domestic boar',
            'monkey',
            'ostrich',
            'chicken',
            'goose',
            'turkey',
            'pigeon',
            'quail',
            'donkey',
            'bats',
            'fish',
            'bass',
        ];
        $cook_type = [
            'Adobong',
            'Fried',
            'Boiled',
            'Ginisang',
            'Inihaw na',
            'Scrambled',
            'Grilled',
            'Broiled',
            'Simmered',
            'Searing',
            'Poached',
            'Steamed',
            'Giniling na',
            'Inihaw',
            'Steamed',
            'Steamed',
            'Grilled',
            'Boiled',
            'Rotisseried',
            'Smoked',
            'Stewed',
            'Roasted',
        ];


        for($i = 1; $i < 420; $i++) {
            DB::table('dishes')->insert([
                'dish_name' => $cook_type[rand(0, 19)] ." ".  ucfirst($dish_list[rand(0, 19)]),
                'description' => Str::random(100)
            ]);
        }
    }
}
