@extends('frontend.bprtaruna.layout.main')

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
    <div style="width:100%; overflow:hidden; ">
        <img src="{{ asset('frontend/bprtaruna/assets/img/produk/kredit/kredit.png') }}" style="object-fit: fill; height: auto; margin-top: 75px;"
            alt="Banner" class="banner-img">
    </div>

 
    <div class="team2 team-page sp" style="padding-top: 50px;">
        <div class="container">
            <br>
            <h2 style="text-align: center; font-weight: bold; margin-bottom: 30px; color: #000000;">Produk Kredit</h2>
            <div class="row">
                @foreach ($kredit as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-box">
                            <div class="image-area">
                                <div class="image">
                                    <a href="{{ route('detkredit', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title ?? 'kredit' }}"   style=" object-fit: fill; height: 400px; width: 320px; border-radius: 15px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
