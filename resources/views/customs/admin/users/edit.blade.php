@extends('customs.layouts.main')
@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Modifier le votant
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form  method="POST" class="theme-form" action="{{ route('admin.user.update',$user->id) }}">
                @csrf()
                <div class="-mx-3 md:flex mb-3">
                    <div class="md:w-1/2 px-3 mb-3 md:mb-0 mt-6">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="nom">
                            Nom & Prenom:
                        </label>
                        {{-- <div wire:ignore> --}}
                        <input name="nomprenom" value="{{ $user->nomprenom }}" @keyup="nomUpperCase = $event.target.value.toUpperCase()"
                               :value="nomUpperCase"
                               class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                        @error('nom') border-red-600 @enderror  rounded py-3 px-4 mb-2"
                               id="nom" type="text" placeholder="Jane">
                        {{-- </div> --}}
                        @error('nom')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="prenom">
                            Matricule:
                        </label>
                        {{-- <div wire:ignore> --}}
                        <input name="matricule" value="{{ $user->matricule }}"
                               @keyup="prenomUpperCase = $event.target.value.toUpperCase()"
                               :value="prenomUpperCase"
                               class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                        @error('prenom') border-red-600 @enderror rounded py-3 px-4 mb-1"
                               id="prenom" type="text" placeholder="Doe">
                        {{-- </div> --}}
                        @error('prenom')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:w-1/2 px-3 mb-3 md:mb-0 mt-6">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="nom">
                            Email:
                        </label>
                        {{-- <div wire:ignore> --}}
                        <input name="email" value="{{ $user->email }}" @keyup="nomUpperCase = $event.target.value.toUpperCase()"
                               :value="nomUpperCase"
                               class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                        @error('nom') border-red-600 @enderror  rounded py-3 px-4 mb-2"
                               id="nom" type="text" placeholder="Jane">
                        {{-- </div> --}}
                        @error('nom')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="prenom">
                            Telephone:
                        </label>
                        {{-- <div wire:ignore> --}}
                        <input name="telephone" value="{{ $user->telephone }}"
                            @keyup="prenomUpperCase = $event.target.value.toUpperCase()"
                            :value="prenomUpperCase"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                        @error('prenom') border-red-600 @enderror rounded py-3 px-4 mb-1"
                            id="prenom" type="text" placeholder="Doe">
                        {{-- </div> --}}
                        @error('prenom')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3 mb-3 md:mb-0 mt-6">
                        <label class="block uppercase tracking-wide text-zinc-500 text-xs font-bold mb-2" for="nom">
                            CODE:
                        </label>
                        {{-- <div wire:ignore> --}}
                        <input name="codegene" value="{{ $user->codegene }}" @keyup="nomUpperCase = $event.target.value.toUpperCase()"
                               :value="nomUpperCase"
                               class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                        @error('codegene') border-red-600 @enderror  rounded py-3 px-4 mb-2"
                               id="nom" type="text" placeholder="Jane">
                        {{-- </div> --}}
                        @error('codegene')
                        <p class="text-red-600 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5
                            text-center text-white transition-colors duration-150 bg-cyan-600 border
                            border-transparent rounded-lg active:bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:shadow-outline-purple">
                    Modifier
                </button>
            </form>
        </div>
    </div>

@endsection
