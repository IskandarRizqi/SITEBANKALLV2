@extends('frontend.bprrudo.layout.main')

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

        /* Responsive Running Text */
        .running-text {
            color: rgb(250, 109, 109);
           
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media(max-width:768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }
    </style>


    <!-- Banner -->
    <div style="width:100%; overflow:hidden; margin-top:100px;">
        <img src="{{ asset('frontend/bprrudo/assets/img/produk/deposito/deposito.png') }}"
            style="object-fit: fill; height: auto;" alt="Banner" class="banner-img">
    </div>

    <!-- Running Text -->
    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES
                BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES
                BERSAMA NASABAH -
            </span>
        </div>
    </div>


    <div class="team2 team-page sp" style="padding-top: 0PX">
        <div class="container">
            <br>
            <h2 style="text-align: center; font-weight: bold; margin-bottom: 30px; color: #A62C3D;">Produk Deposito</h2>
            <div class="row">
                @foreach ($deposito as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-box">
                            <div class="image-area">
                                <div class="image">
                                    <a href="{{ route('detdeposito', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title ?? 'deposito' }}"
                                            style=" object-fit: fill; height: 400px; width: 320px; border-radius: 15px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>
    </div>
@endsection
