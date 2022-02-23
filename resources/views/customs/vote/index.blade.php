@extends('customs.admin.layouts.main')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div
            class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
        >
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img
                        aria-hidden="true"
                        class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('assets/images/maaej.jpeg') }}"
                        alt="Office"
                    />
                    <img
                        aria-hidden="true"
                        class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('assets/images/maaej.jpeg') }}"
                        alt="Office"
                    />
                </div>

                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
                            Obtenez un code ici.
                        </h1>
                        <p class="text-xl text-center text-orange-500">Entrez votre email et votre telephone pour obtenir</p>
                        <hr class="my-8" />
                        @include('layouts.inc.flash')
                        <form  method="POST" class="theme-form" action="{{ route('session.generatecode') }}">
                            @csrf()
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input required="" name="email"
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                    @error('email') border-red-600 @enderror  rounded py-3 px-4 mb-2"
                                    placeholder="Jane Doe"
                                />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Telephone</span>
                                <input name="telephone"
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                    @error('telephone') border-red-600 @enderror  rounded py-3 px-4 mb-2"
                                    placeholder="0101010101"
                                    type="text"
                                />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5
                            text-center text-white transition-colors duration-150 bg-cyan-600 border
                            border-transparent rounded-lg active:bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:shadow-outline-purple">
                                Verifier & Obtenir un code ici
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
