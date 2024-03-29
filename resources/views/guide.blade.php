@extends('layout/template')

@section('title','Guide')
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
@section('add', 'black')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center my-5">
    <h2 style="font-family: Comfortaa; color: #3DA43A; text-align:center ">Guide</h2>
    <div style="width: 80%; text-align:center">
        <h4 style="font-family: Comfortaa; color: #3DA43A; font-size:20px">Booking Guide</h4>
        <div class="mt-5 " style="margin-left:30%">
            <div class="bi bi-1-circle" style="font-size: 20px;font-family: Comfortaa; color: #3DA43A;"> Log In to Your
                Account</div>
            <p>
                Start by login to your account<br>
                to access more features</p>
        </div>
        <div class="" style="margin-right: 30%">
            <div style="font-size: 20px; font-family: Comfortaa; color: #3DA43A;">Go to the Tour Page <i
                    class="bi bi-2-circle" style="font-size: 20px"></i> </div>
            <p>
                Find the best tour package <br>for you</p>
        </div>
        <div style="margin-left: 30%">
            <div class="bi bi-3-circle" style="font-size: 20px; font-family: Comfortaa; color: #3DA43A;"> Purchase</div>
            <p>
                Click on purchase button and<br>
                complete your payment</p>
        </div>
        <div style="margin-right: 30%">
            <div style="font-size: 20px; font-family: Comfortaa; color: #3DA43A;">Check Your Email <i
                    class="bi bi-4-circle" style="font-size: 20px"></i> </div>
            <p>We will send an email<br>about your purchase</p>
        </div>
    </div>
</div>
@endsection