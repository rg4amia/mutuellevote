@extends('layouts.master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Candidat à la présidence</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">User Cards</li>
                        </ol>
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
                        <div class="card-header"><img class="img-fluid" src="{{ asset('images/president'.$candidat->image) }}" alt=""></div>
                        <div class="card-profile"><img class="rounded-circle" src="{{ asset('images/president'.$candidat->image) }}" alt=""></div>
                        <div class="text-center profile-details">
                            <h5>{{$candidat->nom_prenom}}</h5>
                            <h6>Candidat</h6>

                            <a type="buttom" href="{{ route('vote.voter',['id' => $candidat->id ]) }}" class="btn btn-lg btn-secondary">
                                Cliquez ici pour me voter
                            </a>
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
