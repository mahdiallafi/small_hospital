@component('mail::message')

# {{ $data['name'] }} has just sent an email from Portfolio Website

<strong> Name </strong> - {{ $data['app_date'] }}

<strong> Sender's email </strong> - {{ $data['app_time'] }}

<strong> Message :</strong>

@component('mail::panel')
    <p style="border: 10px;">{{ $data['Fre_places'] }}</p>
@endcomponent

@endcomponent

