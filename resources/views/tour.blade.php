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
            <div class="col">
                <h3 class="mb-4" style="color: #3da43a; font-family: 'Comfortaa'; font-weight: bold">Tours</h3>



                <form class="" id="filter" action="/tour/filter" method="POST">
                    @csrf
                    <div class="d-flex flex-row mb-3">
                        <div class=" me-4 col form-floating">
                            <select {{$disabled}} class="form-select form-control" name="province">
                                <option selected value="all">All</option>
                                @foreach($province as $p)
                                @php
                                $selectedP = "";
                                @endphp
                                @if ($p->id == $selectedProvince)
                                @php
                                $selectedP = "selected";
                                @endphp
                                @endif
                                <option value="{{$p->id}}" {{$selectedP}}>{{$p->province_name}}</option>
                                @endforeach
                            </select>
                            <label>Province</label>
                        </div>
                        <div class=" me-4 col form-floating">
                            <select {{$disabled}} class="form-select form-control" name="category">
                                <option selected value="all">All</option>
                                @foreach($category as $c)
                                @php
                                $selected = "";
                                @endphp
                                @if ($c->id == $selectedCategory)
                                @php
                                $selected = "selected";
                                @endphp
                                @endif
                                <option value="{{$c->id}}" {{$selected}}>{{$c->category_name}}</option>
                                @endforeach
                            </select>
                            <label>Category</label>
                        </div>
                        <div class="d-flex flex-row align-items-center form-floating">
                            @php
                                $selectedasc = "";
                                $selecteddesc = "";
                                $selectedmin = "";
                                $selectedmax = "";
                                @endphp
                            <select class="form-select form-control sort" name="sort">
                                @if ($selectedSort == "asc")
                                @php
                                $selectedasc = "selected";
                                $selecteddesc = "";
                                $selectedmin = "";
                                $selectedmax = "";
                                @endphp
                                @elseif ($selectedSort == "desc")
                                @php
                                $selectedasc = "";
                                $selecteddesc = "selected";
                                $selectedmin = "";
                                $selectedmax = "";
                                @endphp
                                @elseif($selectedSort == "min")
                                @php
                                $selectedasc = "";
                                $selecteddesc = "";
                                $selectedmin = "selected";
                                $selectedmax = "";
                                @endphp
                                @elseif($selectedSort == "max")
                                @php
                                $selectedasc = "";
                                $selecteddesc = "";
                                $selectedmin = "";
                                $selectedmax = "selected";
                                @endphp
                                @endif
                                <option class="dropdown-item sort" selected value="all">All</option>
                                <option class="dropdown-item sort" {{ $selectedasc }} value="asc">Ascending</option>
                                <option class="dropdown-item sort" {{ $selecteddesc }} value="desc">Descending</option>
                                <option class="dropdown-item sort" {{ $selectedmin }} value="min">Price (Low-High)
                                </option>
                                <option class="dropdown-item sort" {{ $selectedmax }} value="max">Price (High-Low)
                                </option>
                            </select>
                            <label>Sort By</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button {{$disabled}} name="search" class="btn form-control text-white"
                            style="width: 100px; background-color: #3DA43A;" type="submit">Search</button>
                    </div>

                </form>

                <div class="row mt-4 content" style="font-size: 15px;">
                    @foreach ($tour as $t)
                    @if($selectedCategory == null)
                    <a class="col-lg-4 mb-3 text-black" href="/tour/{{$t->id}}" style="text-decoration: none;">
                    @elseif($selectedCategory == "all")
                    <a class="col-lg-4 mb-3 text-black" href="/tour/{{$t->id}}" style="text-decoration: none;">
                    @else
                    <a class="col-lg-4 mb-3 text-black" href="/tour/{{$t->tour_id}}" style="text-decoration: none;">
                    @endif
                    @if($selectedCategory == null)    
                    @foreach ($t->tourPlace as $tp)
                    <img src="{{ asset('storage/images/'. $tp->place->place_image) }}" height=235 width=235 />
                    @break
                    @endforeach
                    @elseif($selectedCategory == "all")
                    @foreach ($t->tourPlace as $tp)
                    <img src="{{ asset('storage/images/'. $tp->place->place_image) }}" height=235 width=235 />
                    @break
                    @endforeach
                    @else
                    @foreach ($tourPlaces as $tp)
                    @if($tp->tour_id == $t->tour_id )
                    <img src="{{ asset('storage/images/'. $tp->place_image) }}" height=235 width=235 />
                    @break
                    @endif
                    @endforeach
                        @endif
                        <p class="mt-2 mb-2" style="font-weight: bold">{{ $t->tour_title }}</p>
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

@endsection