
{{-- 
      ETO NAKA FOREACH PARA IDISPLAY LAHAT NG POST
        #POSTS IS UNG MAIN CONTAINER NG BAWAT ISANG POST
          ->AUTHOR INFORMATION
          ->POST CONTENT
          -> SHARE/SAVE/COMMENT BUTTONS
--}}

 {{-- 
      MAG SHOSHOW TO KAPAG WALA PANG POST NA NAKAPUBLISH//SA DB
  --}}
  @if(!$newsfeed_posts)
    <h1 class="ms-auto">NO POST YET</h1>
  @endif
{{-- {{dd($newsfeed_posts[0]->saved_or_not)}} --}}
@foreach($newsfeed_posts as $posts)

            {{-------------  -> ETO UNG CONTAINER ----------- --}}
<div id="posts" class="rounded shadow p-3 ps-4 pb-4 mb-2">

  {{-- 
      ETO UNG MISMONG POST BOX.. 
        -> AUTHOR IMAGE AND NAME
        -> OPTIONS DROPDOWN 
  --}}

  <div id="posts_container" class="d-inline-block">
    {{------------- -> AUTHOR IMAGE ----------- --}}
    <div id="post_author_info" class="d-flex me-3">
        <div id="author_image" class="pe-2">
            <img src="/img/profile_picture.jpg" alt="aa" class="border rounded-circle border-0" id="profile_picture"> 
        </div>
            {{-------------  -> AUTHOR NAME ----------- --}}
        <div id="author_information" class=" ms-1 pt-1 ps-2">
            <small class="font fw-bold d-block fs-6"><a href="{{ route('profile.index', $posts->user_id) }}" class="text-dark">{{$posts->first_name}} {{$posts->last_name}}</small></a>
            <small class="font fw-light">2h ago</small>
        </div>
                    {{-------------  -> OPTIONS DROPDOWN ----------- --}}
        <div id="author_options" class="ms-auto d-flex align-items-center flex-row-reverse">
            <div class="btn-group" id="dropdown_options">
              
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Hide</a></li>

                  @if (isset($posts->saved))
                    <li><a class="dropdown-item save" id="save_post_outside_{{$posts->id}}" href="{{ route('save.post', $posts->id) }}">Unsave Post</a></li>
                  @else
                    <li><a class="dropdown-item save" id="save_post_outside_{{$posts->id}}" href="{{ route('save.post', $posts->id) }}">Save Post</a></li>
                  @endif
                              {{-------------  
                                  -> IF SA KANYA UNG POST LALABAS UNG EDIT BUTTON ELSE BLANK//IGNORE.
                                ----------- --}}
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
          <p id="post_text">{{ $posts->post_content }}</p>
          <div id="comment_share_button" class="p-2 mt-3">
            
            <p class="btn btn-primary font shadow ps-4 pe-3 pt-2 pb-2 fs-6"><a class="text-decoration-none text-light" id="view_post" href="{{ route('post.view', $posts->unique_id) }}">READ MORE<i class="ms-2 fs-5 align-center fa-solid fa-circle-info"></a></i></p>
          </div>
      </div>

    {{-- ETO UNG BUTTONS --}}
    
    
  </div>
</div>

@endforeach