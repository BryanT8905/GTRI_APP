<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{ config('app.name', 'Web Management Application')}}</title>
    
    <!--this link prevents flashes of unstyled code caused by the vite directive -->
    <link rel="stylesheet" href="http://localhost:8000/resources/js/app.js" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    
    
</head>
<body class="p-3 mb-2 bg-light text-dark">
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">GTRI</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
            </li>
        </ul>

        <!--navbar login and registration items -->
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-white underline">Home</a>
                        <a href="{{ route('logout') }}" class="text-sm text-white underline ps-2">Logout</a>

                        
                        
                    @else
                        <a href="{{ route('login') }}" class=" text-white text-sm text-gray-500 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class=" ps-2 text-white ml-4 text-sm  underline">Register</a>
                        @endif
                    @endif
                    
                </div>
            @endif
        
        </div>
    </div>
    </nav>

    <div class=" sidebar float-start pt-5">
		<ul style="list-style-type:none;">
			<li><a href="{{ url('/users') }}" class="text-black text-decoration-none">Users</a></li>
			<hr class="line">
			<li><a href="#" class="text-black text-decoration-none">Projects</a></li>
			<hr class="line">
			<li><a href="#" class="text-black text-decoration-none">Budget</a></li>
			<hr class="line">
			<li><a href="#" class="text-black text-decoration-none">Manage Assets</a></li>
			<hr class="line">
		</ul>	
		</div>
    
    <div class='container-fluid'>
        @yield('content')
    </div>
        
      
</body>
</html>