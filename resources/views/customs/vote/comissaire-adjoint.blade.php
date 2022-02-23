@extends('customs.admin.layouts.main')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <h2 class="my-6 text-2xl text-center font-semibold text-green-700 dark:text-green-200 bg-green-100">
                LES CANDIDATS AU COMMISSARIAT-ADJOINT AU COMPTE
            </h2>
            <div class="flex flex-col overflow-y-auto md:flex-row">
                @foreach($candidats as $candidat)
                    <div class="flex items-center justify-center sm:p-12 md:w-1/2">
                        <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                            <img src="{{ asset('images/commissaire/'.$candidat->image) }}" class="w-full">
                            <div class="text-center">
                                {{--<h1 class="text-1xl">{{$commissaire->nom_prenom}}</h1>--}}
                                <h2 class="my-6 text-base overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">
                                    {{$candidat->nom_prenom}}
                                </h2>
                                <p class="font-sans font-light text-grey-100 mb-6">
                                    <a type="buttom" href="{{ route('vote.votecommissaire',['id' => $candidat->id ]) }}"
                                       class="text-center
                                               h-12 py-3 px-3
                                               text-sm font-medium leading-5 text-white
                                               transition-colors duration-150 bg-orange-600 border
                                               border-transparent rounded-lg active:bg-orange-600
                                               hover:bg-orange-700 focus:outline-none
                                               uppercase
                                               focus:shadow-outline-purple">
                                        Cliquez ici pour me voter
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
