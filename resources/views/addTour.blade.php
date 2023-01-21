@extends('layout/template')

@section('title','Add Tour')

@section('content')

<form class="d-flex flex-column justify-content-center align-items-center my-5" method="POST">
  @if($current_tour->tour_title)
    @method('PATCH')
  @endif
    @csrf
    @if ($errors->any())
    <p class="text-danger">{{ $errors->first() }}</p>
    @endif
    <div style="width: 35%">
        <div style="text-align:center">
            @if($current_tour->tour_title)
            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;">Edit Tour </p>
            @else
            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;">Add a Tour </p>
            @endif
            <p>Please Provide the Following Information</p>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="form-floating w-100 me-1 mb-3">
                <input type="text" class="form-control" id="title" placeholder="Tour title" name="title" value="{{ $current_tour->tour_title }}">
                <label for="title">Tour Header</label>
            </div>
            @if($current_tour->tour_title)
            @foreach($current_tour_place as $current_place)
            @php
                $current_place_id[] = $current_place->place_id  
            @endphp
            @endforeach
            @livewire('province-place', ['selectedPlace' => $current_place_id ])
            @else
            @livewire('province-place', ['selectedPlace' => null])
            @endif

            <div class="form-floating w-100">
                <textarea class="form-control mb-3" id="additional" style="height: 100px" placeholder="Enter Desc" name="description">{{ $current_tour->description }}</textarea>
                <label for="additional">Description</label>
            </div>

            <div class=" mb-3 w-100">
                <label for="province">Choose Tour Category</label>
                <select multiple class="form-select form-control" id="province" name="category[]">

                    @foreach ($category as $cate )
                    @php
                    $selected_category = ""
                    @endphp
                    @foreach ($current_tour_category as $current_category )

                    @if($cate->id == $current_category->category->id)
                    @php
                    $selected_category = "selected"
                    @endphp

                    @endif
                    @endforeach
                    <option {{ $selected_category }} value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-row form-floating mb-3 w-100">
                <div class="form-control me-2" id="guest" style="width: 90%">
                    <input type="range" value="{{ $current_tour->max_slot }}" min="2" max="100" oninput="num.value = this.value" name="max_slot" class="w-100">
                </div>
                <label for="max_slot">Slot</label>
                <output class="form-control" style="width: 10%" id="num">{{ $current_tour->max_slot }}</output>
            </div>
            <div class="d-flex flex-row mb-3 w-100">
                <div class="form-floating me-1 w-100">
                    <input type="date" id="startdate" class="form-control" name="start_date" value="{{ $current_tour->start_date }}">
                    <label for="startdate">Start Date</label>
                </div>
                <div class="form-floating ms-1 w-100">
                    <input type="date" id="enddate" class="form-control" name="end_date" value="{{ $current_tour->end_date }}">
                    <label for="enddate">End Date</label>
                </div>
            </div>
            <div class="form-floating w-100">
                <textarea class="form-control mb-3" id="additional" style="height: 100px" placeholder="Enter Trip Plan" name="highlights">{{ $current_tour->highlights }}</textarea>
                <label for="additional">Highlights</label>
            </div>
            <div class="form-floating w-100">
                <textarea class="form-control mb-3" id="additional" style="height: 100px" placeholder="Enter Trip Plan" name="include">{{ $current_tour->include }}</textarea>
                <label for="additional">Include</label>
            </div>
            <div class="form-floating w-100">
                <textarea class="form-control mb-3" id="additional" style="height: 100px" placeholder="Enter Trip Plan" name="not_include">{{ $current_tour->not_include }}</textarea>
                <label for="additional">Not Include</label>
            </div>
            <div class="form-floating w-100">
                <textarea class="form-control mb-3" id="additional" style="height: 100px" placeholder="Enter Trip Plan" name="itinerary">{{ $current_tour->itinerary }}</textarea>
                <label for="additional">Itinerary</label>
            </div>
            <div class="form-floating w-100 me-1 mb-3">
                <input type="number" class="form-control" id="price" placeholder="Enter Maximum Pricet" min="50000" step="25000" name="price" value="{{ $current_tour->price }}">
                <label for="price">Price</label>
            </div>
        </div>
        <button class="btn text-white mb-3 w-100" type="submit" style="background-color: #3DA43A;">Submit</button>
    </div>
</form>
@endsection
