@extends('layout.template')
@section('title','Reset Password')
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
        <div class="col-md-8">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div style="text-align:center">
                            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;" >Reset Password</p>
                            <p>Please Enter Your New Password</p>
                        </div>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-floating mb-3">
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Your Password">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Your Password">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        </div>

                        <div class="w-100 mb-0">
                            <button type="submit" class="btn text-white w-100" style="background-color: #3DA43A;">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
