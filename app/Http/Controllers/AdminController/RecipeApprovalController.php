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
        $recipe->is_approved = 2;

        $recipe->save();

        $recipe_logs = RecipeLog::create([
            'recipe_id' => $id,
            'user_id' => Auth::user()->id,
            'admin_name' => Auth::user()->first_name . " " . Auth::user()->last_name,
            'action' => 'From pending moved to reviewed status: 200',
        ]);

        return redirect()->route('admin.recipe-appoval');
    }
}
