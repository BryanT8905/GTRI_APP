@extends('layout.app')

@section('content')
<section class="vh-100" style="background-color: #394E62;">
    <img src="{{ asset('img/logo.png') }}" style="width:685px;" class="mx-auto d-block img-fluid"  alt="logo">
    <div class="container py-5">
        <div class="row d-flex justify-content-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card py-5 h-100 shadow-2-strong" style="background-color:#CCCCCC; border-radius:1rem;">
                   <h3 class="card-header border-0 text-center pb-4" style="background-color:#CCCCCC;">{{ __('Account Login') }}</h3> 

                    <div class="card-body" style="background-color:#CCCCCC;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-4 d-flex justify-content-center">
                                <div class="col-md-6">
                                    <input id="email" type="text" placeholder="Username/Email" style="background-color:#F5F5F5;"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 d-flex justify-content-center">
                                <div class="col-md-6">
                                    <input id="password" placeholder="Password" type="password" style="background-color:#F5F5F5;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" style="background-color:#D9D9D9;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-outline-light btn-md text-light" style="background-color: #394E62;">
                                        {{ __('Sign In') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-black-50" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
