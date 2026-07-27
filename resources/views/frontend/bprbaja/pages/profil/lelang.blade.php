@extends('frontend.bprbaja.layout.main')

@section('content')
<style>
    .auction-card {
        background: #fff;
        border-radius: 10px;
        border: 2px solid #ddd;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .auction-card:hover {
        background: #ff6f00;
        /* biru */
        color: #fff !important;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .auction-card:hover * {
        color: #fff !important;
    }

    .auction-card:hover .btn {
        background: #441bff !important;
        border-color: #441bff !important;
        color: #fff !important;
    }

    /* Gambar */
    .main-img-wrapper {
        padding: 8px;
    }

    .main-img {
        width: 100%;
        height: 220px;
        object-fit: fill;
        border-radius: 8px;
    }

    .thumb {
        width: 32%;
        height: 70px;
        object-fit: fill;
        border-radius: 6px;
    }

    .thumb-more {
        width: 32%;
        height: 70px;
        border-radius: 6px;
        background: #333;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .countdown-box {
        position: absolute;
        bottom: 0;
        left: 0;
        margin: 8px;
        padding: 4px 8px;
        background: rgb(63, 36, 237);
        color: white;
        border-radius: 6px;
        font-size: 12px;
    }
</style>

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprbaja/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Lelang</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Profil</a></li>
                    <li>Lelang</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<body class="body tg-heading-subheading animation-style3">



    <div class="col-lg-12" style="margin-top: 50px;">
        <div class="blog blog-page sp">
            <div class="container">
                <div class="row">

                    <!-- Konten Gambar Artikel -->
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($lelang as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <a href="{{ route('detlelang', $item->id) }}" class="text-decoration-none text-dark">
                                    <div class="auction-card shadow-sm border-0">

                                        <!-- Gambar -->
                                        <div class="position-relative main-img-wrapper">
                                            <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="Rumah Lelang"
                                                style="height: 400px; object-fit:fill; width:100%;" class="main-img">
                                            @php
                                            $now = \Carbon\Carbon::now();
                                            @endphp

                                            @if ($now->between(\Carbon\Carbon::parse($item->mulai),
                                            \Carbon\Carbon::parse($item->selesai)))
                                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                                LIVE
                                            </span>
                                            @endif

                                        </div>

                                        <!-- Detail -->
                                        <div class="p-3 text-center">
                                            <h6 class="fw-bold mb-2">
                                                <i class="fa-solid fa-building me-1"></i>
                                                {{ $item->title }}
                                            </h6>
                                            <p class="small mb-2 text-muted">{{ $item->type_text }}</p>

                                            <div class="d-flex justify-content-between small mb-2">
                                                <span>Nilai Limit<br><strong class="text-muted">Rp.{{
                                                        number_format($item->limit, 0, ',', '.') }}</strong></span>
                                                <span>Uang
                                                    Jaminan<br><strong class="text-muted">Rp.{{
                                                        number_format($item->jaminan, 0, ',', '.') }}</strong></span>
                                            </div>

                                            <p class="small mb-2">{{ $item->deskripsi }}</p>
                                            <p class="small fw-bold text-primary mb-2">
                                                Batas Akhir Setor Uang
                                                Jaminan<br>{{ \Carbon\Carbon::parse($item->selesai)->format('d-m-Y') }}
                                            </p>
                                            <span class="btn btn-sm btn-warning w-100 fw-bold">OPEN
                                                BIDDING</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
        </div>

</body>
@endsection