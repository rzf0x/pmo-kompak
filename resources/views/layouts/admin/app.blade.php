<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    {{-- Custom Favicon --}}
    <link rel="shortcut icon" href="{{ asset('logo.jpg') }}" type="image/x-icon">

    {{-- Style Default Mazer Template --}}
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
    {{-- #Style Default Mazer Template --}}
    @livewireStyles
</head>

<body>
    {{-- <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script> --}}
    <div id="app">
        <div id="sidebar">

            {{-- Sidebar Partials --}}
            @if (auth()->user()->role_id == 1)
                @include('layouts.partials.superadmin.sidebar')
            @elseif (auth()->user()->role_id == 2)
                @include('layouts.partials.admin.sidebar')
            @else
                @include('layouts.partials.staff.sidebar')
            @endif
            {{-- #Sidebar Partials --}}

        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="flex-row d-flex justify-content-between">
                <h3 class="mb-3">{{ $title }}</h3>
                @yield('cta-button')
            </div>

            {{-- Content --}}
            {{ $slot }}
            {{-- #Content --}}

            {{-- Livewire script --}}
            @livewireScripts
            {{-- #Livewire script --}}

            {{-- Footer Partials --}}
            {{-- @include('layouts.admin.partials.footer') --}}
            {{-- #Footer Partials --}}

        </div>
    </div>

    <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    {{-- Javascript script mazer default --}}
    <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>
    {{-- Javascript script mazer default --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
