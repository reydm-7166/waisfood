<x-mail::message>
    Hello World
    {{$link}}
<x-mail::button :url="'{{$link}}'">
    View Recipe
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
