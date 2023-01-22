@extends('layout/template')

@section('title','Request Trip')

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

<form class="d-flex flex-column justify-content-center align-items-center my-5" method="POST" action="/requestTrip/{{ Auth::user()->id }}">
  @csrf
  @if ($errors->any())
  <p class="text-danger">{{ $errors->first() }}</p>
  @endif
  <div style="width: 35%">
    <div style="text-align:center">
        <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;" >Request an Event </p>
        <p>Please Provide the Following Information</p>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
          @php
              $disable = ""
            @endphp
            @if($trips->max_price)
            @php
              $disable = "disabled"
            @endphp  
              @endif
          @if($trips->max_price)
            @foreach($trips_place as $tp)
            @php
                $tp_id[] = $tp->place_id  
            @endphp
            @endforeach
            @livewire('province-place', ['selectedPlace' => $tp_id ])
            @else
            @livewire('province-place', ['selectedPlace' => null])
            @endif
          <div class="d-flex flex-row form-floating mb-3 w-100">
            <div class="form-control me-2" id="guest" style="width: 90%" >
                <input type="range" {{ $disable }} value="{{ $trips->total_guest }}" min="2" max="20" oninput="num.value = this.value" name="total_guest" class="w-100">   
            </div>
            <label for="guest">Number of Guest</label>
              <output class="form-control" style="width: 10%"  id="num">2</output>
          </div>
          <div class="d-flex flex-row mb-3 w-100" >
              <div class="form-floating me-1 w-100" >
                <input type="date" id="startdate" {{ $disable }} class="form-control" name="start_date" value="{{ $trips->start_date }}">
                <label for="startdate">Start Date</label>
              </div>
              <div class="form-floating ms-1 w-100" >
                <input type="date" id="enddate" {{ $disable }} class="form-control" name="end_date" value="{{ $trips->end_date }}">
                <label for="enddate">End Date</label>
              </div>
          </div>
          <div class="form-floating w-100">
            <textarea class="form-control mb-3" id="additional" style="height: 100px" {{ $disable }} placeholder="Enter Trip Plan" name="trip_plan">{{ $trips->trip_plan }}</textarea>
            <label for="additional">Trip Plan or Additional Information</label>
          </div>
          
          <div class="form-floating w-100 me-1 mb-3">
            <input type="number" class="form-control" id="price" {{ $disable }} placeholder="Enter Maximum Pricet" min="500000" step="50000" name="max_price" value="{{ $trips->max_price }}">
            <label for="price">Expected Price (Maximum)</label>
          </div>
          
    </div>
      @if($trips->max_price == null)
        <button class="btn text-white mb-3 w-100" type="submit" style="background-color: #3DA43A;">Submit</button>
        @endif
  </div> 
</form>
@endsection