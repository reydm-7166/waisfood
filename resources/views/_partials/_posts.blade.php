
{{-- ETO NAKA FOREACH PARA IDISPLAY LAHAT NG POST
      #POSTS IS UNG MAIN CONTAINER NG BAWAT ISANG POST
        ->AUTHOR INFORMATION
        ->POST CONTENT
        -> SHARE/SAVE/COMMENT BUTTONS
   --}}
@foreach($newsfeed_posts as $posts)

<div id="posts" class="rounded shadow p-3 ps-4 pb-4 mb-2">
  <div id="votes_container" class="d-inline-block align-top text-center">
    <div id="vote_buttons" class="">
      <p class="font fw-bold">Up</p> 
      <p class="font"></p>
      <p class="font fw-bold">Down</p>
    </div>
     
  </div>

  {{-- 
      ETO UNG MISMONG POST BOX.. 
        -> AUTHOR IMAGE AND NAME
        -> OPTIONS DROPDOWN 
  --}}

  <div id="posts_container" class="d-inline-block">
    <div id="post_author_info" class="d-flex me-3">
        <div id="author_image" class="pe-2">
            <img src="/img/profile_picture.jpg" alt="aa" class="border rounded-circle border-0" id="profile_picture">
        </div>
        <div id="author_information" class="pt-1 ps-2">
            <small class="font fw-bold d-block fs-6"><a href="{{ route('profile.index', $posts->user_id) }}" class="text-dark">{{$posts->first_name}} {{$posts->last_name}}</small></a>
            <small class="font fw-light">2h ago</small>
        </div>
        <div id="author_options" class="ms-auto d-flex align-items-center flex-row-reverse">
            <div class="btn-group" id="dropdown_options">
              
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Hide</a></li>
                  <li><a class="dropdown-item" href="#">Save</a></li>
                  @if ($user_data['id'] == $posts->user_id)
                    <li><button class='dropdown-item' name="edit_post" id="edit_post" data-bs-toggle="modal" data-bs-target="#edit_post_modal" value="{{$posts->id}}">Edit</button></li>
                  @endif

                  <li><a class="dropdown-item" href="#">Report</a></li>

                </ul>
              </div>
        </div>
    </div>

    {{-- ETO UNG CONTENT NUNG POST --}}

    <div id="post_content" class="text-break p-2 me-3">
        <p>{{ $posts->post_content }}</p>
    </div>

    {{-- ETO UNG BUTTONS --}}
    
    <div id="comment_share_button" class="p-2">
      share
      comment
      save
    </div>
  </div>
</div>

@endforeach