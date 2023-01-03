@extends('layout/template')

@section('title','Purchase')

@section('content')
<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa'; ">Purchase</h3>

        <div class="my-5 d-flex flex-row justify-content-between">
            
            <div class="col-7" >
               
                <div class="d-flex flex-row">
                    <div style="">
                        <img src="/asset/nusapenida.jpg" width="200px" height="200px" style="object-fit: cover;">
                    </div>
                    <div class="ms-4 my-3 d-flex flex-row justify-content-between align-items-end" >
                        <div>
                            <p  class="mb-2" style="font-size: 18px; font-weight: bold">Nusa Peninda Day Trip All-inclusive</p>
                            <p class="mb-2">
                                <i class="bi bi-geo-alt">Bali, Indonesia</i>
                            </p>
                            <div class="d-flex flex-row">
                                <p class="px-2 py-1 rounded" style="font-size: 13px; width:fit-content; border: solid 1px black">Day Trip</p>
                                <p class="px-2 py-1 rounded ms-2" style="font-size: 13px; width:fit-content; border: solid 1px black">Beach</p>
                                <p class="px-2 py-1 rounded ms-2" style="font-size: 13px; width:fit-content; border: solid 1px black">Snorkeling</p>
                            </div>
                            <p  class="mb-2 mt-0">Saturday, 4 February 2023</p>
                            <p  class="m-0" style="font-size: 18px; font-weight: bold; color: #3DA43A">Rp1.500.000,00</p>
                        </div>
                        <p class="m-0 align-self-end" style="">1 item(s)</p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex flex-row">
                    <div style="">
                        <img src="/asset/nusapenida.jpg" width="200px" height="200px" style="object-fit: cover;">
                    </div>
                    <div class="ms-4 my-3 d-flex flex-row justify-content-between align-items-end" >
                        <div>
                            <p  class="mb-2" style="font-size: 18px; font-weight: bold">Nusa Peninda Day Trip All-inclusive</p>
                            <p class="mb-2">
                                <i class="bi bi-geo-alt">Bali, Indonesia</i>
                            </p>
                            <div class="d-flex flex-row">
                                <p class="px-2 py-1 rounded"  style="font-size: 13px; width:fit-content; border: solid 1px black">Day Trip</p>
                                <p class="px-2 py-1 rounded ms-2"  style="font-size: 13px; width:fit-content; border: solid 1px black">Beach</p>
                                <p class="px-2 py-1 rounded ms-2"  style="font-size: 13px; width:fit-content; border: solid 1px black">Snorkeling</p>
                            </div>
                            <p  class="mb-2 mt-0">Saturday, 4 February 2023</p>
                            <p  class="m-0" style="font-size: 18px; font-weight: bold; color: #3DA43A">Rp1.500.000,00</p>
                        </div>
                        <p class="m-0 align-self-end" style="">1 item(s)</p>
                    </div>
                </div>
            </div> 

            <div class="col-4">
                <!-- <div class="d-flex flex-row mb-0">
                    <h5 class="mb-0 me-5" style="">Credit/Debit Card</h5>
                    <img src="/asset/card.png" height="25px">
                </div>  -->

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
                                <p class="m-0">Rp3.000.000,00</p>
                            </div>
                            
                            <div class="d-flex flex-row justify-content-between" style="font-size: 16px; font-weight: bold">
                                <p>Total</p>
                                <p>Rp3.000.000,00</p>
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
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){  
            alert("payment success!"); console.log(result);
            window.location = 'http://127.0.0.1:8000/';
        },
        onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); 
            console.log(result);
        },
        onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
        },
        onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
        }
    })
    });
</script>
@endsection