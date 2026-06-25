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
        }
    </style>

    <!-- <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center">
            <img src="{{ asset('frontend/bprtemanggung/assets/img/produk/deposito.jpg') }}" alt="Breadcrumb" class="banner-img" />
        </div>
    </div> -->

    <div class="team2 team-page sp" style="padding-top:50px; padding-bottom:60px;">
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
