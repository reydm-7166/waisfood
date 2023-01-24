<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Taggable;
use App\Models\RecipeLog;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;


class RecipeApprovalController extends Controller
{
    public function index()
    {
        return view('admin.recipe-approval');
    }

    public function confirm_done()
    {
        return redirect()->back()->with('confirm', "This will be marked as reviewed");
    }

    public function approved($id)
    {
        $recipe = Recipe::find($id);
        // if recipe is already mailed (status 3) then ignore this process
        if($recipe->is_approved < 2)
        {

            $recipe->is_approved = 2;
            $recipe->save();

            $logDoesntExist = RecipeLog::where('status', 200)->where('recipe_id', $id)->doesntExist();

            if($logDoesntExist)
            {
                $recipe_logs = RecipeLog::create([
                    'recipe_id' => $id,
                    'user_id' => Auth::user()->id,
                    'admin_name' => Auth::user()->first_name . " " . Auth::user()->last_name,
                    'status' => 200,
                    'action' => 'From pending moved to reviewed status: 200',
                ]);
            }
        }



        return redirect()->route('admin.recipe-appoval');
    }
}
