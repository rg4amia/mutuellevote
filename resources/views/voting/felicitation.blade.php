@extends('layouts.master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Felicitation !!! , Votre vote a ete pris en compte...</h3>
                    </div>
                    {{--<div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">User Cards</li>
                        </ol>
                    </div>--}}
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('layouts.inc.flash')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 alert-sec">
                    <div class="card bg-img">
                        <div class="card-header">
                            <div class="header-top">
                                <h5 class="m-0" style="color: red;">Felicitation !!!  </h5>
                                <div class="dot-right-icon"><i class="fa fa-ellipsis-h"></i></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="body-bottom" style="color: green;">
                                <h6>Felicitation !!!</h6><span class="font-roboto"> Votre vote a ete pris en compte... </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
