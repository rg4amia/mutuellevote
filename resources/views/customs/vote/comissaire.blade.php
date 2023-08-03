@extends('customs.admin.layouts.main')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-1xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <form action="{{ route('vote.fullcommissaire') }}" method="POST">
                @csrf()

                <h2 class="my-6 text-2xl text-center font-semibold text-green-700 dark:text-green-200 bg-green-100">
                    LES CANDIDATS DE LA PRÉSIDENCE DE LA MUDTS
                </h2>
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
                                <div class="flex items-center mb-6 ml-3">
                                    <div class="flex items-center h-5">
                                        <input id="vote_commissaire_adjoint" value="{{ $candidat->id }}" name="vote_commissaire_adjoint"
                                            aria-describedby="vote_commissaire_adjoint" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300
                                                                   focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600
                                                                   dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="uppercase font-medium text-cyan-500 dark:text-gray-300">
                                            Cochez ici pour choisir
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h2 class="my-6 text-2xl text-center font-semibold text-green-700 dark:text-green-200 bg-green-100">
                    LES CANDIDATS AU COMMISSARIAT AUX COMPTES DE LA MUDTS
                </h2>
                <div class="flex flex-col md:px-40 overflow-y-auto md:flex-row">
                    @foreach($commissaires as $commissaire)
                        <div class="flex text-center justify-center sm:p-12">
                            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                <img src="{{ asset('images/commissaire/'.$commissaire->image) }}" class="w-full">
                                <div class="text-center">
                                    {{--<h1 class="text-1xl">{{$commissaire->nom_prenom}}</h1>--}}
                                    <h2 class="my-6 text-base overflow-x-auto font-semibold text-gray-700 dark:text-gray-200">
                                        {{$commissaire->nom_prenom}}
                                    </h2>
                                    <div class="flex items-center mb-6 ml-3">
                                        <div class="flex items-center h-5">
                                            <input id="vote_commissaire"  name="vote_commissaire" value="{{ $commissaire->id }}"
                                                   aria-describedby="vote_commissaire" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300
                                                   focus:ring-3 focus:ring-blue-300 dark:bg-gray-700
                                                   dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="remember" class="uppercase text-cyan-500 font-medium dark:text-gray-300">
                                                Cochez ici pour choisir
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr class="my-8" />

                <div class="flex items-center mb-6 px-10 md:px-40">
                    <button type="submit"
                       class="text-center h-12 py-3 px-3 w-25
                          text-sm font-medium leading-5 text-white
                          transition-colors duration-150 bg-orange-600 border
                           border-transparent rounded-lg active:bg-orange-600
                           hover:bg-orange-700 focus:outline-none
                           uppercase focus:shadow-outline-purple">
                        Cliquez ici pour me voter
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
