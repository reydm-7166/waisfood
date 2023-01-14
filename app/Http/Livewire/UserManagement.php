<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Taggable;
use App\Models\Recipe;

class UserManagement extends Component
{


    public $pending_admin = false;

    public $users = true;

    public $admin = false;

    public function show_users()
    {
        $this->users = true;
        $this->admin = false;
    }
    public function show_admins()
    {
        $this->users = false;
        $this->admin = true;
    }

    public function approve_admin($user_id)
    {
        $users = User::find($user_id);
        $users->role_as = 1;
        $users->save();

        $this->dispatchBrowserEvent('admin-approved');
    }


    public function render()
    {
        $users = new User;
        if($this->admin)
        {
            $users = $users->where('role_as', 2);
        }
        if($this->users)
        {
            $users = $users->where('role_as', 0);
        }

        $users = $users->paginate(12);

        foreach($users as $key => $value)
        {
            $users[$key]->recipes_posted =  Recipe::where('author_id', $value->id)->where('is_approved', 0)->count();

            $users[$key]->recipes_approved = Recipe::where('author_id', $value->id)->where('is_approved', 1)->count();
        }


        $new_users = $users;
        //dd($new_users);
        return view('livewire.user-management',[
            'all_users' => $new_users
        ]);
    }
}
