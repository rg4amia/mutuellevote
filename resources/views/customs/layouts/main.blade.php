<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"/>

    {{--<link rel="stylesheet" href="{{ asset('customs/css/tailwind.output.css') }}" />--}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('customs/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
    <script src="{{ asset('customs/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('customs/js/charts-pie.js') }}" defer></script>
</head>
<body>
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('customs.layouts.sidebar')
    <div class="flex flex-col flex-1 w-full">
       @include('customs.layouts.header')
        <main class="h-full overflow-y-auto">
            @include('layouts.inc.flash')
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
