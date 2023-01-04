@extends('layout/template')

@section('title','Your Cart')

@section('content')
<style>
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
</style>

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h1 style="color: #3DA43A; font-family: 'Comfortaa'; font-weight: 500; font-size: 30px;">Cart</h1>

        <form action="/purchase" class="mt-5"  method="GET">
            @csrf   

            @foreach($cart as $c)
                <!-- Detail Cart Start -->
                
                <div class="d-flex flex-row ">
                    <div class="" style="width: fit-content ">
                        @foreach($c->tour->tourPlace as $tp)
                            <img src="{{ asset('storage/images/'.$tp->place->place_image) }}" width="250px" height="250px" style="object-fit: cover;">
                            @break
                        @endforeach
                    </div>
                    <div class="ms-4 d-flex flex-row justify-content-between align-items-center" style="width: 80%">
                        <div>
                         
                            <p class="mb-2" style="font-size: 20px; font-weight: bold">{{$c->tour->tour_title}}</p>
                            <p class="mb-3">
                                <i class="bi bi-geo-alt">{{$c->tour->province->province_name}}, Indonesia</i>
                            </p>
                          
                            @php
                                $count = 1;
                                $ms = "";
                            @endphp
                            <div class="d-flex flex-row">
                                @foreach($c->tour->tourCategory as $cat)
                                    @if($count != 1)
                                        @php
                                            $count = 1;
                                            $ms = "ms-2";
                                        @endphp  
                                    @endif
                                    @php
                                        $count++;
                                     @endphp
                                    <p class="px-2 py-1 rounded {{$ms}}"  style="font-size: 13px; width:fit-content; border: solid 1px black">{{$cat->category->category_name}}</p>
                                @endforeach
                            </div>
                            <p  class="mb-2 mt-0">
                            @php
                                echo date_format(date_create($c->tour->start_date),"l, d F Y");
                            @endphp
                            </p>
                            <p  class="m-0" style="font-size: 18px; font-weight: bold; color: #3DA43A">
                            @php
                                echo "Rp". number_format($c->tour->price, 2, ",", ".");
                            @endphp
                            </p>

                        </div>
                    </div>

                    <div class="d-flex flex-column justify-content-between">
                        <div class="align-self-end">
                            <input class="form-check-input" style="font-size: 18px;" type="checkbox" name="checkbox[]" id="flexCheckDefault">
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <div class="btn minus bg-light text-center align-self-center" style="font-size: 18px; width:35px">-</div>
                            <input class="num text-center border-0 mx-2" style="font-size: 18px; width: 25px" value="1">
                            <div class="btn plus bg-light  text-center align-self-center" style="font-size: 18px; width:35px" >+</div>
                        </div>
                    </div>
                    
                </div>
                <hr class="my-4">
            @endforeach
            <button type="submit" class="btn form-control text-white " style="background-color: #3DA43A; width:150px; float:right;">Purchase</button>         
        </form>
    </div>
</div>

<script>
    const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");

    let a = num.value;
    plus.addEventListener("click", () => {
        a++;
        num.value = a;
    })

    minus.addEventListener("click", () => {
        if (a > 1) {
            a--;
            num.value = a;
        }
    })
</script>
@endsection
