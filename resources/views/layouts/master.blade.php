<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>
      <!-- Embed CSS -->
    <link rel="stylesheet" href="{{ asset('common/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/sweetalert2.min.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('js/style.css') }}">
    @yield('css')
</head>
<body>
    <h3 class="text-center">{{ config('app.name') }} </h3>
    <div class="container">
        @if(session('alert'))
            <div class="alert alert-{{ session('alert')['type'] }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ session('alert')['title'] }}</strong> {{session('alert')['content']}}
            </div>
        @endif
    
        @yield('content')
    </div>
    <!-- Embed Scripts -->
    <script src="{{ asset('common/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('common/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('common/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('common/js/sweetalert2.min.js') }}"></script>
    {{-- custom js --}}
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('js')
</body>
</html>