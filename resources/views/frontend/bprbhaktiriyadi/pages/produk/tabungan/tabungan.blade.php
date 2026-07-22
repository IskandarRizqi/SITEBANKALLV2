@extends('frontend.bprbhaktiriyadi.layout.main')

@section('content')
<style>
    /* Running text animation */
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .team-box {
        margin-bottom: 30px;
    }


    /* Responsive Banner */
    .banner-img {
        width: 100%;
        height: 500px;
        object-fit: fill;
        display: block;
    }

    @media(max-width:768px) {
        .banner-img {
            height: 260px;
            object-fit: cover;
        }
    }
</style>

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprbhaktiriyadi/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Tabungan</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Produk</a></li>
                    <li>Tabungan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="team2 team-page sp" style="padding-top: 50px">
    <div class="container">

        <div class="row">
            @foreach ($tabungan as $item)
            <div class="col-lg-4 col-md-6">
                <div class="team-box">
                    <div class="image-area">
                        <div class="image">
                            <a href="{{ route('dettabungan', $item->id) }}">
                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                    alt="{{ $item->title ?? 'tabungan' }}"
                                    style=" object-fit: fill; height: 400px; width: 320px; border-radius: 15px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection