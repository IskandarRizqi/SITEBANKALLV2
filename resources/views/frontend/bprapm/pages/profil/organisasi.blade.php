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
        style="background-image: url(frontend/bprbahari/assets/img/profil/banertop.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Struktur Organisasi</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Profil</a></li>
                        <li class="active">Struktur Organisasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="about-area section-padding-100-0" style="margin-top: 50px; margin-bottom: 50px;">
        <div class="container">
            @if ($organisasi)
                <div class="row">
                    <div class="col-12">
                        <div class="about-thumbnail mb-100" style="text-align:center;">
                            <img src="/recfil?display=true&rf={{ $organisasi->banner }}" alt="{{ $organisasi->title }}"
                                style="width:100%; height:auto; border-radius:8px;">
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    Data Belum Terupload.
                </div>
            @endif
        </div>
    </section>
@endsection
