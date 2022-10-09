@component('mail::message')
# Welcome

Hi {{$user->name}}
<br>
Welcome to laracamp, your account has been created

@component('mail::button', ['url' => url('/login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
