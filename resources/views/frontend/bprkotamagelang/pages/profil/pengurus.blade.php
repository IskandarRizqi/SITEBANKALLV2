@extends('frontend.bprkotamagelang.layout.main')

@section('content')
    <style>
        .justify-text {
            text-al
            ign: justify;
        }
        
    </style>
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprkotamagelang/assets/img/banner/profile.jpeg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>

    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="titleText" style="text-align: center;">
                        <h4>SUSUNAN PENGURUS</h4>
                        <p>PT BPR BKK KOTA MAGELANG (PERSERODA)</p>
                    </div>
                    <div class="isiText">
                        <b>1. Direksi</b>
                        <br>
                        Direktur Utama      : Bonang Hari Priyatno, SE 
                        <br>
                        Direktur Pemasaran  : Sri Haryanto, SH
                        <br>
                        <br>
                        <b>2. Dewan Komisaris</b>
                        <br>
                        Komisaris Utama : - <br>
                        Komisaris       : Saleh Apriyanto, SE, M.Si
                    </div>


                </div>
            </div>

        </div>
    </div>
    <!-- <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s">
                 @if ($pengurus)
                        <article>
                            <div class="details-post-area">
                                <div class="image" style="text-align:center;">
                                    <img src="/recfil?display=true&rf={{ $pengurus->banner }}" alt="{{ $pengurus->title }}"
                                        style="border-radius:8px; height: 800px; width: 900px;">
                                </div>
                                <div class="space30"></div>
                                <div class="heading1">
                                    <div class="event-content">
                                        {!! $pengurus->content !!}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @else
                        <div class="alert alert-warning text-center">
                            Data tidak ditemukan.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div> -->
    </div>


    <!-- ##### About Area End ###### -->
@endsection
