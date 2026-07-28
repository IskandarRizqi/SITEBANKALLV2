@extends('frontend.bprbahari.layout.main')

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

    .btn-birutua {
        background: linear-gradient(45deg, #091098, #ffffff);
        border-color: #091098;
        color: #fff;
    }

    .btn-birutua:hover {
        background: linear-gradient(45deg, #091098, #ffffff);
        border-color: #091098;
    }
</style>

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="{{asset('frontend/bprbahari/assets/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Detail Lelang</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Lelang</a></li>
                    <li>Detail Lelang</li>
                </ul>
            </div>
        </div>
    </div>
</div>

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
                                {{ $lelang->limit ? 'Rp' . number_format($lelang->limit, 0, ',', '.') : 'Tanpa Nilai
                                Limit' }}
                            </h6>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span class="text-muted">Uang Jaminan</span>
                            <h6 class="text-danger fw-bold mb-0">
                                {{ $lelang->jaminan ? 'Rp' . number_format($lelang->jaminan, 0, ',', '.') : 'Tanpa Uang
                                Jaminan' }}
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
                    <a href="{{ $lelang->link ?? '#' }}" class="btn btn-birutua w-100 fw-bold mb-4"
                        style="font-size:14px; padding:8px 12px;">
                        IKUTI LELANG
                    </a>

                    <!-- Tabs -->
                    <ul class="nav nav-tabs border-0 mb-3 small" id="detailTab" role="tablist" style="font-size:14px;">
                        <li class="nav-item">
                            <a class="nav-link active" id="uraian-tab" data-bs-toggle="tab" href="#uraian" role="tab"
                                aria-controls="uraian" aria-selected="true">Uraian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="lampiran-tab" data-bs-toggle="tab" href="#lampiran" role="tab"
                                aria-controls="lampiran" aria-selected="false">Lampiran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="penjual-tab" data-bs-toggle="tab" href="#penjual" role="tab"
                                aria-controls="kodelot" aria-selected="false">Kode Lot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="penyelenggara-tab" data-bs-toggle="tab" href="#penyelenggara"
                                role="tab" aria-controls="penyelenggara" aria-selected="false">Info Penyelenggara</a>
                        </li>
                    </ul>

                    <div class="tab-content small" id="detailTabContent" style="font-size:14px;">
                        <div class="tab-pane fade show active" id="uraian" role="tabpanel" aria-labelledby="uraian-tab">
                            {!! $lelang->uraian ?? '<p>Tidak ada uraian tersedia.</p>' !!}
                        </div>
                        <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                            {!! $lelang->lampiran ?? '<p>Tidak ada lampiran tersedia.</p>' !!}
                        </div>
                        <div class="tab-pane fade" id="kodelot" role="tabpanel" aria-labelledby="kodelot-tab">
                            <p>{{ $lelang->kode_lot ?? '-' }}</p>
                        </div>
                        <div class="tab-pane fade" id="penyelenggara" role="tabpanel"
                            aria-labelledby="penyelenggara-tab">
                            <p>{{ $lelang->penyelenggara ?? '-' }}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
   
            if (typeof bootstrap !== 'undefined') {
                const triggerTabList = [].slice.call(document.querySelectorAll('#detailTab a'))
                triggerTabList.forEach(function(triggerEl) {
                    const tabTrigger = new bootstrap.Tab(triggerEl)
                    triggerEl.addEventListener('click', function(event) {
                        event.preventDefault()
                        tabTrigger.show()
                    })
                })
            }
      
            else if (typeof $ !== 'undefined' && typeof $.fn.tab !== 'undefined') {
                $('#detailTab a').on('click', function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            }
        })
</script>
@endpush
@endsection