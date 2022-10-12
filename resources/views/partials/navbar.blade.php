<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">GTRI</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
            </li>
        </ul>

        <!-- top navbar login/logout and registration items -->
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block d-flex">
            @if(Auth::user()->image)
                <div class="px-1">
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 70px;height: 70px; padding: 10px; margin: 0px; ">
                </div>
                @else
                <div class="px-1">
                <img class="image rounded-circle" src="{{asset('img/user.png')}}" alt="profile_image" style="width: 70px;height: 70px; padding: 10px; margin: 0px; ">
                </div>
            @endif
                    @auth
                        <div class="dropdown pt-3">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">View Profile</a></li>
                                <li><a href="{{ route('home') }}" class="dropdown-item ">Home</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit(); "class="dropdown-item">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                                    style="display:none">
                                     @csrf
                                </form>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class=" text-white text-sm text-gray-500 underline">Login</a>

                    @endif
                    
                </div>
        </div>
    </div>
</nav>