@extends('frontend.bprkotamagelang.layout.main')

@section('content')
    <style>
        /* Card Produk */
        .team-box {
            margin-bottom: 30px;
        }

        .tabungan-img {
            width: 100%;
            height: 400px;
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

    <!-- <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center">
            <img src="{{ asset('frontend/bprtemanggung/assets/img/produk/deposito.jpg') }}" alt="Breadcrumb" class="banner-img" />
        </div>
    </div> -->
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprkotamagelang/assets/img/banner/profile.jpeg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>

    <div class="team2 team-page sp" style="padding-top:50px; padding-bottom:60px;">
            <h5 class="display-4 wow fadeInDown" style="color: #000; text-align: center; font-size: 40px;" data-wow-delay="0.1s">PRODUK DEPOSITO</h5>
        <div class="container">
            <div class="row">

                @foreach ($deposito as $item)
                    <div class="col-lg-4 col-md-6 col-12">

                        <div class="team-box">

                            <a href="{{ route('detdeposito', $item->id) }}">

                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                    alt="{{ $item->title ?? 'deposito' }}" class="tabungan-img">

                            </a>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>
@endsection
