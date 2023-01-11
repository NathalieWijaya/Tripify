@extends('layout/template')

@section('title','Tour Detail')

@section('content')

<style>
    .detail-container {
        margin-left: 18rem;
        margin-right: 18rem;
    }

    #featured {
        width: 500px;
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

<div class="detail container">
    <div style="padding: 15px;">
        <?php $province = App\Models\Province::find($tours->province_id); ?>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" style="text-decoration: none;color: #000;font-weight: bold;"> {{$province->province_name}}, Bali</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$tours->tour_title}}</li>
            </ol>
        </nav>

        <div class="block w-full bg-white rounded-lg shadow-md mt-4">
            <div class="row flex">
                <div class="col-sm-6">
                    <?php $place = App\Models\Place::find($tours->province_id); ?>
                    <img class="featured" id="featured" src="{{ asset('storage/images/'.$place->place_image) }}" alt="">

                    <div id="slide-wrapper">
                        <i id="slideLeft" class="arrow fa-solid fa-chevron-left" style="font-size: 20px;"></i>
                    
                        <div id="slider">
                            <img id="thumbnail" src="{{ asset('storage/images/'.$place->place_image) }}" alt="" class="thumbnail active">
                            <img id="thumbnail" src="{{ asset('storage/images/'.$place->place_image) }}" class="thumbnail">
                            <img id="thumbnail" src="{{ asset('storage/images/'.$place->place_image) }}" alt="" class="thumbnail">
                            <img id="thumbnail" src="{{ asset('storage/images/'.$place->place_image) }}" alt="" class="thumbnail">
                            <img id="thumbnail" src="{{ asset('storage/images/'.$place->place_image) }}" alt="" class="thumbnail">
                            <img id="thumbnail" src="{{ asset('storage/images/'.$place->place_image) }}" alt="" class="thumbnail">
                        </div>

                        <i id="slideRight" class="arrow fa-solid fa-chevron-right" style="font-size: 20px;"></i>

                    </div>

                </div>
                <div class="col-sm-6">
                    <h1 style="color: #3DA43A; font-family: 'Comfortaa'; font-weight: 500; font-size: 30px;">{{$tours->tour_title}}/h1>
                        <p class="truncate" style="font-weight: 500;font-size: 20px;">{{$tours->price}}</p>
                        <div class="wrapper">
                            <span class="minus" style="margin-right: 10px;">-</span>
                            <span class="num">1</span>
                            <span class="plus" style="margin-left: 10px;">+</span>
                        </div>
                        <div style="margin-top: 25px;">
                            <button class="btn btn-cart" style="margin-right: 10px;">Add to Cart</button>
                            <button class="btn btn-purchase">Pay</button>
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-sm-3">
                                <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-right: 5px;">Day Trip</a>
                            </div>
                            <div class="col-sm-3">
                                <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-right: 5px;">Beach</a>
                            </div>
                            <div class="col-sm-3">
                                <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-bottom: 25px;">Snorkeling</a>
                            </div>
                        </div>
                        <p class="truncate" style="font-weight: bold;font-size: 18px;">Description</p>
                        <p class="truncate" style="font-weight: 300;font-size: 16px;"> {{$tours->description}} </p>
                </div>
            </div>
            <p class="truncate" style="font-weight: bold;font-size: 18px;margin-top:70px;">Highlights</p>
            <div style="padding-left: 30px;">
                <p class="truncate" style="font-weight: 300;font-size: 16px;">• {{$tours->highlights}}</p>
            </div>

            <p class="truncate" style="font-weight: bold;font-size: 18px;margin-top:50px;">What's included</p>
            <div style="padding-left: 30px;">
                <p class="truncate" style="font-weight: 300;font-size: 16px;">• {{$tours->included}}</p>
            </div>

            <p class="truncate" style="font-weight: bold;font-size: 18px;margin-top:50px;">What's not included</p>
            <div style="padding-left: 30px;">
                <p class="truncate" style="font-weight: 300;font-size: 16px;">• {{$tours->not_included}}</p>
            </div>

            <p class="truncate" style="font-weight: bold;font-size: 18px;margin-top:50px;">Itinerary</p>
            <div style="padding-left: 30px;margin-bottom:50px;">
                <p class="truncate" style="font-weight: 300;font-size: 16px;">• {{$tours->itinerary}}</p>
            </div>

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