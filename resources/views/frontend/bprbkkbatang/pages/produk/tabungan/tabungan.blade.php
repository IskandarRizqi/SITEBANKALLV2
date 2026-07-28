@extends('frontend.bprbkkbatang.layout.main')

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

        .tabungan-img {
            width: 80%;
            height: 200px;
            object-fit: fill;
            border-radius: 15px;
            transition: 0.3s;
        }

        .tabungan-img:hover {
            transform: scale(1.03);
        }

        /* Mobile */
        @media(max-width:768px) {
            .tabungan-img {
                height: auto;
            }

            .col-lg-4 {
                text-align: center;
            }
        }
    </style>

    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprbkkbatang/assets/img/banner/profile.jpeg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>


    <div class="team2 team-page sp">
    <h5 class="display-4 wow fadeInDown" style="color: #000; text-align: center; margin-top: 30px;" data-wow-delay="0.1s">PRODUK TABUNGAN</h5>
        <div class="container">

            <!-- <div class="row">
                @foreach ($tabungan as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-box">
                            <div class="image-area">
                                <div class="image">
                                    <a href="{{ route('dettabungan', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title ?? 'tabungan' }}"
                                            class="tabungan-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> -->

            <div class="col-lg-4 col-md-6 col-12">
                    <div class="team-box">
                        
                        <img src="frontend/bprbkkbatang/assets/img/produk/ikontab.png" alt="Tabungan" class="tabungan-img">
                    
                    </div>
                </div>
        </div>
    @endsection
