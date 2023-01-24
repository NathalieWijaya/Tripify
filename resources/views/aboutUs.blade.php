@extends('layout/templateTrans')

@section('title','About Us')


@section('logo', 'white')
@section('cart', 'white')
@section('profile', 'white')
@section('add', 'white')
@section('login', 'text-white')
@section('register', 'text-white')
@section('add', 'black')

@section('navHome', 'text-white')
@section('navTour', 'text-white')
@section('navReq', 'text-white')
@section('navGuide', 'text-white')
@section('navAbout', 'text-white')


@section('content')

<div class="justify-items-center d-flex flex-column align-content-center " style="background: url({{ asset('/storage/images/clock.jpg') }})  rgba(0, 0, 0, 0.5) ;  background-blend-mode: multiply; background-position-x: center; background-position-y: center; background-repeat: no-repeat; background-size: cover">
    @include('layout/header');
    <div class="d-flex align-items-center justify-content-center" >
    <div class="d-flex flex-column justify-content-center text-white" style="font-size:20px; height: 450px; width:80%">
        <h2 style="font-family: 'Comfortaa'; font-weight: 600; margin-top: -30px" class='mb-3' >About Tripify</h2>
        <p style="font-size: 16px" class="m-0">We started with the simple idea of bringing the best from us <br>
         to you. From our founder to our front-line workers, we <br>
         put lots of love and careful thought into all we do. We <br>
         you enjoy all we have to offer, and share <br>
        the experience with others.</p>
    </div>
    </div>
</div>


@endsection

