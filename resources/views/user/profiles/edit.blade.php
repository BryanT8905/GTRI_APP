
 <div class="card shadow">
    <div class="card-header bg-primary">
       <h4 class="mb-0 text-white">Account Details</h4>
    </div>

    <div class="card-body">
        @if(Auth::user()->image)
            <div class="d-flex justify-content-center">
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 160px; height: 160px; padding: 10px; margin: 0px; ">
            </div>
        @else
            <div class="d-flex justify-content-center">
                <img class="image rounded-circle" src="{{asset('img/user3.png')}}" alt="profile_image" style="width: 160px; height: 160px; padding: 10px; margin: 0px; ">
            </div>
        @endif
    
        <div class=" mb-3 mx-3 ">
            <h6 class="text-secondary mb-1">Upload Image:</h6>
            <div class=" mx-0">
                <form method="POST" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data" >
                    @method('PATCH')
                        @csrf
                    <div class="row pl-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="image" placeholder="Upload Image" id="image">
                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                       

                        <div class="form-outline">
                                <label for="name" class="col-md-4 col-form-label text-md-start text-secondary">{{ __('Name') }}</label>

                                <div class="form-outline mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} {{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-outline">
                                <label for="email" class="col-md-4 col-form-label text-md-start text-secondary">{{ __('Email Address') }}</label>

                                <div class="form-outline mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} {{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-outline">
                                <label for="username" class="col-md-4 col-form-label text-md-start text-secondary">{{ __('Username') }}</label>

                                <div class="form-outline mb-3">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }} {{ $user->username }}" required autofocus>

                                    @error('username')
                                    <span class="help-block">
                                        <strong>{{ ('username') }}</strong>
                                    </span>
                                    @enderror      
                            </div>

                            <div class=" mb-3 mx-3">
                                <h6 class="text-secondary mb-0">Department:</h6>
                                    {{ $user->department}}
                            </div> 

                            <div class=" mb-3 mx-3">
                                <h6 class="text-secondary mb-0">Role/Permission:</h6>
                                @foreach(Auth::user()->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </div> 
                        
                        <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary btn-md btn-block mx-2">
                                        {{ __('Update Profile') }}
                                    </button>
                        </div>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
   
    

   
