@extends('layout/template')
@section('border', 'border-bottom')

@section('logo', '#3DA43A')
@section('cart', 'black')
@section('profile', 'black')
@section('login', 'text-black')
@section('register', 'text-black')

@section('navHome', 'text-black')
@section('navTour', 'text-black')
@section('navReq', 'text-black')
@section('navGuide', 'text-black')
@section('navAbout', 'text-black')

@section('content')
<div class="container my-5" style="width: 50%">
    <div class="row justify-content-center">
        <div class="col-md-8">}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div style="text-align:center">
                            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;" >Login</p>
                            <p>Please Provide the Following Information</p>
                        </div>

                        <div class="form-floating w-100 me-1 mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email" autofocus>
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-floating w-100 me-1 mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row mb-3 w-100">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 d-flex flex-column">
                                <button type="submit" class="btn text-white w-100" style="background-color: #3DA43A;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                    <div class="d-flex flex-row w-100" >
                                        <hr class="w-100">
                                        <p class="mx-2" style="font-size: 10px">OR</p>
                                        <hr class="w-100">
                                    </div>

                                <a href="/auth/google" class="btn text-black w-100 border border-dark" style="background-color: white;">
                                    <i class="bi bi-google me-2 "></i> {{ __('Continue with Google') }}
                                </a>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
