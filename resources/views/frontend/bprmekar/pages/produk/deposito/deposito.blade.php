@extends('frontend.bprsms.layout.main')

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

     <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Deposito</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Produk</a></li>
                        <li>Deposito</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
