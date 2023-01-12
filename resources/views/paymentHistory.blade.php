@extends('layout/template')

@section('title','Payment History')

@section('content')
<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">

        <h3 style="color: #3DA43A; font-family: 'Comfortaa';" class="mb-4">Payment History</h3>

        
        <table class="table">
            <tr style="background-color: #EFF5EE; color: #1C651A;">
                <td>No</td>
                @if(Auth::user()->is_admin == true)
                    <td>User Email</td>
                @endif
                <td>Transaction ID</td>
                <td>Total</td>
                <td>Time</td>
                <td></td>
            </tr>

            @foreach ($history as $key => $h)
            <tr>
                <td>{{ $history->firstItem() + $key }}</td>
                @if(Auth::user()->is_admin == true)
                    <td>{{$h->user->email}}</td>
                @endif
                <td>{{$h->id}}</td>
                <td>
                    @php
                        echo "Rp". number_format($h->total_price , 2, ",", ".");
                    @endphp
                </td>
                <td>{{$h->transaction_time}}</td>
                <td><button class="p-0 m-0 bg-transparent border-0 text-primary" data-bs-toggle="modal" data-bs-target="#modal{{$h->id}}"><u>Details</u></button></td>
            </tr>


            <div class="modal fade modal-lg" id="modal{{$h->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Transaction Details</h1>
                        </div>

                        <div class="mt-3 mx-3">
                            <p class="mb-1" style="font-weight: 600">Transaction ID: {{$h->id}}</p>
                            <p>{{$h->transaction_time}}</p>

                            <div >
                                <div class="row py-2 border-bottom" style="background-color: #EFF5EE; color: #1C651A; margin-left:1px; margin-right: 1px">
                                    <div class="col-1">No</div>
                                    <div class="col">Tour Name</div>
                                    <div class="col-2">Quantity</div>
                                    <div class="col">Price</div>
                                    <div class="col">Total Price</div>
                                </div>
                                @php
                                    $j = 1;
                                @endphp
                                @foreach ($h->transactionDetail as $d)
                                    <div class="row py-2 border-bottom" style="margin-left:1px; margin-right: 1px">
                                        <div class="col-1">{{$j}}</div>
                                        <div class="col">{{$d->tour->tour_title}}</div>
                                        <div class="col-2">{{$d->quantity}}</div>
                                        <div class="col">
                                            @php
                                                echo "Rp". number_format($d->tour->price, 2, ",", ".");
                                            @endphp
                                        </div>
                                        <div class="col">
                                            @php
                                                echo "Rp". number_format($d->tour->price * $d->quantity , 2, ",", ".");
                                            @endphp
                                        </div>
                                    </div>
                                    @php
                                        $j++;
                                    @endphp
                                @endforeach
                            </div>
                            <div class="row py-2" style="margin-left:1px; margin-right: 1px">
                                <div class="col-1"></div>
                                <div class="col"></div>
                                <div class="col-2"></div>
                                <div class="col"  style="font-weight: 600">Total</div>
                                <div class="col" style="font-weight: 600">
                                    @php
                                        echo "Rp". number_format($h->total_price , 2, ",", ".");
                                    @endphp
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn text-white"  style="background-color: #3DA43A;" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </table>

        <div class="d-flex flex-row justify-content-end">
            {{$history->links()}}
        </div>

    </div>
</div>

@endsection