@component('mail::message')
# Welcome to INSTABLAM

BLAM and the image is INSTAgone.

@component('mail::button', ['url' => ''])
BLAM! it
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
