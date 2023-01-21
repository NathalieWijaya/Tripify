@extends('layout/template')

@section('title','Purchase')
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
<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa'; ">Purchase</h3>

        <div class="my-5 d-flex flex-row justify-content-between">
            <div class="col-7" >
               @foreach($carts as $c)
                <div class="d-flex flex-row">
                    <div style="">
                        @foreach($c->tour->tourPlace as $tp)
                            <img src="{{ asset('storage/images/'.$tp->place->place_image) }}" width="200px" height="200px" style="object-fit: cover;">
                            @break
                        @endforeach
                    </div>
                    <div class="ms-4 my-3 d-flex flex-row justify-content-between align-items-end w-100" >
                        <div>
                            <p  class="mb-2" style="font-size: 18px; font-weight: bold">{{$c->tour->tour_title}}</p>
                            <p class="mb-2">
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
                        <p class="m-0 align-self-end" style="white-space:nowrap">{{$c->qtyBuy}} item(s)</p>
                    </div>
                </div>

                <hr class="my-4">
                @endforeach
            </div> 

            <div class="col-4">

                <div class="d-flex flex-row justify-content-between">
                    <div class="border" style="width: 100%;  border-radius: 15px">
                        <div style="margin: 30px">
                            <div class="d-flex flex-row justify-content-between mb-1 " >
                                <p class="mb-3" style="font-weight: bold; font-size: 20px ">Review Order Details</p>
                            </div>
                            <div class="d-flex flex-row justify-content-between mb-1">
                                <p class="m-0">Booking Fee</p>
                                <p class="m-0">Rp0,00</p>
                            </div>
                            <div class="d-flex flex-row justify-content-between mb-1" >
                                <p class="m-0">Subtotal</p>
                                <p class="m-0">
                                @php
                                    echo "Rp". number_format($params['transaction_details']['gross_amount'], 2, ",", ".");
                                @endphp
                                </p>
                            </div>
                            
                            <div class="d-flex flex-row justify-content-between" style="font-size: 16px; font-weight: bold">
                                <p>Total</p>
                                <p>
                                @php
                                    echo "Rp". number_format($params['transaction_details']['gross_amount'], 2, ",", ".");
                                @endphp
                                </p>
                            </div>
                            
                            <p class="mb-3" style="font-size: 12px">Please recheck your order</p>
                            
                            <button type="submit" id="pay-button" class="btn form-control text-white" style="background-color: #00A651">Pay</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result){  
                window.location = 'http://127.0.0.1:8000/payment/{{Auth::user()->id}}';
            },
            onPending: function(result){
                alert("Wating your payment!"); 
            },
            onError: function(result){
                alert("Payment failed!"); 
            },
            onClose: function(){
                alert('You closed the popup without finishing the payment');
            }
        })
    });
</script>
@endsection