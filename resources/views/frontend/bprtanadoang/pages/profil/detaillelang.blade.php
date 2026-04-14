@extends('frontend.bprtanadoang.layout.main')

@section('content')
    <style>
        .event-content {
            max-width: 100%;
            overflow-x: auto;
            /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
            word-wrap: break-word;
            /* biar teks panjang gak keluar area */
            line-height: 1.6;
            /* biar enak dibaca */
            text-align: justify;
            font-family: 'Archivo', sans-serif;
        }

        #detailTab .nav-link {
            color: #333;
            font-weight: 500;
        }

        #detailTab .nav-link.active {
            color: #6443e8;
            font-weight: 600;
            border-bottom: 2px solid #6443e8;
        }

        .tab-content {
            color: #333;
        }

        .tab-content p {
            color: #333;
        }

        .tab-pane {
            padding: 10px 0;
            color: #333;
        }
    </style>

    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url({{ asset('frontend/bprtanadoang/img/profil/top.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Detail Lelang</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Lelang</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <body class="body tg-heading-subheading animation-style3">

        <div class="service-details-area-all sp" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="container">
                <div class="row g-4 align-items-start">

                    <!-- Gambar (col-6) -->
                    <div class="col-lg-6">
                        <div class="details-post-area">
                            <div class="image">
                                <img src="/recfil?display=true&rf={{ $lelang->banner }}"
                                    alt="{{ $lelang->judul ?? 'Detail Lelang' }}"
                                    style="width:100%; height:auto; object-fit:cover; border-radius:8px;">
                            </div>
                        </div>
                    </div>

                    <!-- Informasi + Tabs (col-6) -->
                    <div class="col-lg-6">
                        <div class="details-post-area">
                            <h4 class="fw-bold mb-3" style="font-size:18px;">
                                {{ $lelang->title }}
                            </h4>

                            <div class="row mb-3 small" style="font-size:14px;">
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Nilai Limit</span>
                                    <h6 class="text-primary fw-bold mb-0">
                                        {{ $lelang->limit ? 'Rp' . number_format($lelang->limit, 0, ',', '.') : 'Tanpa Nilai Limit' }}
                                    </h6>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Uang Jaminan</span>
                                    <h6 class="text-danger fw-bold mb-0">
                                        {{ $lelang->jaminan ? 'Rp' . number_format($lelang->jaminan, 0, ',', '.') : 'Tanpa Uang Jaminan' }}
                                    </h6>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Batas Akhir Penawaran</span>
                                    <p class="mb-0" style="color: #000">
                                        {{ $lelang->selesai ? \Carbon\Carbon::parse($lelang->selesai)->format('d-m-Y ') : '-' }}
                                    </p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Penyelenggara</span>
                                    <p class="mb-0" style="color: #000">{{ $lelang->penyelenggara ?? '-' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Provinsi</span>
                                    <p class="mb-0" style="color: #000">{{ $lelang->provinsi ?? '-' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Kota</span>
                                    <p class="mb-0" style="color: #000">{{ $lelang->kota ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Tombol Ikuti -->
                            <a href="{{ $lelang->link ?? '-' }}" class="btn btn-success w-100 fw-bold mb-4"
                                style="font-size:14px; padding:8px 12px;">
                                IKUTI LELANG
                            </a>

                            <!-- Tabs -->
                            <ul class="nav nav-tabs border-0 mb-3 small" id="detailTab" role="tablist"
                                style="font-size:14px;">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#uraian">Uraian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#lampiran">Lampiran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#penjual">Info Penjual</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#penyelenggara">Info Penyelenggara</a>
                                </li>
                            </ul>

                            <div class="tab-content small" style="font-size:14px;">
                                <div class="tab-pane fade show active" id="uraian" role="tabpanel">
                                    {!! $lelang->uraian ?? '<p>Tidak ada uraian tersedia.</p>' !!}
                                </div>
                                <div class="tab-pane fade" id="lampiran" role="tabpanel">
                                    {!! $lelang->lampiran ?? '<p>Tidak ada lampiran tersedia.</p>' !!}
                                </div>
                                <div class="tab-pane fade" id="penjual" role="tabpanel">
                                    <p>{{ $lelang->penjual ?? '-' }}</p>
                                </div>
                                <div class="tab-pane fade" id="penyelenggara" role="tabpanel">
                                    <p>{{ $lelang->penyelenggara ?? '-' }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </body>
@endsection
