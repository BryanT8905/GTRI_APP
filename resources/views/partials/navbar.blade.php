@include('partials.modal')


<nav class="navbar navbar-expand-lg navbar-dark bg-dark  mb-0 fixed-top">
    <a class="navbar-brand mx-0" href="{{ route('home') }}">
          <img src="{{asset('img/logo-gold.png')}}" width="100" height="60" class="mx-4 mt-0 d-inline-block align-top" alt="">
</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="search form-inline mx-auto my-2" style="padding-left:160px ;"  action="action_page.php">
    <input type="text" placeholder="Search" name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    <ul class="navbar-nav">
        <li class="nav-item active">
         @if(Auth::user()->image)
            <div>
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 60px; height: 60px; padding: 10px; margin: 0px; ">
            </div>
         @else
            <div >
                        <iconify-icon icon="iconoir:profile-circled" style="color: white;" width="50" height="50"></iconify-icon>
            </div>
          @endif
        </li>
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome {{ Auth::user()->name }}!
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a data-toggle="modal" class="dropdown-item" id="profileButton" data-target="#profileModal" data-attr="{{ route('profiles.edit', Auth::user())}}" data-original-title="profile" class="btn btn-success btn-xl " role="button">
                        <iconify-icon icon="ri:profile-fill" width="20" height="20"></iconify-icon>
                        View Profile</a>

                        <a data-toggle="modal" class="dropdown-item" id="changePasswordButton" data-target="#changePasswordModal" data-attr="{{ route('passwords.edit', Auth::user())}}" data-original-title="changePassword" class="btn btn-success btn-xl " role="button">
                        <iconify-icon icon="carbon:password" width="20" height="20"></iconify-icon>
                        Change Password</a>

                        <a href="#" class="dropdown-item ">
                        <iconify-icon icon="clarity:grid-view-solid" width="20" height="20"></iconify-icon>
                        Change Dashboard View</a>

                        <a class="dropdown-item" href="#">
                        <iconify-icon icon="fluent:person-support-20-filled" width="20" height="20"></iconify-icon>
                        Support</a>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit(); "class="dropdown-item"><iconify-icon icon="akar-icons:sign-out" width="20" height="20"></iconify-icon>
                            Sign Out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                            style="display:none">
                                @csrf
                        </form>
                    </div>
                    @else
                        <a href="{{ route('login') }}" class=" text-white text-sm text-gray-500 underline">Login</a>

                    @endif
                    <li class="nav-item active ml-4 px-2">
                        <iconify-icon icon="bytesize:settings" style="color: white;" width="40" height="40"></iconify-icon>
                    </li>
            </ul>
        </div>
    </nav>
    <script>
    $(function () { 
//Call to load profile modal        
        $(document).on('click', '#profileButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    $('#userModal').modal("show");
                    $('#userBody').html(result).show();
                    
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    
                },
                timeout: 8000

            })
        });
//Call to load change password modal        
           $(document).on('click', '#changePasswordButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    $('#userModal').modal("show");
                    $('#userBody').html(result).show();
                    
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    
                },
                timeout: 8000

            })
        });
 //Calls to remove modal backdrop when cancel button and close(x) icon buttton is clicked in the modal       
        $(document).ready(function(){
            $('.cancelBtn').click(function(){
                $("modal-backdrop").remove();
            });
        });

        $(document).ready(function(){
            $('.closeBtn').click(function(){
                $("modal-backdrop").hide();
            });
        });
    });   
    </script>