@extends('layout/template')

@section('title','Tour Detail')

@section('content')

<style>
  
    #featured {
        width: 550px;
        height: 300px;
        object-fit: cover;
        cursor: pointer;
    }

    #thumbnail {
        object-fit: cover;
        max-width: 100px;
        max-height: 100px;
        cursor: pointer;
        opacity: 0.5;
        margin: 5px;
    }

    #thumbnail:hover {
        opacity: 1;
    }

    #thumbnail .active {
        opacity: 1;
    }

    .active {
        opacity: 1;
    }

    #slide-wrapper {
        max-width: 500px;
        display: flex;
        min-height: 100px;
        align-items: center;
    }

    #slider {
        width: 440px;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: hidden;
    }

    .arrow {
        width: 30px;
        height: 30px;
        cursor: pointer;
        transition: .3s;
    }

    .arrow:hover {
        opacity: .5;
        width: 35px;
        height: 35px;
    }

    .wrapper {
        height: max-content;
        min-width: 200px;
        background-color: #fff;
        border-radius: 12px;

    }

    .wrapper span {
        width: 100%;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
    }

    .wrapper span.num {
        font-size: 18px;
        padding-left: 5px;
        padding-right: 5px;
    }

    .wrapper span.plus {
        font-size: 18px;
        font-weight: 400;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 5px;
        padding-top: 2px;
        border-radius: 5px;
        background-color: #e5e5e5;
    }

    .wrapper span.minus {
        font-size: 18px;
        font-weight: 400;
        padding-left: 12px;
        padding-right: 12px;
        padding-bottom: 5px;
        padding-top: 2px;
        border-radius: 5px;
        background-color: #e5e5e5;
    }

    .btn-purchase {
        background-color: #00fd7c;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
    }

    .btn-purchase:hover {
        background-color: #00A651;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
    }

    .btn-cart {
        background-color: #d5d5d5;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
    }

    .btn-cart:hover {
        background-color: #a4a4a4;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
    }

    .btn-cat {
        height: 30px;
        justify-content: center;
        align-items: center;
        display: flex;
        cursor: default;
        font-style: normal;
        text-decoration: none;
        text-align: center;
        width: 120px;
        border-radius: 8px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 300;
    }
</style>

<div class="detail container my-5" style="width: 80%;">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" style="color: black; text-decoration: none">{{ $prov->province_name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tours->tour_title }}</li>
            </ol>
        </div>

        <div class="block w-full bg-white rounded-lg shadow-md mt-4">
            <div class="d-flex flex">
                <div class="col">
                    <img class="featured" id="featured" src="{{ asset('storage/images/'. $first_tour_place->place->place_image) }}" alt="">

                    <div id="slide-wrapper">
                        <i id="slideLeft" class="arrow fa-solid fa-chevron-left" style="font-size: 20px;"></i>

                        <div id="slider">
                            @foreach($tour_place as $tour)
                                <img id="thumbnail" src="{{ asset('storage/images/'. $tour->place->place_image) }}" alt="" class="thumbnail active">
                            @endforeach
                            
                        </div>

                        <i id="slideRight" class="arrow fa-solid fa-chevron-right" style="font-size: 20px;"></i>

                    </div>

                </div>
                <div class="col-sm-6">
                    <h1 style="color: #3DA43A; font-family: 'Comfortaa'; font-weight: 500; font-size: 35px;">{{ $tours->tour_title }}</h1>
                    <p class="truncate" style="font-weight: 500;font-size: 25px;">IDR {{ $tours->price }}</p>
                    <div class="wrapper">
                        <span class="minus" style="margin-right: 10px;">-</span>
                        <span class="num">1</span>
                        <span class="plus" style="margin-left: 10px;">+</span>
                    </div>
                    <div style="margin-top: 25px;">
                        <button class="btn btn-cart" style="margin-right: 10px;">Add to Cart</button>
                        <button class="btn btn-purchase">Pay</button>
                    </div>
                    <div class="d-flex flex-row mt-3 mb-5">
                        @foreach($tour_category as $cate)
                            <a role="button" class="btn-cat me-2" style="cursor: default;font-weight: bold;">{{ $cate->category->category_name }}</a>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="my-5">
            <p class="truncate" style="font-weight: bold;font-size: 18px;">Description</p>
            <p class="truncate ms-4" style="font-weight: 300; font-size: 16px;">{{$tours->description}}</p>
            </div>

            <div class="my-5">
                <p class="truncate" style="font-weight: bold;font-size: 18px;">Highlights</p>
                <p class="truncate ms-4" style="font-weight: 300;font-size: 16px;">@php echo nl2br($tours->highlights) @endphp</p>
            </div>

            <div class="my-5">
                <p class="truncate" style="font-weight: bold;font-size: 18px;">What's included</p>
                <p class="truncate ms-4" style="font-weight: 300;font-size: 16px;">@php echo nl2br($tours->include) @endphp</p>
            </div>

            @if($tours->not_include)
                
            <div class="my-5">
                <p class="truncate" style="font-weight: bold;font-size: 18px;">What's not included</p>
                <p class="truncate ms-4" style="font-weight: 300;font-size: 16px;">@php echo nl2br($tours->not_include) @endphp</p>
            </div>
            @endif

            <div class="my-5">
                <p class="truncate" style="font-weight: bold;font-size: 18px">Itinerary</p>
                <p class="truncate ms-4" style="font-weight: 300;font-size: 16px;">@php echo nl2br($tours->itinerary) @endphp</p>
            </div>

        </div>
</div>

<script>
    let thumbnails = document.getElementsByClassName('thumbnail');
    let activeImages = document.getElementsByClassName('active');

    for (var i = 0; i < thumbnails.length; i++) {
        thumbnails[i].addEventListener('mouseover', function() {
            if (activeImages.length > 0) {
                activeImages[0].classList.remove('active');
            }

            this.classList.add('active');
            document.getElementById('featured').src = this.src;
        })
    }

    let buttonRight = document.getElementById('slideRight');
    let buttonLeft = document.getElementById('slideLeft');
    let tumbnail = document.getElementById('slider');

    tumbnail.addEventListener('drag', function() {
        document.getElementById('slider').scrollLeft += 180;
    })


    buttonLeft.addEventListener('click', function() {
        document.getElementById('slider').scrollLeft -= 180;
    })

    buttonRight.addEventListener('click', function() {
        document.getElementById('slider').scrollLeft += 180;
    })
</script>
<script>
    const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");

    let a = 1;
    plus.addEventListener("click", () => {
        a++;
        a = (a < 10) ? "0" + a : a;
        num.innerText = a;
    })

    minus.addEventListener("click", () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;
        }
    })
</script>


@endsection
