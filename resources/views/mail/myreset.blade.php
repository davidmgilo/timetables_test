@component('mail::message')
# Reset Password

Hello,

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@component('mail::subcopy')
If you’re having trouble clicking the Reset Password button, copy and paste the URL below
into your web browser: <a href="{{ $url }}">{{ $url }}</a>
@endcomponent
@endcomponent
