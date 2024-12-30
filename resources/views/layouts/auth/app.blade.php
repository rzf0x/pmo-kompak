<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Form Register' }}</title>
    <link rel="shortcut icon" href="{{ asset('logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" crossorigin href="{{ asset('dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('dist/assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                {{ $slot }}
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <img src="{{ asset('bg-auth.jpg') }}" class="w-100 h-100" alt="">
            </div>
        </div>

    </div>
</body>

</html>
