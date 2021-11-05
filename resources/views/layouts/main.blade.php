<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Digitalisation Convention</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/horizontal-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/horizontal-layout-light/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libraries/alert/css/prompt.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/icon-convention-contrat.png') }}" />
    {{-- yield style js--}}
        @yield('css')
    {{-- yield style js--}}
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_horizontal-navbar.html -->
@include('layouts.header')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                @include('layouts.inc.message')
                @include('layouts.inc.flash')
                @include('layouts.inc.flash_admin')
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
        @include('layouts.footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/libraries/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/libraries/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libraries/moment.min.js') }}"></script>
<script src="{{ asset('assets/libraries/alert/js/prompt.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validation.js') }}"></script>

<!-- endinject -->

    {{-- yield script js--}}
        @yield('js')
    {{-- yield script js--}}
<!-- plugin js for this page -->
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>

</html>
