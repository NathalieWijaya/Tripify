@extends('layout/templateTrans')

@section('title','Home')

@section('logo', 'white')
@section('cart', 'white')
@section('profile', 'white')
@section('login', 'text-white')
@section('register', 'text-white')


@section('navHome', 'text-white')
@section('navTour', 'text-white')
@section('navReq', 'text-white')
@section('navGuide', 'text-white')
@section('navAbout', 'text-white')

@section('content')

<div class="justify-items-center d-flex flex-column align-content-center " style="background: url({{ asset('/storage/images/background.jpg') }})  rgba(0, 0, 0, 0.6);  background-blend-mode: multiply; background-position-x: center; background-position-y: center; background-repeat: no-repeat; background-size: cover">
    @include('layout/header');
    <div class="d-flex align-items-center justify-content-center" >
    <div class="d-flex flex-column justify-content-center text-white align-items-start" style="font-size:20px; height: 450px; width:80%;">
        <h2 style="font-family: 'Comfortaa'; font-weight: 600; margin-top: -30px" >Live in moments that<br />matter.</h2>
        <a submit='/tour' class="btn text-white mt-3 mb-3" type="button" style="background: #3da43a;">Explore Now</a>
    </div>
    </div>
</div>

<div class="d-flex justify-content-center flex-column align-items-center my-3 pt-1">
    <h4 class="mt-5" style="font-family: 'Comfortaa'; font-weight: 600;">Popular Destinations</h4>
    <p class="my-3" style="font-size: 16px;">Our most favorite destinations you will love</p>

    
    <div class="row mt-3 mb-3" style="width: 80%; height: fit-content;">
        @foreach($province as $p)
        <a class="col text-start btn"  href="/tour/province/{{$p->id}}">
            @foreach($p->place as $pp)
            <img src="{{ asset('/storage/images/'.$pp->place_image) }}" width="310" height="310" style="object-fit: cover"/>
            @break
            @endforeach
            <p class="mt-4  text-decoration-none text-center" style="font-size: 16px"><strong>{{$p->province_name}}</strong></p>
        </a> 
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center align-items-center" style="background: #f8f7f7; height: 500px ">
    <div class="d-flex justify-content-between align-items-center w-75" style="">
        <div>
            <h1 class="" style="font-size: 30px;">Decide your own trip</h1>
            <p>Create and customize your version of an ideal<br />trip and we'll make it happen!</p>
            <a class="btn text-white"  style="background-color: #3DA43A">Request Trip</a>
        </div>
        <img src={{ asset('/storage/images/compass.jpg') }} style="object-fit: cover;" width="400" height="400" />
    </div>
</div>

<div class="text-center d-flex flex-column justify-content-center align-items-center mb-4" style="">
    <h4 class="mt-5" style="font-family: 'Comfortaa'; font-weight: 600; color:#3DA43A">Tour Packages for you</h4>
    <p >Explore the nature</p>
  
    <div class="row mt-3" style="width: 80%; height: fit-content;">
    @foreach($tour as $t)
        <a class="col text-start btn"  href="/tour/{{$t->id}}" style="font-size: 14px">
            @foreach($t->tourPlace as $tp)
                <img class="m-0 w-100" src="{{ asset('/storage/images/'.$tp->place->place_image) }}" style="object-fit: cover; height:230px" />
                @break
            @endforeach
            <p class="mb-2 mt-3" style="overflow-wrap: break-word; width:200px;">
                <strong>{{$t->tour_title}}</strong>
            </p>
            <p class="m-0 font-weight-bold">
            @php
                echo "Rp". number_format($t->price, 2, ",", ".");
            @endphp
            </p>
        </a>
    @endforeach
    </div>
</div>
@endsection
