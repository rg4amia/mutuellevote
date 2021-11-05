@component('mail::message')
    # Bonjour {{ $user->nomprenom }},
    VOTRE CODE DE VOTE EST: {{ $code }}
    URL : {{ route('session.showverifcode') }};
    Merci, {{ config('app.name') }}
@endcomponent
