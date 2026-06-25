@extends('frontend.bprman.layout.main')

@section('content')
    <style>
        .navbar,
        .navbar-area,
        .header-area,
        header {
            background: #fff !important;
            position: relative;
            z-index: 999;
        }

        .breadcrumb-area {
            margin-top: 100px;
            width: 100%;
            height: 150px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .breadcrumb {
            padding-left: 15px;
            margin-top: 20px
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }
    </style>
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url(frontend/bprman/assets/images/banner/profil.jpg);">
    </div>
        <ul class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Profil</a></li>/
            <li class="active">Pengurus</li>
        </ul>
        <hr>
        <div class="col-lg-12">
            <h2 style="text-align: center">Pengurus</h2>
        </div>
    <!-- start: About Section -->
    <section class="pxn-h1-about-section about-page">
        <div class="bg_shape pxn-fade" data-direction="left" data-delay="1.5"><img
                src="frontend/bprbahari/assets/images/about/h1-about-bg-shape.png" alt="Shape"></div>
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s" style="max-width: 1000px;">
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
    </section>
    <!-- end: About Section -->
@endsection
