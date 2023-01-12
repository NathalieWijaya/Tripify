@extends('layout/template')

@section('title','Add Destination')

@section('content')

<div class="card text-white d-flex " style="position: relative;">
    <img src={{ asset('/storage/images/clock.jpg') }} width="100%" style="object-fit: cover;">
    <div class="card-img-overlay  d-flex flex-column justify-content-center" style="position:absolute; left:10%; font-size:20px">
        <h2 style="font-family: 'Comfortaa';" >About Tripify</h2>
        <p>We started with the simple idea of bringing the best from us <br>
         to you. From our founder to our front-line workers, we <br>
         put lots of love and careful thought into all we do. We <br>
         you enjoy all we have to offer, and share <br>
        the experience with others.</p>
    </div>
</div>

@endsection