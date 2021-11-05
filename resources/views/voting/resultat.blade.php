@extends('layouts.master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Vote provisoire</h3>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.inc.flash')
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                @foreach($candidats as $candidat)
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img src="{{ asset('images/president/'.$candidat->image) }}" alt=""></div>
                        <div class="card-profile"><img class="rounded-circle" src="{{ asset('images/president/'.$candidat->image) }}" alt=""></div>
                        <div class="text-center profile-details">
                            <h5>{{$candidat->nom_prenom}}</h5>
                            <h6>Candidat</h6>
                        <br>
                        </div>
                        <div class="card-footer row">
                            <div class="col-10 col-sm-4">
                                <h6>Vote</h6>
                                <h5 class="counter">{{ $candidat->vote }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div></div>
        <!-- Container-fluid Ends-->
    @stop
