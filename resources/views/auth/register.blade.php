@extends('layout/template')

@section('content')
<div class="container my-5" style="width: 50%">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div style="text-align:center">
                            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;" >Register</p>
                            <p>Please Provide the Following Information</p>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Name" autofocus>
                            <label for="name" class="form-label">{{ __('Name') }}</label>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email">
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

                        <div class="form-floating mb-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Your Password">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            
                        </div>

                        <div class="w-100 d-flex flex-column">
                                <button type="submit" class="btn text-white w-100 mb-3" style="background-color: #3DA43A;">
                                    {{ __('Register') }}
                                </button>
                            
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
