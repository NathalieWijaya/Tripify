@extends('layout.template')

@section('content')
<div class="container my-5" style="width: 50%">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div style="text-align:center">
                            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;" >Reset Password</p>
                            <p>Please Provide the Following Information</p>
                        </div>


                        <div class="form-floating mb-3">
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email" autofocus>
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="w-100 mb-0">
                            <button type="submit" class="btn text-white w-100" style="background-color: #3DA43A;">
                                {{ __('Send Reset Password Link') }}
                            </button>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
