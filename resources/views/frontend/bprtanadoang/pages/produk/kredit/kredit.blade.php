@extends('frontend.bprtanadoang.layout.main')

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


    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(frontend/bprtanadoang/img/profil/top.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Produk Kredit</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Produk Kredit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="team2 team-page sp" style="padding-top:50px; padding-bottom:60px;">
        <div class="container">

            <div class="row">

                @foreach ($kredit as $item)
                    <div class="col-lg-4 col-md-6 col-12">

                        <div class="team-box">

                            <a href="{{ route('detkredit', $item->id) }}">

                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                    alt="{{ $item->title ?? 'kredit' }}" class="kredit-img">

                            </a>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
