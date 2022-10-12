

<!--Page view for creating a user-->

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="row mb-3 d-flex justify-content-center h-100">
                            <div class="col-md-6 col-12">
                                <input id="name" type="text" placeholder="Name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center h-100">
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center h-100">
                            <div class="col-md-6">
                                <input id="username" placeholder="username"  type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @error('username')
                                <span class="help-block">
                                    <strong>{{ ('username') }}</strong>
                                </span>
                                @enderror      
                        </div>

                        <div class="row d-flex justify-content-center h-100 mb-3 mt-3">
                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center h-100 mb-3">
                            <div class="col-md-6">
                                <input id="password-confirm"  placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4 mb-3">
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id}}" id="{{$role->name}}">
                                    <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                        
                    </form>
          

