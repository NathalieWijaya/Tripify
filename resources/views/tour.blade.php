@extends('layout/template')

@section('title','Tour')

@section('content')
<section class="d-flex justify-content-start" style="margin-left: 150px;margin-top: 20px;margin-bottom: 20px">
    <div style="font-size: 16px;margin-left: 0px;margin-right: 0px;padding-right: 0px;padding-left: 0px;">
        <p>BROWSE BY PROVINCE</p>
        <a class="nav-link text-black" style="margin-bottom: 10px" href="/tour">All Items</a>
        <a class="nav-link text-black" style="margin-bottom: 10px" href="/tour-bali?tourData=Bali">Bali</a>
        <a class="nav-link text-black" style="margin-bottom: 10px" href="/tour-yogyakarta?tourData=Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</a>
        <a class="nav-link text-black" style="margin-bottom: 10px" href="/tour-ntt?tourData=Nusa Tenggara Timur">Nusa Tenggara Timur</a>
        <a class="nav-link text-black" style="margin-bottom: 10px" href="/tour-jakarta?tourData=Jakarta">Jakarta</a>
        <div class="dropdown"><button class="btn btn-primary dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown" type="button" style="background: #3da43a;border-width: 0px;border-radius: 6px;margin-top: 20px;">Category</button>
            <div class="dropdown-menu" data-bs-popper="none">
                <a class="dropdown-item" href="/tour-beach?tourData=Beach">Beach</a>
                <a class="dropdown-item" href="/tour-camping?tourData=Camping">Camping</a>
                <a class="dropdown-item" href="/tour-daytrip?tourData=Day Trip">Day Trip</a>
                <a class="dropdown-item" href="/tour-hiking?tourData=Hiking">Hiking</a>
                <a class="dropdown-item" href="/tour-island?tourData=Island">Island</a>
                <a class="dropdown-item" href="/tour-longtrip?tourData=Long Trip">Long Trip</a>
                <a class="dropdown-item" href="/tour-mountain?tourData=Mountain">Mountain</a>
                <a class="dropdown-item" href="/tour-park?tourData=Park">Park</a>
                <a class="dropdown-item" href="/tour-shorttrip?tourData=Short Trip">Short Trip</a>
                <a class="dropdown-item" href="/tour-snorkeling?tourData=Snorkeling">Snorkeling</a>
                <a class="dropdown-item" href="/tour-temple?tourData=Temple">Temple</a>
            </div>
        </div>
    </div>
    <div style="margin-left: 100px;padding-right: 0px;margin-right: 0px;">
        <h1 style="font-size: 30px;color: #3da43a;margin-bottom: 15px;">Shop All</h1>
        <p style="margin-bottom: 20px;">Results:</p>
        <div class="d-flex justify-content-start">
            @foreach ($tourData as $item)
            <div style="margin-right: 20px;"><img src={{ $item->place_image }} style="width: 240px;height: 240px;margin-right: 0px;" />
                <p style="margin-top: 10px;">{{ $item->tour_title }}</p>
                <p>{{ $item->price }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
