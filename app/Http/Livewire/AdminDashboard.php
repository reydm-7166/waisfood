<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Charts\MainChart;
use DB;
use Carbon\Carbon;
use Charts;

class AdminDashboard extends Component
{
    public $duration = '-30 days';

    public $chartType = 'line';

    public $newKeys;


    public function mount()
    {
        $this->newKeys = $this->getChartData();
        $this->dispatchBrowserEvent('contentChanged');
        //
    }


    public function updatedChartType()
    {
        $this->newKeys = $this->getChartData();

        $this->dispatchBrowserEvent('contentChanged');


    }
    public function updatedDuration()
    {

        $this->newKeys = $this->getChartData();

        $this->dispatchBrowserEvent('contentChanged');

    }


    public function getChartData()
    {

        $recipe = new Recipe;

        $recipe_date = $recipe->where('is_approved', '!=', 1)->where('is_approved', '!=', 4)->orderBy('created_at')->pluck('is_approved', 'created_at');

        $thirty_days_ago = date('Y-m-d', strtotime($this->duration));

        $data = Recipe::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day, DATE(created_at) date')
                        ->where('is_approved', '!=', 1)
                        ->where('is_approved', '!=', 4)
                        ->whereDate('created_at', ">=" , $thirty_days_ago)
                        ->orderBy('created_at')
                        ->groupBy('date', 'year', 'month', 'day')
                        ->pluck('count', 'date');

        //replace old collection key - technically convert it to something readable
        $newKeys = array();
        $i = 0;
        foreach ($data as $key => $value) {
            $newKeys[Carbon::parse($data->keys()[$i])->format("M jS")] = $value;
            $i++;
        }
        //converts to collection
        $newKeys = collect($newKeys);
        return $newKeys;
    }

    public function render()
    {
        // dd($this->newKeys);
        return view('livewire.admin-dashboard', [
            'newKeyss' => json_encode($this->newKeys),
            'chartType' => $this->chartType,
            'duration' => $this->duration
        ]);
    }
}
