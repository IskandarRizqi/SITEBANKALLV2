@extends('frontend.nusaintim.layout.main')

@section('content')

<style>
    .common-hero {
        background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
        background-size: contain;
        /* default untuk desktop */
        background-position: center;
        color: #fff;
        padding: 40px 0;
        position: relative;
        margin-top: 70px;
        /* jarak dari navbar */
        text-align: center;
        /* teks ke tengah */
    }

    /* Versi Mobile */
    @media (max-width: 768px) {
        .common-hero {
            background: url('{{ asset(env(' GLOBAL_TOPMOBILE')) }}') no-repeat center center;
            background-size: cover;
            /* gambar diperbesar biar penuh */
            min-height: 180px;
            /* tinggi hero agar kelihatan besar */
            display: flex;
            align-items: center;
            /* teks di tengah vertikal */
            justify-content: center;
            /* teks di tengah horizontal */
            padding: 0;
            /* hilangkan padding default */
        }

        .common-hero h1,
        .common-hero h2,
        .common-hero .title {
            font-size: 20px;
            /* sesuaikan ukuran teks agar pas di mobile */
            font-weight: bold;
            color: #000;
            /* atau putih jika kontras dengan background */
        }
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* jumlah baris yang ditampilkan */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-content {
        max-width: 100%;
        overflow-x: auto;
        /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
        word-wrap: break-word;
        /* biar teks panjang gak keluar area */
        line-height: 1.6;
        /* biar enak dibaca */
        text-align: justify;
        font-family: 'Archivo', sans-serif;
    }
</style>


<div class="common-hero">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-8 m-auto">
                <div class="main-heading">
                    <h1 style="font-size: 35px;">KEGIATAN EVENT</h1>
                    <span class="span"><img src="{{asset('frontend/bprjas/assets/img/icons/span1.png')}}" alt=""> <a
                            href="/">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span>
                        Kegiatan Event <span class="arrow">
                </div>
            </div>
        </div>
    </div>
</div>



<!--=====SERVICE DETAILS AREA START=======-->

<div class="service-details-area-all sp">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 ">
                <div class="service-details-post">
                    <article>
                        <div class="details-post-area" style="padding:10px; max-width:100%; overflow-x:hidden;">
                            <div id="eventCarousel{{ $event->id }}" class="carousel slide mb-3" data-bs-ride="carousel"
                                data-bs-interval="3000">
                                <div class="carousel-inner">
                                    @foreach($multibaner as $index => $banner)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="/recfil?display=true&rf={{ $banner->url}}" class="d-block w-100"
                                            alt="Banner {{ $index+1 }}"
                                            style="height:440px; object-fit:cover; border-radius:5px;">
                                    </div>
                                    @endforeach
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#eventCarousel{{ $event->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#eventCarousel{{ $event->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>


                            <div class="social-users">
                                <ul>
                                    {{-- <li><a href="#"><img
                                                src="{{ asset('frontend/bprjas/assets/img/icons/user-icon1.png') }}"
                                                alt=""> {{Event}}</a></li> --}}
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/bprjas/assets/img/icons/user-icon2.png') }}"
                                                alt=""> {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y')
                                            }}</a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/bprjas/assets/img/icons/user-icon3.png') }}"
                                                alt=""> {{$event->tag}}</a></li>
                                </ul>
                            </div>
                            <br>
                            <div class="heading1">
                                <h3>{{ $event->title }}</h3>
                                <div class="space16"></div>
                                <div class="event-content">
                                    {!! $event->content !!}
                                </div>
                            </div>
                        </div>

                    </article>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12">

                <div class="sidebar-box-area sidebar-bg mb-40">
                    <h3>Event Lain</h3>
                    <div class="sidebar-blog-boxs">
                        @foreach($other_event as $item)
                        <div class="sidebar-blogs">
                            <div class="image">
                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title }}"
                                    style="border-radius:5px;">
                            </div>
                            <div class="heading">
                                <a href="{{ route('detevent', $item->id) }}" class="date">
                                    <img src="{{ asset('frontend/bprjas/assets/img/icons/date.png') }}" alt="">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </a>
                                <h5>
                                    <a href="{{ route('detevent', $item->id) }}">
                                        <p class="mb-0 fw-bold text-truncate-2">{{ $item->title }}</p>
                                    </a>
                                </h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--=====SERVICE DETAILS AREA END=======-->





@endsection