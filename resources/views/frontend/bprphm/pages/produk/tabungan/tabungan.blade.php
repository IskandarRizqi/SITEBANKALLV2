@extends('frontend.bprphm.layout.main')

@section('content')
       <style>
        @media (max-width:768px) {

            .col-lg-4.col-md-6 {
                padding-left: 25px;
                padding-right: 25px;
                margin-bottom: 20px;
                text-align: center;
            }

            .col-lg-4.col-md-6 img {
                width: 90% !important;
                height: auto !important;
                margin: auto;
                display: block;
            }
        }
    </style>

    {{-- <!-- Banner -->
    <div style="width:100%; overflow:hidden; ">
        <img src="{{ asset('frontend/bprtaruna/assets/img/produk/tabungan/tabungan.png') }}" alt="Banner" 
            style="object-fit: fill; height: auto; margin-top: 75px;" class="banner-img">
    </div> --}}

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Produk Tabungan</h2>
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
