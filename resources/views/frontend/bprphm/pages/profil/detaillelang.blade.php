@extends('frontend.bprphm.layout.main')

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
    </style>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Detail lelang</h2>
                </div>

            </div>
        </div>
    </div>

    <body class="body tg-heading-subheading animation-style3">

        <div class="service-details-area-all sp">
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
                                    <p class="mb-0">
                                        {{ $lelang->selesai ? \Carbon\Carbon::parse($lelang->selesai)->format('d-m-Y H:i') : '-' }}
                                    </p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Penyelenggara</span>
                                    <p class="mb-0">{{ $lelang->penyelenggara ?? '-' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Provinsi</span>
                                    <p class="mb-0">{{ $lelang->provinsi ?? '-' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="text-muted">Kota</span>
                                    <p class="mb-0">{{ $lelang->kota ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Tombol Ikuti -->
                            <a href="#" class="btn btn-success w-100 fw-bold mb-4"
                                style="font-size:14px; padding:8px 12px;">
                                IKUTI LELANG
                            </a>

                            <!-- Tabs -->
                            <ul class="nav nav-tabs border-0 mb-3 small" id="detailTab" role="tablist"
                                style="font-size:14px;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#uraian"
                                        type="button" role="tab">Uraian</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lampiran" type="button"
                                        role="tab">Lampiran</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#penjual" type="button"
                                        role="tab">Info Penjual</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#penyelenggara"
                                        type="button" role="tab">Info Penyelenggara</button>
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
