@extends('frontend.bprbhaktiriyadi.layout.main')

@section('content')
<style>
    /* Banner */
    .banner-img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
    }

    @media(max-width:768px) {
        .banner-img {
            height: 260px;
        }
    }

    /* Card Kredit */
    .team-box {
        margin-bottom: 30px;
    }

    .kredit-img {
        width: 100%;
        height: 400px;
        object-fit: fill;
        border-radius: 15px;
        transition: 0.3s;
    }

    .kredit-img:hover {
        transform: scale(1.03);
    }

    /* Mobile */
    @media(max-width:768px) {
        .kredit-img {
            height: auto;
        }
    }
</style>

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprbhaktiriyadi/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Kredit</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Produk</a></li>
                    <li>Kredit</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="team2 team-page sp" style="padding-top:50px; padding-bottom:60px;">
    <div class="container">

        <div class="row">

            @foreach ($kredit as $item)
            <div class="col-lg-4 col-md-6 col-12">

                <div class="team-box">

                    <a href="{{ route('detkredit', $item->id) }}">

                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title ?? 'kredit' }}"
                            class="kredit-img">

                    </a>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</div>
@endsection