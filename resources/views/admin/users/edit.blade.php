@extends('layout.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} {{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} {{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 pb-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }} {{ $user->username }}" required autofocus>

                                @error('username')
                                <span class="help-block">
                                    <strong>{{ ('username') }}</strong>
                                </span>
                                @enderror      
                        </div>
                        <div class="col-md-6 offset-md-4 mb-3">
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id}}" id="{{$role->name}}" @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif>
                                    <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>
                                    
                                </div>
                            @endforeach
                           
                            @foreach($user->roles as $role) 
                                {{$role->name}}
                            @endforeach


                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection