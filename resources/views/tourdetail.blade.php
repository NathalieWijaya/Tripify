@extends('layout/template')

@section('title','Tour Detail')

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

<style>

.holder {
  display: flex;
  overflow-x: auto;
  overflow-y: hidden;
}

.holder::-webkit-scrollbar {
  display: none;
}

.slides {
  display: none;
}

.prev, .next {
  cursor: pointer;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
}

.slide-thumbnail {
  opacity: 0.6;
  cursor: pointer;
}

.active, .slide-thumbnail:hover {
  opacity: 1;
}

</style>

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <div style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/tour/province/{{$tour->province->id}}" style="color: black; text-decoration: none">{{ $tour->province->province_name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tour->tour_title }}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col">
             
                <div class="holder position-relative">
                    @foreach($tour->tourPlace as $tp)
                    <div class="slides">
                        <img src="{{ asset('storage/images/'. $tp->place->place_image) }}" height=480 width=480 style="object-fit: cover" alt="{{$tp->place->place_name}}" />
                    </div>
                    @endforeach
                    <div class="position-absolute ms-3"  style="top: 50%; left: 0%">
                        <a class="prev bg-white p-2 rounded-circle" onclick="plusSlides(-1)">
                            <i class="bi bi-chevron-left text-black" style="font-size: 16px"></i>
                        </a>
                    </div>
                    <div class="position-absolute me-4" style="top: 50%; right: 0%">
                        <a class="next bg-white p-2 rounded-circle" onclick="plusSlides(1)">
                            <i class="bi bi-chevron-right text-black" style="font-size: 16px"></i>
                        </a>
                    </div>
                </div>    

                <div class="d-flex flex-row align-items-center mt-3 ">
                    @php
                        $i=1; 
                    @endphp
                    @foreach($tour->tourPlace as $tp)
                        <img class="slide-thumbnail me-2" width=50 height=50 style="object-fit: cover" src="{{ asset('storage/images/'. $tp->place->place_image) }}" onclick="currentSlide({{$i}})" alt="Caption One">
                        @php
                            $i++; 
                        @endphp
                    @endforeach
                </div>
            </div>
        
            <div class="col d-flex flex-column ms-3">
                <h2 style="; font-weight: 600">{{ $tour->tour_title }}</h2>
                <div class="d-flex flex-row justify-content-between w-100 mt-2 ">
                    <h3 class="m-0" style="color: #3DA43A; font-weight:600 ">
                        @php
                            echo "Rp". number_format($tour->price, 2, ",", ".");
                        @endphp
                    </h3>

                    <div class="d-flex flex-row align-items-center">
                        <div class="btn minus bg-light text-center align-self-center" style="font-size: 18px; width:35px">-</div>
                        <input class="num text-center border-0 mx-2" style="font-size: 18px; width: 25px" name="qty" value="0">
                        <div class="btn plus bg-light text-center align-self-center" style="font-size: 18px; width:35px">+</div>
                    </div>
                </div>
                
                <p class="text-danger mb-3 mt-2">Remaining slot(s): {{$stock}}</p>

                <div class="d-flex flex-row align-items-center w-100 ms-0">
                    <button class="btn text-white bg-secondary me-2 " style="font-size: 18px">Add to Cart</button>
                    <button class="btn text-white" style="background-color: #3DA43A; font-size: 18px">Purchase</button>
                </div>

                <div class="mt-4">
                    <p style="font-weight: bold;font-size: 18px;">Description</p>
                    <p class="mb-1" style="font-size: 16px;">
                    @php
                        echo "Date: " . date_format(date_create($tour->start_date),"l, d F Y") . " - " . date_format(date_create($tour->end_date),"l, d F Y");
                    @endphp
                    </p>
                    <p style="font-size: 16px;">{{$tour->description}}</p>
                </div>

                <div class="mt-2">
                    <p class="mb-3" style="font-weight: bold;font-size: 18px;">Category</p>
                    <div class="row mb-3 m-0">
                        @foreach($tour->tourCategory as $cat)
                            <p class="px-2 py-1 rounded me-2 mb-0 col-1 "  style="font-size: 16px; width:fit-content; border: solid 1px black">{{$cat->category->category_name}}</p>
                        @endforeach
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>            

<div class="bg-light d-flex justify-content-center align-items-center py-5">
    <div style="width: 80%">
        <p class="truncate" style="font-weight: bold;font-size: 18px;">Highlights</p>
        <p class="truncate ms-4 mb-0" style="font-size: 16px;">@php echo nl2br($tour->highlights) @endphp</p>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center py-5">
    <div style="width: 80%">
        <p class="truncate" style="font-weight: bold;font-size: 18px;">What's included</p>
        <p class="truncate ms-4 mb-0" style="font-size: 16px;">@php echo nl2br($tour->include) @endphp</p>
    </div>
</div>

@if($tour->not_include)
    <div class=" d-flex justify-content-center align-items-center pb-5">
        <div style="width: 80%">
            <p class="truncate" style="font-weight: bold;font-size: 18px;">What's not included</p>
            <p class="truncate ms-4 mb-0" style="font-size: 16px;">@php echo nl2br($tour->not_include) @endphp</p>
        </div>
    </div>
@endif

<div class="d-flex justify-content-center bg-light align-items-center py-5">
    <div style="width: 80%">
        <p class="truncate" style="font-weight: bold;font-size: 18px;">Itinerary</p>
        <p class="truncate ms-4 mb-0" style="font-size: 16px;">@php echo nl2br($tour->itinerary) @endphp</p>
    </div>
</div>

<script>
    $('.plus').click(function () {
		if ($(this).prev().val() < {{$stock}}) {
    	    $(this).prev().val(+$(this).prev().val() + 1);
	    }
    });
    $('.minus').click(function () {
        if ($(this).next().val() > 0) {
            if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
        }
    });

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("slides");
        var dots = document.getElementsByClassName("slide-thumbnail");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>


@endsection
