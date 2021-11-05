<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets_admin/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets_admin/images/favicon.png') }}" type="image/x-icon">
    <title>Ma AEJ Vote en ligne</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets_admin/css/font-awesome.css") }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets_admin/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/responsive.css') }}">
</head>
<body>
<!-- login page start-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/maaej.jpeg') }}" alt="looginpage"></div>
        <div class="col-xl-7 p-0">
            <div class="login-card">
                <div>
                    <div><a class="logo text-start" href="index.html">
                            <img class="for-light" src="{{ asset('assets/images/maaej.jpeg') }}" height="100" alt="looginpage">
                            <img class="for-dark" src="{{ asset('assets/images/maaej.jpeg') }}" height="100" alt="looginpage"></a></div>
                    <div class="login-main">

                        <form  method="POST" class="theme-form" action="{{ route('session.verifcode') }}">
                            @csrf()
                            <h4>Verifier code ici</h4>
                            <p>Renseignez le code recu par mail ici</p>
                            @include('layouts.inc.flash')
                            @include('layouts.inc.message')
                            <div class="form-group">
                                <label class="col-form-label">Code Generer</label>
                                <input class="form-control" type="text" name="codegene" required="" placeholder="Code Generer">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block w-100" type="submit">Verifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets_admin/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets_admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets_admin/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets_admin/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets_admin/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</div>
</body>
</html>
