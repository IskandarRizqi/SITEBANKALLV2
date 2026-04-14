@extends('frontend.bprtanadoang.layout.main')

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

    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(frontend/bprtanadoang/img/profil/top.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Produk Tabungan</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Produk Tabungan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>



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
