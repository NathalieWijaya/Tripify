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
<style>
.bi-chevron-up {
    transition: all 0.3s ease;
 }
.collapsed .bi-chevron-up {
  transform: rotate(180deg);
}
</style>

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <div class="row">
            <div class="col-3 me-4" style="font-size: 15px;">
            <!-- <label class="form-label">Search</label> -->
                   
                <p style="font-weight: bold">Browse by Province</p>
                <a class="nav-link text-black mb-3" value="all" href="/tour" style="{{ $selectedProv == 'all' ? 'font-weight: bold;  ' : ''}}">All Tours</a>
                @foreach($province as $p)
                    <a class="nav-link text-black mb-3" style="{{ $selectedProv == $p->id ? 'font-weight: bold; ' : ''}}" href="/tour/province/{{$p->id}}">{{$p->province_name}}</a>
                @endforeach
              
                <div class="mb-5 mt-4" id="filter">
                    <div class="mt-5" >
                        <p style="font-weight: bold">Browse by Category</p>
                        <p id="category" style="cursor: pointer; {{ $selectedCat == 'all' ? 'font-weight: bold; ' : ''}}" value="all">All Categories</p>
                        @foreach($category as $c)
                            <p id="category" style="cursor: pointer; {{ $selectedCat == $c->id ? 'font-weight: bold; ' : ''}}" class="dropdown-item" value="{{$c->id}}">{{$c->category_name}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col">
                <h3 class="mb-4" style="color: #3da43a; font-family: 'Comfortaa'; font-weight: bold">Tours</h3>

                <div class="d-flex flex-row justify-content-between align-items-center">

                    <p class="text-secondary m-0"><strong>{{count($tour)}} Results</strong></p>

                    <div class="d-flex flex-row align-items-center" >
                    <!-- <input type="text" id="search" class="form-control" name="search" placeholder="Search..."> -->
                        <label class="me-4" style="white-space: nowrap">Sort by:</label>
                        <select class="form-select form-control sort" >
                            <option selected value="all">All</option>
                            <option class="dropdown-item" value="asc">A-Z</option>
                            <option class="dropdown-item" value="desc">Z-A</option>
                            <option class="dropdown-item" value="min">Price (Low-High)</option>
                            <option class="dropdown-item" value="max">Price (High-Low)</option>
                        </select>
                    </div>
                </div>
                 
                <div class="row mt-4" style="font-size: 15px;">
                    @foreach ($tour as $t)
                    <a class="col-lg-4 mb-3 text-black" href="/tour/{{$t->id}}" style="text-decoration: none;">
                        @foreach ($t->tourPlace as $tp)
                            <img src="{{ asset('storage/images/'. $tp->place->place_image) }}" height=235 width=235 />
                            @break
                        @endforeach
                        <p class="mt-2 mb-2" style="font-weight: bold" >{{ $t->tour_title }}</p>
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
    $('.sort').on('click', function(){
        var sort_id = $(this).val();
        $.ajax({
            type: "get",
            data: {_method: 'get', _token: "{{csrf_token()}}"}
            url: "/tour/sort/" + sort_id,
            success: function (html) {
                location.reload();
            }
        })
    })
</script>   

@endsection
