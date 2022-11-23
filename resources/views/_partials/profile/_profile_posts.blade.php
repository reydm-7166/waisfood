
{{-- DITO KAYO START CODE sa view profile [posts] para sa mga posts nung profile na nakalogged in- --}}
Post Total: {{count($contents)}}
@foreach ($contents as $content)
    <div class="border border-primary">
        {{$content->id}}<br>
    post title: {{$content->post_title}} <br>
    post content: {{$content->post_content}} <br>
    post date: {{$content->created_at}} <br>
    post votes: {{$content->likes_count}}
    </div>
@endforeach