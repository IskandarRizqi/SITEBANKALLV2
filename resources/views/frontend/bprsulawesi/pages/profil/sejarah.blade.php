@extends('frontend.bprsulawesi.layout.main')

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
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }
    </style>
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url(frontend/bprsulawesi/assets/img/profil/banertop.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Sejarah</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Profil</a></li>
                        <li class="active">Sejarah</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="choose-us-area overflow-hidden reverse default-padding-bottom" style="margin-top: 100px">
        <div class="container">
            <div class="row align-center">

                @if ($sejarah)
                    <div class="col-lg-6 info wow fadeInUp">
                        <h5>{{ $sejarah->title }}</h5>
                        <div style="text-align: justify;">
                            {!! $sejarah->content !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInRight" data-wow-delay="0.6s">
                            @if ($sejarah->banner)
                                <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="{{ $sejarah->title }}"
                                    style="width: 100%; object-fit: cover;">
                            @else
                                <img src="frontend/bprsulawesi/assets/img/illustration/1.png" alt="Thumb">
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
