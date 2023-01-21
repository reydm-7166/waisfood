<x-mail::message>

@component('vendor.mail.html.button')
    <a href="{{$link}}" style="color: white; text-decoration: none; padding: .5rem; font-size: 16px;">View Recipe</a>
@endcomponent


Thanks, {{ config('app.name') }} Admins.
</x-mail::message>
