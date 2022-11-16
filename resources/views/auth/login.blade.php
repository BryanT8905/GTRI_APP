@extends('layout.app')



@section('content')

    <div class="py-5 text-center bg-image " style="background-image:url('img/background1.jpg'); height: 100vh; background-size:cover;">
        <div class="container-fluid py-5 px-5">
            <div class="row  mt-1 mx-4 d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong px-5" style="background-color:white; border-radius:1rem;" >    
    
                            <h3 class="mb-3 mt-4 ">
                            <img src="{{asset('img/logo-gold.png')}}" width="200" height="120" class="mx-2 pb-0 d-inline-block align-top" alt="">
                            </h3>

                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="row d-flex justify-content-center pl-5 mb-3">
                                
                                <div class="form-outline mb-4">
                                    <label for="email" class="form-label"></label>
                                    <input type="text" name="email" id="email" placeholder="Email/Username" style="background-color:#ebebeb ;" class="form-control border-2  px-3  @error('email') border-danger @enderror" value="{{ old('email') }}">

                                    @error('email')
                                        <div class="text-sm text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="password"  class="form-label"></label>
                                    <input type="password" name="password" id="password" placeholder="Choose a password"  style="background-color:#ebebeb " class="form-control bg-gray-100 border-2 px-3  @error('password') border-danger @enderror" value="">

                                    @error('password')
                                        <div class="text-sm text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label mb-4 text-secondary">Remember me</label>
                                    </div>
                                    <p class="small pl-2 mb-0 pb-lg-2"><a class="text-secondary"  href="#!" >Forgot password?</a></p>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-outline-light btn-lg px-5 text-white" style="background-color:black;">Login</button>
                                </div>
                                </form> 
                            </div>
                        </div>  
                    </div>
            </div>
        </div>
    </div>
@endsection



