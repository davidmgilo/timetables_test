@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
<a href="{{ $url }}">{{ $url }}</a>
@endcomponent
