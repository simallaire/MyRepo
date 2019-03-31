@component('mail::message')
# Hey!

Someone wrote a new post.

@component('mail::button', ['url' => ''])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
