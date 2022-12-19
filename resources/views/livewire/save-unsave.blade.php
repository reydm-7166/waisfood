<div class="inline-block">

    <button>
        @auth
            @if ($saved_status == true)
                <i class="ms-3 text-3xl fa-solid fa-bookmark text-[#f6941c]" wire:click="save_unsave({{ Auth::user()->id }})"></i>
            @else
                <i class="ms-3 text-3xl fa-regular fa-bookmark" wire:click="save_unsave({{ Auth::user()->id }})"></i>
            @endif
            
        @endauth

        @guest
            <i class="ms-3 text-3xl fa-regular fa-bookmark" wire:click="login_prompt"></i>
        @endguest
        
    </button>

</div>