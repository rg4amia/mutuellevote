@component('mail::message')
    # Bonjour {{ $user->nomprenom }},

    VOTRE CODE DE VOTE EST: {{ $code }}

    Merci, {{ config('app.name') }}
@endcomponent
