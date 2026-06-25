@extends('frontend.bprsms.layout.main')

@section('content')
    <style>
        .justify-text {
            text-al ign: justify;
        }
    </style>
    <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Pengurus</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Profil</a></li>
                        <li>Pengurus</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s">
                    @if ($pengurus)
                        <article>
                            <div class="details-post-area">
                                {{-- <div class="image" style="text-align:center;">
                                    <img src="/recfil?display=true&rf={{ $pengurus->banner }}" alt="{{ $pengurus->title }}"
                                        style="border-radius:8px; height: 800px; width: 900px;">
                                </div> --}}
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
    </div>
    </div>


    <!-- ##### About Area End ###### -->
@endsection
