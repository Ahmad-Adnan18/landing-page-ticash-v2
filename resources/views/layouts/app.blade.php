<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ticash</title>

    <meta name="description" content="Tingkatkan efisiensi, transparansi, dan profitabilitas pesantren Anda dengan sistem transaksi digital ticash. Model wakaf, rendah biaya.">
    <meta name="keywords" content="ticash, pesantren, cashless, digital payment, wakaf, sistem keuangan pesantren">

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">

    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

</head>
<body data-spy="scroll" data-target=".fixed-top">

    @yield('content')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>

    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')
</body>
</html>
