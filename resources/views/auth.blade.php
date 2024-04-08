<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | {{ $page }}</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <!-- Section: Design Block -->
    <div class="login_bg">
    </div>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <img src="{{ asset('images/harvest_logo.png') }}" class="logo_login" alt="Green Harvest Logo">
                @yield('content')
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>

<script src="{{ asset('/js/login.js') }}"></script>

</html>
