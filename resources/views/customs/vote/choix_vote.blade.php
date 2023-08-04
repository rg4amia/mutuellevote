@extends('customs.admin.layouts.main')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
               <div class="h-32 md:h-auto md:w-1/2">
                 <img
                        aria-hidden="true"
                        class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('images/mudts.png') }}"
                        alt="Office"
                    />
                    <img
                        aria-hidden="true"
                        class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('images/mudts.png') }}"
                        alt="Office"
                    />
                </div>

                <div class="flex items-center justify-center p-2 sm:p-12 md:w-full">
                    <div class="w-full">
                        <div class="px-6 my-6">
                            <a href="{{ route('vote.commisaire') }}"
                               class="flex items-center text-center
                               h-12
                               justify-between px-3 py-3
                               text-sm font-medium leading-5 text-white
                               transition-colors duration-150 bg-sky-600 border
                               border-transparent rounded-lg active:bg-purple-600
                               hover:bg-sky-700 focus:outline-none
                               focus:shadow-outline-purple">
                                PASSER AUX VOTES DE LA PRÉSIDENCE ET DU COMMISSARIAT AUX COMPTES MUDTS
                            </a>
                        </div>
                    </div>
               </div>
                {{--<div class="flex items-center justify-center p-2 sm:p-12 md:w-full">
                    <div class="w-full">
                        <div class="px-6 my-6">
                            <a href="{{ route('vote.index') }}"
                               class="flex items-center text-center
                               h-12
                               justify-between px-3 py-3
                               text-sm font-medium leading-5 text-white
                               transition-colors duration-150 bg-sky-600 border
                               border-transparent rounded-lg active:bg-purple-600
                               hover:bg-sky-700 focus:outline-none
                               focus:shadow-outline-purple">
                                VOTER POUR LES ADJOINTS COMMISSAIRES AU COMPTE
                            </a>
                        </div>
                    </div>
                </div>--}}

            </div>
        </div>
    </div>
@endsection
