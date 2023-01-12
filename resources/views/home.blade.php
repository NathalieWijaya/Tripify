@extends('layout/template')

@section('title','Home')

@section('content')

@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
<section>
    <div class="card" style="border-radius: 0px;border-width: 0px;"><img class="card-img w-100 d-block" src={{ asset('/storage/images/background.jpg') }} width="1193" height="638" style="filter: brightness(60%);border-radius: 0px;object-fit: cover;" />
        <div class="card-img-overlay">
            <h4 style="color: var(--bs-card-bg);font-size: 30px;margin-top: 223px;margin-left: 130px;text-align: left;">Live in moments that<br />matter.</h4>
            <a href='/tour' class="btn btn-primary" type="button" style="margin-left: 131px;margin-top: 25px;background: #3da43a;border-color: var(--bs-card-cap-bg);">Explore Now</a>
        </div>
    </div>
</section>
<section>
    <h1 style="font-size: 25px;text-align: center;margin-bottom: 15px;margin-top: 45px;">Popular Destinations</h1>
    <p style="text-align: center;">Our most favorite destinations you will love</p>
</section>
<section class="d-xl-flex justify-content-center" style="margin-bottom: 45px;">
    <div style="text-align: center;"><img src={{ asset('/storage/images/Kuta.jpg') }} width="340" height="340" style="object-fit: cover"/>
        <p style="margin-top: 10px;"><strong>Bali</strong></p>
    </div>
    <div style="margin-left: 20px;margin-right: 20px;"><img src={{ asset('/storage/images/DanauKelimutu.jpg') }} style="width: 340px;height: 340px;object-fit: cover;" />
        <p style="text-align: center;margin-top: 10px;"><strong>Nusa Tenggara Timur</strong></p>
    </div>
    <div><img src={{ asset('/storage/images/Monas.jpg') }} style="width: 340px;height: 340px;object-fit: cover;" />
        <p style="text-align: center;margin-top: 10px;"><strong>Jakarta</strong></p>
    </div>
</section>
<section class="d-xl-flex justify-content-center" style="background: #f8f7f7;">
    <div style="margin-top: 145px;margin-bottom: 145px;margin-right: 135px;">
        <h1 class="d-xxl-flex justify-content-xxl-start" style="font-size: 30px;">Decide your own trip</h1>
        <p>Create and customize your version of an ideal<br />trip and we&#39;ll make it happen!</p><button class="btn btn-primary" type="button" style="background: rgb(61,164,58);border-width: 0px;">Request Trip</button>
    </div>
    <div><img src={{ asset('/storage/images/compass.jpg') }} style="width: 507px;margin-top: 47px;margin-bottom: 47px;object-fit: cover;" width="507" height="366" /></div>
</section>
<section>
    <h1 class="text-center" style="margin-top: 45px;color: rgb(61,164,58);padding-left: 0px;font-size: 30px;margin-left: 0px;margin-bottom: 15px;">Tour Packages for You</h1>
    <p style="text-align: center;">Explore the nature</p>
    <section>
        <section class="d-xl-flex justify-content-center" style="margin-bottom: 45px;">
            <div style="text-align: center;"><img src={{ asset('/storage/images/Malioboro.jpg') }} width="390" height="340" style="width: 240px;height: 240px;object-fit: cover;" />
                <p style="margin-top: 10px;"><strong>Malioboro</strong></p>
            </div>
            <div style="margin-left: 20px;margin-right: 20px;"><img src={{ asset('/storage/images/PulauKomodo.jpg') }} style="width: 240px;height: 240px;object-fit: cover;" />
                <p style="text-align: center;margin-top: 10px;"><strong>Komodo Island</strong></p>
            </div>
            <div><img src={{ asset('/storage/images/LabuanBajo.jpg') }} style="width: 240px;height: 240px;object-fit: cover;" />
                <p style="text-align: center;margin-top: 10px;"><strong>Labuan Bajo</strong></p>
            </div>
            <div><img src={{ asset('/storage/images/PantaiPink.jpg') }} style="width: 240px;height: 240px;margin-left: 20px;object-fit: cover;" />
                <p style="text-align: center;margin-top: 10px;"><strong>Pantai Pink</strong></p>
            </div>
        </section>
    </section>
</section>
@endsection
