

<!--Page view for creating a user-->
<div class="card-shadow shadow-lg">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Create New User</h4>
                </div>
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}" id="create">
            @csrf

            <div class="form-outline mb-4">
                    <input id="name" type="text" placeholder="Name" class="form-control form-control-md @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-4">
                    <input id="email" type="email" placeholder="Email" class="form-control form-control-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-4">
                    <input id="username" type="text" placeholder="Username" class="form-control @error('password') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror      
            </div>

            <div class="form-outline mb-4">
                    <input id="department" type="text" placeholder="Department" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autofocus>
                    @error('department')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror      
            </div>

            <div class="form-outline mb-4">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required minlength="8" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-4">
                    <input id="password-confirm"  type="password"  placeholder="Confirm Password"class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="col-md-6 mb-4">
                <h6>Roles/Permissions</h6>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id}}" id="{{$role->name}}">
                        <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary btn-md btn-block mx-2 " id="submitForm">
                    {{ __('Create User') }}
                </button>
            </div>
            
        </form>
    </div>
</div>

