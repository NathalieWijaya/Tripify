@extends('layout/template')

@section('title','Tour')

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
        <div class="row">
            <div class="col-3 me-4" style="font-size: 15px;">
                <p>Browse by Province</p>
                <a class="nav-link text-black mb-3" href="/tour" style="{{ $selectedProv == 'all' ? 'font-weight: bold' : ''}}">All Items</a>
                @foreach($province as $p)
                    <a class="nav-link text-black mb-3" style="{{ $selectedProv == $p->id ? 'font-weight: bold' : ''}}" href="/tour/province/{{$p->id}}">{{$p->province_name}}</a>
                @endforeach

                
                <!-- <div class="dropdown">
                    <button class="btn dropdown-toggle bg-danger" aria-expanded="true" data-bs-toggle="dropdown" type="button">Category</button>
                    <div class="dropdown-menu" data-bs-popper="none">
                        @foreach($category as $c)
                        <option class="dropdown-item" >{{$c->category_name}}</option>
                        @endforeach
                    </div>
                </div> -->
                <div class="mb-3 mt-4 d-flex flex-row justify-content-between border-top border-bottom" style="border: black">
                    <button  class="w-100 m-0 border-0 text-start bg-transparent py-2 d-flex justify-content-between flex-row" id="filter-btn" data-bs-toggle="collapse"  data-bs-target="#filter"  >
                        <div class="left">Filter</div>
                        <i class="bi bi-chevron-down rotate" ></i>
                    </button>
                </div>

                <div class="collapse" id="filter">
                    <select class="form-select">
                        <option id="category" selected value="all">All</option>
                        @foreach($category as $c)
                            <option id="category" class="dropdown-item" value="{{$c->id}}">{{$c->category_name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            
            <div class="col">
                <h3 class="mb-4" style="color: #3da43a; font-family: 'Comfortaa'; font-weight: bold">Shop All</h3>
                <p class="text-secondary"><strong>{{count($tour)}} Results</strong></p>
                <div class="row mt-4" style="font-size: 15px;">
                    @foreach ($tour as $t)
                    <a class="col-lg-4 mb-3 text-black" href="/tour/{{$t->id}}" style="text-decoration: none;">
                        @foreach ($t->tourPlace as $tp)
                            <img src="{{ asset('storage/images/'. $tp->place->place_image) }}" height=235 width=235 />
                            @break
                        @endforeach
                        <p class="mt-2 mb-2">{{ $t->tour_title }}</p>
                        <p>
                        @php
                            echo "Rp". number_format($t->price, 2, ",", ".");
                        @endphp
                        </p>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    $('#category').on('click', function(){
        var category_id = $(this).val();
        $.ajax({
            type: "post",
            data: {_method: 'post', _token: "{{csrf_token()}}"}
            url: "/"
        })
    })
</script>   

@endsection
