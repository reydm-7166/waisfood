
{{-- DITO KAYO START CODE sa view profile [reviews] para sa mga posts nung profile na nakalogged in- --}}

    Review Total: {{count($contents)}}
    @foreach ($contents as $content)
        
        <div class="border border-primary">
            {{$content->id}}<br>
           
            recipe id: {{$content->recipe_id}}<br>
            recipe name: {{$content->recipe_name}}<br>
            post review: {{$content->review}} <br>
            post rating: {{$content->rating}} <br>
            post date: {{$content->created_at}} <br>
            </div>
    @endforeach 
