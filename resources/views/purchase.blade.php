@extends('layout/template')

@section('title','Purchase')

@section('content')
<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa'; ">Purchase</h3>

      
        <div class="mt-5">
            <div class="d-flex flex-row mb-0">
                <h5 class="mb-0 me-5" style="">Credit/Debit Card</h5>
                <img src="/asset/card.png" height="25px">
            </div> 

            <div class="d-flex flex-row justify-content-between" >
                <form class="w-50">
                    <div class="row mt-4 mb-3">
                        <div class="col-6">
                            <input type="text" class="form-control" required placeholder="Card number">
                        </div>

                        <div class="col-6">
                            <div class="row gx-2">
                                <div class="col-3">
                                    <input type="text" class="form-control" required placeholder="MM">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" required placeholder="YY">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" required placeholder="Cardholder name" >
                        </div>
                        <div class="col-3 pe-1">
                            <input type="text" class="form-control" required placeholder="CVV">
                        </div>
                    </div>
                </form>
            

                <div class="border rounded" style="width: 30%">
                    <div class="m-3">
                        <div class="d-flex flex-row justify-content-between" style="font-size: 16px; font-weight: bold">
                            <p>Total:</p>
                            <p>Rp3.000.000,00</p>
                        </div>
                        <button class="btn form-control text-white" style="background-color: #00A651">Pay</button>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="my-5" >
            <h5 class="mb-4">Details</h5>
          
            <div class="d-flex flex-row">
                <div style="width: 20%">
                    <img src="/asset/nusapenida.jpg" width="200px" height="200px" style="object-fit: cover;">
                </div>
                <div class="ms-4 my-3 d-flex flex-row justify-content-between align-items-end" style="width: 80%">
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

            <hr class="my-4">

            <div class="d-flex flex-row">
                <div style="width: 20%">
                    <img src="/asset/nusapenida.jpg" width="200px" height="200px" style="object-fit: cover;">
                </div>
                <div class="ms-4 my-3 d-flex flex-row justify-content-between align-items-end" style="width: 80%">
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
    </div>
</div>

@endsection