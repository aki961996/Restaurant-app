@component('mail::message')
Hello {{$res->name}},

<p>Your Reservation Now Added</p>


<p>In case you have any issues , please contact us</p>

Thanks,<br>
{{ config('app.name') }}

@endcomponent