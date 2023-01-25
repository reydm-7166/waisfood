<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Feedback;
use App\Charts\MainChart;
use App\Models\RecipeLog;
use DB;
use Carbon\Carbon;
use Charts;

class AdminDashboard extends Component
{
    public $duration = '-30 days';

    public $chartType = 'bar';

    //2 charts at top
    public $recipePosted;
    public $recipeApproved;

    //4blocks at middle
    public $userCount;
    public $postReviewedCount;
    public $postEmailedCount;
    public $postJunkedCount;

    //3 charts below

    public $commentCount;
    public $reviewCount;
    public $voteCount;

    protected $listeners = [
        'init' => 'init'
    ];

    public function init()
    {
        //get data for mainChart
        $this->recipePosted = $this->recipePosted();
        $this->recipeApproved = $this->recipeApproved();

        //get data for users block
        $this->userCount = $this->getUsers();
        //get data for reviewed block
        $this->postReviewedCount = $this->getReviewed();
        //get data for emailed block
        $this->postEmailedCount = $this->getMailed();
        //get data for trashed block
        $this->postJunkedCount = $this->getTrashed();

        //get data for belowChart
        $this->commentCount = $this->getComment();
        $this->reviewCount = $this->getReview();

        $this->dispatchBrowserEvent('contentChanged');

        //
    }


    public function updatedChartType()
    {
         //get data for mainChart
        $this->recipePosted = $this->recipePosted();
        $this->recipeApproved = $this->recipeApproved();

        //get data for users block
        $this->userCount = $this->getUsers();
        //get data for reviewed block
        $this->postReviewedCount = $this->getReviewed();
        //get data for emailed block
        $this->postEmailedCount = $this->getMailed();
        //get data for trashed block
        $this->postJunkedCount = $this->getTrashed();

        //get data for belowChart
        $this->commentCount = $this->getComment();
        $this->reviewCount = $this->getReview();

        $this->dispatchBrowserEvent('contentChanged');


    }
    public function updatedDuration()
    {
        //get data for mainChart
        $this->recipePosted = $this->recipePosted();
        $this->recipeApproved = $this->recipeApproved();

        //get data for users block
        $this->userCount = $this->getUsers();
        //get data for reviewed block
        $this->postReviewedCount = $this->getReviewed();
        //get data for emailed block
        $this->postEmailedCount = $this->getMailed();
        //get data for trashed block
        $this->postJunkedCount = $this->getTrashed();

        //get data for belowChart
        $this->commentCount = $this->getComment();
        $this->reviewCount = $this->getReview();

        $this->dispatchBrowserEvent('contentChanged');

    }



    public function recipePosted()
    {

        $recipe = new Recipe;

        $recipe_date = $recipe->where('is_approved', '!=', 1)->where('is_approved', '!=', 4)->orderBy('created_at')->pluck('is_approved', 'created_at');

        $thirty_days_ago = date('Y-m-d', strtotime($this->duration));

        $data_posted = Recipe::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day, DATE(created_at) date')
                        ->where('is_approved', '!=', 1)
                        ->where('is_approved', '!=', 4)
                        ->whereDate('created_at', ">=" , $thirty_days_ago)
                        ->orderBy('created_at')
                        ->groupBy('date', 'year', 'month', 'day')
                        ->withoutTrashed()
                        ->pluck('count', 'date');

        //replace old collection key - technically convert it to something readable
        $newKeys = array();
        $i = 0;
        foreach ($data_posted as $key => $value) {
            $newKeys[Carbon::parse($data_posted->keys()[$i])->format("M jS")] = $value;
            $i++;
        }
        //converts to collection
        $newKeys = collect($newKeys);
        return $newKeys;
    }

    public function recipeApproved()
    {

        $recipe = new Recipe;

        $thirty_days_ago = date('Y-m-d', strtotime($this->duration));

        $data_approved = Recipe::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day, DATE(created_at) date')
                        ->where('is_approved', 1)
                        ->whereDate('updated_at', ">=" , $thirty_days_ago)
                        ->orderBy('updated_at')
                        ->groupBy('date', 'year', 'month', 'day')
                        ->withoutTrashed()
                        ->pluck('count', 'date');


        //replace old collection key - technically convert it to something readable
        $newKeys = array();
        $i = 0;
        foreach ($data_approved as $key => $value) {
            $newKeys[Carbon::parse($data_approved->keys()[$i])->format("M jS")] = $value;
            $i++;
        }
        //converts to collection
        $newKeys = collect($newKeys);
        return $newKeys;
    }

    public function getUsers()
    {
        $duration = date('Y-m-d', strtotime($this->duration));

        $userData = User::whereDate('created_at', ">=" , $duration)
                        ->where('role_as', 0)
                        ->count();

        return $userData;
    }

    public function getMailed()
    {
        $duration = date('Y-m-d', strtotime($this->duration));

        $mailedData = RecipeLog::whereDate('created_at', ">=" , $duration)
                        ->where('status', 300)
                        ->count();
        return $mailedData;
    }
    public function getReviewed()
    {
        $duration = date('Y-m-d', strtotime($this->duration));

        $reviewedData = RecipeLog::whereDate('created_at', ">=" , $duration)
                        ->where('status', 200)
                        ->count();
        return $reviewedData;
    }

    public function getTrashed()
    {
        $duration = date('Y-m-d', strtotime($this->duration));

        $trashedData = RecipeLog::whereDate('created_at', ">=" , $duration)
                        ->where('status', 400)
                        ->count();
        return $trashedData;
    }

    public function getComment()
    {
        $duration = date('Y-m-d', strtotime($this->duration));

        $commentData = Comment::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day, DATE(created_at) date')
                                            ->whereDate('created_at', ">=" , $duration)
                                            ->orderBy('created_at')
                                            ->groupBy('date', 'year', 'month', 'day')
                                            ->pluck('count', 'date');


        //replace old collection key - technically convert it to something readable
        $newKeys = array();
        $i = 0;
        foreach ($commentData as $key => $value) {
            $newKeys[Carbon::parse($commentData->keys()[$i])->format("M jS")] = $value;
            $i++;
        }

        //converts to collection
        $commentData = collect($newKeys);

        return $commentData;
    }

    public function getReview()
    {
        $duration = date('Y-m-d', strtotime($this->duration));

        $reviewData = Feedback::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month, DAY(created_at) day, DATE(created_at) date')
                                            ->whereDate('created_at', ">=" , $duration)
                                            ->orderBy('created_at')
                                            ->groupBy('date', 'year', 'month', 'day')
                                            ->pluck('count', 'date');


        //replace old collection key - technically convert it to something readable
        $newKeys = array();
        $i = 0;
        foreach ($reviewData as $key => $value) {
            $newKeys[Carbon::parse($reviewData->keys()[$i])->format("M jS")] = $value;
            $i++;
        }

        //converts to collection
        $reviewData = collect($newKeys);

        return $reviewData;


    }
    public function getVote()
    {

    }


    public function render()
    {
        //gets the usercount

        return view('livewire.admin-dashboard');
    }
}
