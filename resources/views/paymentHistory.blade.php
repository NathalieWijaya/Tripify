@extends('layout/template')

@section('title','Payment History')

@section('content')
<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">

        <h3 style="color: #3DA43A; font-family: 'Comfortaa';">Payment History</h3>

        
        <table class="table mt-4">
            <tr style="background-color: #EFF5EE; color: #1C651A;">
                <td>No.</td>
                <td>Transaction ID</td>
                <td>Total</td>
                <td>Time</td>
            </tr>

            @php
                $i = 1;
            @endphp
            @foreach ($history as $h)
            <tr>
                <td>{{$i}}</td>
                <td>{{$h->id}}</td>
                <td>{{$h->total_price}}</td>
                <td>{{$h->transaction_time}}</td>
                @php
                    $i++;
                @endphp
            </tr>
            @endforeach

        </table>

    </div>
</div>

@endsection