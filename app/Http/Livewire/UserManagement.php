<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Taggable;
use App\Models\Recipe;
use App\Models\Feedback;

class UserManagement extends Component
{

    public $selectedOption;
    public $options = ['Content Moderator', 'Recipe Maker', 'Critic', 'Star'];

    protected $listeners = ['addBadge', 'badgePrompt', '$refresh'];
    public $badge;
    public $user_id;
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
    public function refresh()
    {
        $this->emit('refresh');
    }

    public function badgePrompt($user_id, $value)
    {
        $this->user_id = $user_id;
        $this->badge = $value;
        $this->dispatchBrowserEvent('badge-confirm');
    }
    public function addBadge()
    {
        $user = User::find($this->user_id);

        $user->badge = $this->badge;

        $user->save();
    }
    public function dialogPopup($user_id)
    {

        $this->dispatchBrowserEvent('confirm-badge');
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

            $users[$key]->recipes_posted =  Recipe::where('author_id', $value->id)->where('is_approved', 0)->withoutTrashed()->count();

            $users[$key]->recipes_approved = Recipe::where('author_id', $value->id)->where('is_approved', 1)->withoutTrashed()->count();

            $users[$key]->reviews_published = Feedback::where('user_id', $value->id)->count();

            $users[$key]->recipe_posts = Recipe::where('author_id', $value->id)->where('is_approved', '!=', 1)->withoutTrashed()->pluck('id');
            foreach($users[$key]->recipe_posts as $keyyy => $value)
            {
                $users[$key]->vote_count = Like::where('recipe_id', $value)->sum('like');
            }
        }


        // dd($users);

        $new_users = $users;
        //dd($new_users);
        return view('livewire.user-management',[
            'all_users' => $new_users
        ]);
    }
}
