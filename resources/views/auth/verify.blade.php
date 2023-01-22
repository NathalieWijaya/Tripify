@extends('layout/template')

@section('content')
<div class="container my-5" style="width: 50%">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <div style="text-align:center">
                        <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;" >Verify Your Email</p>
                    </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
        </div>
    </div>
</div>
@endsection
