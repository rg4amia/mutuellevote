@extends('customs.admin.layouts.main')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-3xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <h2 class="my-6 text-2xl text-center font-semibold text-green-700 dark:text-green-200 bg-green-100">
                    LES CANDIDATS AU COMMISSARIAT AU COMPTE
                </h2>
                <div class="flex flex-col md:px-40 overflow-y-auto md:flex-row">
                    <h3 class="my-6 text-2xl overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">
                        Total Votant: {{ \App\Models\UserCandidatComissaireCompte::count() }}
                    </h3>
                </div>
                <div class="flex flex-col md:px-40 overflow-y-auto md:flex-row">
                    @foreach($commissaires as $commissaire)
                        <div class="flex text-center justify-center sm:p-12">
                            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                <img src="{{ asset('images/commissaire/'.$commissaire->image) }}" class="w-full">
                                <div class="text-center">
                                    {{--<h1 class="text-1xl">{{$commissaire->nom_prenom}}</h1>--}}
                                    <h2 class="my-6 text-base overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $commissaire->nom_prenom }}
                                    </h2>
                                    <h3 class="my-6 text-base overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">Vote provisoire</h3>
                                    <h5 class="my-6 text-3xl overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">{{ $commissaire->vote }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h2 class="my-6 text-2xl text-center font-semibold text-green-700 dark:text-green-200 bg-green-100">
                    LES CANDIDATS AU COMMISSARIAT-ADJOINT AU COMPTE
                </h2>
                <div class="flex flex-col md:px-40 overflow-y-auto md:flex-row">
                    <h3 class="my-6 text-2xl overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">
                        Total Votant: {{ \App\Models\UserCandidatPresidentielle::count() }}
                    </h3>
                </div>
                <div class="flex flex-col md:px-40 overflow-y-auto md:flex-row">
                    @foreach($candidats as $candidat)
                        <div class="flex text-center justify-center sm:p-12">
                            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                <img src="{{ asset('images/commissaire/'.$candidat->image) }}" class="w-full">
                                <div class="text-center">
                                    {{--<h1 class="text-1xl">{{$commissaire->nom_prenom}}</h1>--}}
                                    <h2 class="my-6 text-base overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">
                                        {{$candidat->nom_prenom}}
                                    </h2>
                                    <h3 class="my-6 text-base overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">Vote provisoire</h3>
                                    <h5 class="my-6 text-3xl overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">{{ $candidat->vote }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var time = new Date().getTime();
        $(document.body).bind("mousemove keypress", function(e) {
            time = new Date().getTime();
        });

        function refresh() {
            if(new Date().getTime() - time >= 60000)
                window.location.reload(true);
            else
                setTimeout(refresh, 100);
        }

        setTimeout(refresh, 100);
    </script>
@stop
