@component('mail::message')
# Hey!

{{$user->name}} commented on your post.

@component('mail::button', ['url' => 'allier.cf/post/'.$post->id])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
W
