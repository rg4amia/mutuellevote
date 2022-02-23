@extends('customs.layouts.main')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Importation Data
        </h2>
        <form class="form theme-form" action="{{ route('admin.import_in') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Import User</button>
        </form>
    </div>
@stop
