    {{-- ETO CONTAINER LANG FOR CREATING POSTS (IREREMOVE TO AT ILIPAT NG PWESTO) --}}
    
<div id="newsfeed_container" class="p-3 pt-1">
    
    {{-- @if($user_data['id'] == $newsfeed_posts[0]->user_id)
       
    @endif --}}
    @include('_partials._create_post')
    {{-- CONTAINER SYA FOR NEWSFEED POSTS. LAHAT NG LAMAN NG POSTS DITO NAKALAGAY --}}
    <div id="newsfeed_posts_container" class="rounded">

        @include('_partials._posts')

    </div>
</div>