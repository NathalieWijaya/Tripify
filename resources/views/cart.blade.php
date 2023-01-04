@extends('layout/template')

@section('title','Your Cart')

@section('content')
<style>
    .category-container {
        margin-left: 18rem;
        margin-right: 18rem;
    }

    .btn-cat {
        height: fit-content;
        display: inline-block;
        cursor: default;
        font-style: normal;
        text-decoration: none;
        text-align: center;
        width: 120px;
        border-radius: 8px;
        border: 2px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }

    input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        height: 25px;
        width: 25px;
        background-color: #d5d5d5;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    input[type="checkbox"]:after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 50px;
        content: "\f00c";
        color: #000;
        display: none;
    }

    input[type="checkbox"]:hover {}

    input[type="checkbox"]:checked {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 50px;
        content: "\f00c";
        color: #fff;
        background-color: #00A651;
    }

    .wrapper {
        height: 100px;
        min-width: 200px;
        margin-left: -95px;
        margin-top: 140px;
        background-color: #fff;
        border-radius: 12px;
        align-items: center;
        justify-content: center;
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
    .btn-purchase{
        background-color: #00fd7c;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
    }
    .btn-purchase:hover{
        background-color: #00A651;
        color: #fff;
        padding-left: 20px;
        padding-right: 20px;
    }
</style>

<div class="category container">
    <div style="padding: 40px;">
        <h1 style="color: #3DA43A; font-family: 'Comfortaa'; font-weight: 500; font-size: 30px;">Cart</h1>

        <!-- Detail Cart Start -->
        <div class="block w-full bg-white rounded-lg shadow-md mt-4">
            <div class="row flex">
                <div class="col-sm-4">
                    <img src="{{ asset('images/image-spinx.png') }}" class="rounded-xl" style="height: 250px;">
                </div>
                <div class="col-sm-6">
                    <h5 style="font-weight: 600;font-size:20px; margin-bottom: 18px;">Nusa Peninda Day Trip All-inclusive</h5>
                    <p style="vertical-align: middle; margin-bottom: 18px;"><i class="fa-solid fa-location-dot" style="margin-right: 10px;font-size: 20px;"></i>Bali, Indonesia</p>
                    <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-right: 5px;">Day Trip</a>
                    <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-right: 5px;">Beach</a>
                    <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-bottom: 18px;">Snorkeling</a>
                    <p style="margin-bottom: 18px;">Saturday, 4 February 2023 </p>
                    <p class="truncate" style="color: #00A651;font-weight: bold;font-size: 25px;">Rp. 1.500.000,00 </p>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" style="font-size: 18px;" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                    <div class="wrapper">
                        <span class="minus" style="margin-right: 10px;">-</span>
                        <span class="num">01</span>
                        <span class="plus" style="margin-left: 10px;">+</span>
                    </div>
                </div>
            </div>
            <hr size="2" color="#d5d5d5">
        </div>
        <!-- Detail Cart End -->

        <!-- Detail Cart Start -->
        <div class="block w-full bg-white rounded-lg shadow-md mt-4">
            <div class="row flex">
                <div class="col-sm-4">
                    <img src="{{ asset('images/image2.png') }}" class="rounded-xl" style="height: 250px;">
                </div>
                <div class="col-sm-6">
                    <h5 style="font-weight: 600;font-size:20px; margin-bottom: 18px;">Hutan Pinus Gunung Pancar Sentul</h5>
                    <p style="vertical-align: middle; margin-bottom: 18px;"><i class="fa-solid fa-location-dot" style="margin-right: 10px;font-size: 20px;"></i>Bogor, Indonesia</p>
                    <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-right: 5px;">Short Trip</a>
                    <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-right: 5px;">Forest</a>
                    <a role="button" class="btn-cat" style="cursor: default;font-weight: bold;margin-bottom: 18px;">Camping</a>
                    <p style="margin-bottom: 18px;">Friday, 3 March 2023 - Sunday, 5 March 2023 </p>
                    <p class="truncate" style="color: #00A651;font-weight: bold;font-size: 25px;">Rp. 2.500.000,00 </p>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" style="font-size: 18px;" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                    <div class="wrapper">
                        <span class="minus" style="margin-right: 10px;">-</span>
                        <span class="num">01</span>
                        <span class="plus" style="margin-left: 10px;">+</span>
                    </div>
                </div>
            </div>
            <hr size="2" color="#d5d5d5">
        </div>
        <!-- Detail Cart End -->
        <div class="row" style="float: right; margin-bottom:40px">
            <div class="col-sm-8">
                <h5 style="font-weight: 600;font-size:18px;">Total : Rp3.000.000,00</h5>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-purchase">Purchase</button>
            </div>
        </div>
    </div>
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
