
                    <div>
                        <h4 class="d-flex justify-content-left mt-0"> Edit User</h4>
                    </div>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-outline">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>

                            <div class="form-outline mb-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} {{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-outline">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                            <div class="form-outline mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} {{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-outline">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Username') }}</label>

                            <div class="form-outline mb-4">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }} {{ $user->username }}" required autofocus>

                                @error('username')
                                <span class="help-block">
                                    <strong>{{ ('username') }}</strong>
                                </span>
                                @enderror      
                        </div>

                        <div class="form-outline">
                            <label for="department" class="col-md-4 col-form-label text-md-start">{{ __('Department') }}</label>

                            <div class="form-outline mb-4">
                                <input id="department" type="text" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }} {{ $user->department }}" required autofocus>

                                @error('department')
                                <span class="help-block">
                                    <strong>{{ ('department') }}</strong>
                                </span>
                                @enderror      
                        </div>


                        <div class="col-md-6 mb-4">
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id}}" id="{{$role->name}}" @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif>
                                    <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>
                                    
                                </div>
                            @endforeach
                           
                           <!-- @foreach($user->roles as $role) 
                                {{$role->name}}
                            @endforeach -->
                        </div>
                            <div class="col-xl-6 mt-3 mb-0">
                                <button type="submit" class="btn btn-primary btn-md btn-block mx-2">
                                    {{ __('Update') }}
                                </button>
                        </div>
                    </form>
          