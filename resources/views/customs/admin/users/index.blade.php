@extends('customs.layouts.main')
@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Recherche
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="GET" class="theme-form" action="{{ route('admin.user.index') }}">
                @csrf()
                <input type="hidden" name="_token" value="9jwyWeFYLfVH4TJuCzmF8c3kKq8Am0C5MzEv9zQB">
                <div class="-mx-3 md:flex mb-3">
                    <div class="md:w-1/2 px-3 mb-3 md:mb-0 mt-6">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="nom">
                            Nom &amp; Prenom:
                        </label>
                        <input value="{{ old('prenom') }}" name="nomprenom" class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                          rounded py-3 px-4 mb-2" id="nom" type="text" placeholder="Jane">

                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="prenom">
                            Matricule:
                        </label>
                        <input value="{{ old('matricule') }}" name="matricule" class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                         rounded py-3 px-4 mb-1" id="prenom" type="text" placeholder="Doe">
                    </div>

                    <div class="md:w-1/2 px-3 mb-3 md:mb-0 mt-6">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="nom">
                            Email:
                        </label>
                        <input value="{{ old('email') }}" name="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                          rounded py-3 px-4 mb-2" id="nom" type="text" placeholder="Jane">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="prenom">
                            Telephone:
                        </label>
                        <input value="{{ old('telephone') }}" name="telephone" class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                        rounded py-3 px-4 mb-1" id="prenom" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-3">
                    <div class="md:w-1/2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="paysnaissance">
                            Filtre Email:
                        </label>
                        <select name="filtreemail" class="appearance-none block w-full bg-white
                            text-grey-darker border @error('filtreemail') border-red-600 @enderror rounded py-3 px-4 mb-1">
                            <option value="">{{ __("-- Selectionner Filtre --") }}</option>
                            <option value="0">{{ __("PAS DE MAIL") }}</option>
                            <option value="1">{{ __("MAIL COMPLET") }}</option>
                        </select>
                        @error('filtreemail')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="paysnaissance">
                            Filtre Telephone:
                        </label>
                        <select name="filtretelephone" class="appearance-none block w-full bg-white
                            text-grey-darker border @error('filtretelephone') border-red-600 @enderror rounded py-3 px-4 mb-1">
                            <option value="">{{ __("-- Selectionner Filtre --") }}</option>
                            <option value="0">{{ __("NUMERO INCOMPLET") }}</option>
                            <option value="1">{{ __("NUMERO COMPLET") }}</option>
                        </select>
                        @error('filtretelephone')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5
                            text-center text-white transition-colors duration-150 bg-cyan-600 border
                            border-transparent rounded-lg active:bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:shadow-outline-purple">
                    Recherche
                </button>
            </form>
        </div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 uppercase">
            Liste des votants
        </h2>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nom & Prenom</th>
                       {{--  <th class="px-4 py-3">Matricule</th> --}}
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Telephone</th>
                        <th class="px-4 py-3">Code Generer</th>
                        <th class="px-4 py-3">Status Vote</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">{{ $user->nomprenom ? $user->nomprenom : $user->name }}</p>
                                </div>
                            </div>
                        </td>
                       {{--  <td class="px-4 py-3 text-sm">
                            <p class="font-semibold">{{ $user->matricule }}</p>
                        </td> --}}
                        <td class="px-4 py-3 text-xs">
                            @if($user->email)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                  {{ $user->email }}
                                </span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                      {{ __('Pas de e-mail') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{--@php
                            dd(strlen($user->telephone))
                            @endphp--}}
                            @if(strlen($user->telephone) == 10)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                  {{ $user->telephone }}
                                </span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                  {{ $user->telephone }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if(!$user->codegene)
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                      {{ __('Pas encore generer') }}
                                </span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                  {{ $user->codegene }}
                                </span>
                            @endif

                        </td>
                            <td class="px-4 py-3 text-sm">
                                @if($user->status != 1 || $user->status != 1  )
                                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                      {{ __('Pas encore vote') }}
                                </span>
                                @else
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                  {{ __('À vote') }}
                                </span>
                                @endif

                            </td>
                        <td>
                            <a id="dropdownButton" href="{{ route('admin.user.edit',$user->id) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Modifier
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
