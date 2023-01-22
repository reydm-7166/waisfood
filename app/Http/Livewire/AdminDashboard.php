<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Charts\MainChart;

class AdminDashboard extends Component
{
    public function render()
    {
        $all = Recipe::get();

        $mainChart = new MainChart;


        foreach($all as $key => $value)
        {
            $all[$key]->recipes_posted =  Recipe::where('author_id', $value->id)->where('is_approved', 0)->count();

            $all[$key]->recipes_approved = Recipe::where('author_id', $value->id)->where('is_approved', 1)->count();
        }


        // dd(json_encode(json_decode($all), JSON_PRETTY_PRINT));

        $mainChart->labels(['One', 'Two', 'Three', 'Four']);
        $mainChart->dataset('My dataset', 'line', [1, 2, 3, 4]);

        return view('livewire.admin-dashboard', compact('mainChart'));
    }
}
