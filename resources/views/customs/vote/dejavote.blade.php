@extends('customs.admin.layouts.main')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                    @forelse(['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has($msg) )
                            <div class="flex items-center justify-center sm:p-12 md:w-2/2">
                                <h2 class="my-6 text-2xl text-center font-semibold text-red-700 dark:text-red-200 bg-red-400">
                                    {{ Session::get($msg) }}
                                </h2>
                            </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
@endsection
