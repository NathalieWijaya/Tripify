@extends('layout/template')

@section('title','Add Destination')
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
@section('add', 'black')

@section('content')

<form class="d-flex flex-column justify-content-center align-items-center my-5" method="POST" action="/addProv" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
      <p class="text-danger">{{ $errors->first() }}</p>
    @endif
    <div style="width: 50%" class="mb-3 mt-3">
        <div style="text-align:center">
            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;">Add Province</p>
            <p>Please Provide the Following Information</p>
        </div>

        <div class="form-floating mb-4 w-100" style="width: 90%" >
                <input type="text" name="prov" id="prov" class=" w-100 form-control" placeholder="Province">
            <label for="prov">Province Name</label>
        </div>
        <button class="btn text-white mb-5 w-100" type="submit" style="background-color: #3DA43A;">Save</button>
    </div>
</form>
@endsection