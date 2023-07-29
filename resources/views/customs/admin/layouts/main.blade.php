<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VOTE AEJ FAMILLE</title>
   {{--  <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    /> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ asset('customs/css/tailwind.output.css') }}" />
   {{--  <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
    ></script> --}}
    <script src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('customs/js/init-alpine.js') }}"></script>
</head>
<body>
        @yield('content')
        <!-- latest jquery-->
        <script src="{{ asset('assets_admin/js/jquery-3.5.1.min.js') }}"></script>
        @yield('script')
</body>
</html>
