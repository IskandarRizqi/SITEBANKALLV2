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


    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Produk kredit</h2>
                </div>

            </div>
        </div>
    </div>

    {{-- <!-- Banner -->
    <div style="width:90%; overflow:hidden; margin:auto;">
        <img src="{{ asset('frontend/bprtaruna/assets/img/produk/kredit/kredit.png') }}"
            style="object-fit: fill; height: auto; margin-top: 75px; width:100%;" alt="Banner" class="banner-img">
    </div> --}}


    <div class="team2 team-page sp" style="padding-top: 50px;">
        <div class="container">

            <div class="row">
                @foreach ($kredit as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-box">
                            <div class="image-area">
                                <div class="image">
                                    <a href="{{ route('detkredit', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title ?? 'kredit' }}"
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
