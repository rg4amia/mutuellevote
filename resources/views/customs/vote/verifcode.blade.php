@extends('customs.admin.layouts.main')

@section('style')
<style>
    .loading {
        position: relative;
    }

    .loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin: -10px 0 0 -10px;
        border-radius: 50%;
        border: 2px solid #ccc;
        border-top-color: #333;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {transform: rotate(360deg);}
    }

    .loading::before {
        content: 'Chargement...';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    /* .loading {
        position: relative;
    }

    .loading::after {
        content: 'Chargement...';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    } */
</style>
@endsection
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

                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
                            Verifier code ici
                        </h1>
                        <p class="text-xl text-center text-orange-500">Renseignez le code recu par SMS ici</p>
                        <hr class="my-8" />
                        @include('layouts.inc.flash')
                        @include('layouts.inc.message')
                        <form  method="POST" class="theme-form" action="{{ route('session.verifcode') }}">
                            @csrf()
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 mb-3">Code Generer</span>
                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border
                                    @error('codegene') border-red-600 @enderror  rounded py-3 px-4 mb-2"
                                       name="codegene" required="" placeholder="Code Generer"
                                />
                            </label>
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm
                            font-medium leading-5 text-center text-white transition-colors
                            duration-150 bg-cyan-600 border border-transparent rounded-lg active:bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:shadow-outline-purple">
                                Verifier
                            </button>
                        </form>
                        {{-- <button type="button" id="regenerate_sms"
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors
                                   duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700
                                focus:outline-none focus:shadow-outline-purple">
                           J'ai pas recu de SMS / Régenerer le code
                        </button> --}}
                        <button id="regenerate_sms"
                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors
                                   duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700
                                focus:outline-none focus:shadow-outline-purple">
                            J'ai pas recu de SMS / Régenerer le code
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // Référence au bouton
        const $button = $('#regenerate_sms');
        // Requête AJAX au clic
        $button.on('click', function() {

            var url = "{{ route('session.regeneratecode') }}";
            $button.html("  ");
            $button.addClass('loading');
            axios.post(url).then(response => {
               // isLoading = false;
                $button.removeClass('loading');
                $button.html("J'ai pas recu de SMS / Régenerer le code")
            }).catch(error => {
                //isLoading = false;
                $button.removeClass('loading');
                $button.html("J'ai pas recu de SMS / Régenerer le code")
            })
        });
    </script>
@endsection
