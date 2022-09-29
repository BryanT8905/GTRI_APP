<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{ config('app.name', 'Web Management Application')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--render sweetAlert success message -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <!--this link prevents flashes of unstyled code caused by the vite directive -->
    <link rel="stylesheet" href="http://localhost:8000/resources/js/app.js" />

    <!--vite renders css and JavaScript -->
    @vite(['resources/css/app.css','resources/js/app.js'])
  
</head>
<body class="p-3 mb-2 bg-light text-dark">
<a href="{{ route('register') }}" class=" ps-2 text-white ml-4 text-sm  underline">Register</a>
    <!--if user is logged in show top nav bar and sidebar-->
    @if (Route::has('login'))
        @auth
             @include('partials.navbar')
             @include('partials.sidebar')
        @endauth
    @endif
    
    <div class='container-fluid'>
        <!--render content of blade files and include partials-->
        @include('partials.alerts')
        @yield('content')
    </div>     
</body>
</html>