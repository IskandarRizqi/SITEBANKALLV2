@extends('frontend.bprbahari.layout.main')

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
            <li class="active">Sejarah</li>
        </ul>
        <hr>
        <div class="col-lg-12">
            <h2 style="text-align: center;">Sejarah</h2>
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
                                <img src="frontend/bprbahari/assets/img/illustration/1.png" alt="Thumb">
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
