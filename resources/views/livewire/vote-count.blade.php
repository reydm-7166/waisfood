<div class="mr-[20px] flex items-center gap-3 font-bold">
    <div class="flex gap-3 items-center">
        <button>
            @auth
                <i class="fa-solid fa-up-long text-4xl 
                @if ($vote_status == "upvote")
                    text-[#f6941c]
                @endif
                 " 
                id="upvote"wire:click="upvote({{ Auth::user()->id }})"></i>
            @endauth

            @guest
                <i class="fa-solid fa-up-long text-4xl" id="upvote" wire:click="login_prompt"></i>
            @endguest 
        </button>
    </div>

        <p class="text-xl">{{$voteCount}}</p>

    <div class="flex gap-3 items-center">

        <button>
            @auth
            <i class="fa-solid fa-down-long text-4xl
            @if ($vote_status == "downvote")
                text-[red]
            @endif
            " id="downvote" wire:click="downvote({{ Auth::user()->id }})"></i>
            @endauth 

            @guest
                <i class="fa-solid fa-down-long text-4xl" id="downvote" wire:click="login_prompt"></i>
            @endguest

       </button>

    </div>

</div>