@extends('frontend.bprbaja.layout.main')

@section('content')
    <style>
        /* Running text animation */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Responsive Banner */
        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }


        .btn-tab {
            border: none;
            background: #f0f0f0;
            padding: 10px 25px;
            margin: 0 5px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .btn-tab.active {
            background: #ff6f00;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .15);
        }

        .btn-tab:hover {
            background: #ff6f00;
            color: #fff;
        }

        .tab-content {
            animation: fadeIn .4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .custom-pagination .page-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            margin: 0 8px;
            background-color: #f6b7a5;
            color: #fff;
            font-size: 18px;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: transparent;
            border: 2px solid #ff6f00;
            color: #ff6f00;
            font-weight: bold;
        }

        .custom-pagination .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }

        .custom-pagination .page-item:not(.active) .page-link:hover {
            background-color: #ff6f00;
        }

        .tab-wrapper {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .tab-wrapper {
                justify-content: center;
            }

            .btn-tab {
                font-size: 14px;
                padding: 8px 14px;
                flex: 1 1 auto;
                min-width: 140px;
            }
        }

        @media (max-width: 480px) {
            .btn-tab {
                font-size: 13px;
                padding: 7px 12px;
                min-width: 120px;
            }
        }
    </style>

  <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprbaja/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Laporan BPR Baja</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Laporan</a></li>
                        <li>Laporan BPR Baja</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="blog blog-page sp" style="padding-top:30px">
        <div class="container">

            <div class="tab-wrapper text-center mb-4">
                <button class="btn-tab active" onclick="showTab('all', this)">Semua</button>
                <button class="btn-tab" onclick="showTab('publikasi', this)">Laporan Publikasi</button>
                <button class="btn-tab" onclick="showTab('tahunan', this)">Laporan Tahunan</button>
                <button class="btn-tab" onclick="showTab('gcg', this)">Laporan GCG</button>
                <button class="btn-tab" onclick="showTab('akb', this)">Laporan AKB</button>
                <button class="btn-tab" onclick="showTab('lainnya', this)">Laporan Lainnya</button>
            </div>

            <!-- TAB SEMUA -->
            <div class="row tab-content" id="all">
                <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
                    <div class="row readContent">
                        <div class="col-lg-12 mt-3 mb-3">
                            <!-- Laporan Publikasi -->
                            @if(isset($publikasi) && count($publikasi) > 0)
                                <h4 class="text-center mb-4">Laporan Publikasi</h4>
                                <div class="row d-flex justify-content-center">
                                    @foreach ($publikasi as $tahun => $laporanTahun)
                                        <div class="col-lg-4 mt-3 mb-3">
                                            <div class="card h-100 text-center border-0 shadow">
                                                <img src="/recfil?display=true&rf={{ $laporanTahun->first()->thumbnail }}"
                                                    alt="Laporan Publikasi {{ $tahun }}" class="card-img-top rounded-3"
                                                    style="width: 200px; height: 280px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6  class="fw-bold" style="margin-bottom:5px;" alt>Laporan Publikasi
                                                        {{ $tahun }}</h6>
                                                    <br>
                                                    <div class="d-grid gap-2">
                                                        @foreach ($laporanTahun->groupBy('triwulan') as $triwulan => $items)
                                                            <a href="/recfil?display=true&rf={{ $items->first()->url }}"
                                                                target="_blank" class="btn btn-warning text-white fw-bold">
                                                                {{ $triwulan }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Laporan Tahunan -->
                            @if(isset($tahunan) && count($tahunan) > 0)
                                <h4 class="text-center mb-4 mt-5">Laporan Tahunan</h4>
                                <div class="row d-flex justify-content-center">
                                    @foreach ($tahunan as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Laporan GCG -->
                            @if(isset($tatakelola) && count($tatakelola) > 0)
                                <h4 class="text-center mb-4 mt-5">Laporan GCG</h4>
                                <div class="row d-flex justify-content-center">
                                    @foreach ($tatakelola as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Laporan AKB -->
                            @if(isset($akb) && count($akb) > 0)
                                <h4 class="text-center mb-4 mt-5">Laporan AKB</h4>
                                <div class="row d-flex justify-content-center">
                                    @foreach ($akb as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                             <!-- Laporan Lainnya -->
                             @if(isset($lainnya) && count($lainnya) > 0)
                                <h4 class="text-center mb-4 mt-5">Laporan Lainnya</h4>
                                <div class="row d-flex justify-content-center">
                                    @foreach ($lainnya as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB PUBLIKASI -->
            <div class="row tab-content d-none" id="publikasi">
                <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
                    <div class="row readContent">
                        <div class="col-lg-12 mt-3 mb-3">
                            @if(isset($publikasi) && count($publikasi) > 0)
                                <div class="row d-flex justify-content-center">
                                    @foreach ($publikasi as $tahun => $laporanTahun)
                                        <div class="col-lg-4 mt-3 mb-3">
                                            <div class="card h-100 text-center border-0 shadow">
                                                <img src="/recfil?display=true&rf={{ $laporanTahun->first()->thumbnail }}"
                                                    alt="Laporan Publikasi {{ $tahun }}" class="card-img-top rounded-3"
                                                    style="width: 200px; height: 280px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6  class="fw-bold" style="margin-bottom:5px;" alt>Laporan Publikasi
                                                        {{ $tahun }}</h6>
                                                    <br>
                                                    <div class="d-grid gap-2">
                                                        @foreach ($laporanTahun->groupBy('triwulan') as $triwulan => $items)
                                                            <a href="/recfil?display=true&rf={{ $items->first()->url }}"
                                                                target="_blank" class="btn btn-warning text-white fw-bold">
                                                                {{ $triwulan }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center mt-5 mb-5">
                                    <h5>Belum ada data Laporan Publikasi</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB TAHUNAN -->
            <div class="row tab-content d-none" id="tahunan">
                <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
                    <div class="row readContent">
                        <div class="col-lg-12 mt-3 mb-3">
                            @if(isset($tahunan) && count($tahunan) > 0)
                                <div class="row d-flex justify-content-center">
                                    @foreach ($tahunan as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center mt-5 mb-5">
                                    <h5>Belum ada data Laporan Tahunan</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB GCG -->
            <div class="row tab-content d-none" id="gcg">
                <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
                    <div class="row readContent">
                        <div class="col-lg-12 mt-3 mb-3">
                            @if(isset($tatakelola) && count($tatakelola) > 0)
                                <div class="row d-flex justify-content-center">
                                    @foreach ($tatakelola as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center mt-5 mb-5">
                                    <h5>Belum ada data Laporan GCG</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB AKB -->
            <div class="row tab-content d-none" id="akb">
                <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
                    <div class="row readContent">
                        <div class="col-lg-12 mt-3 mb-3">
                            @if(isset($akb) && count($akb) > 0)
                                <div class="row d-flex justify-content-center">
                                    @foreach ($akb as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center mt-5 mb-5">
                                    <h5>Belum ada data Laporan AKB</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- LAPORAN LAINNYA --}}
             <div class="row tab-content d-none" id="lainnya">
                <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
                    <div class="row readContent">
                        <div class="col-lg-12 mt-3 mb-3">
                            @if(isset($lainnya) && count($lainnya) > 0)
                                <div class="row d-flex justify-content-center">
                                    @foreach ($lainnya as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 text-center border-0">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    class="card-img-top rounded-3" alt="{{ $item->title }}"
                                                    style="width: 250px; height: 300px; object-fit: cover; margin: 0 auto;">
                                                <div class="card-body">
                                                    <h6 class="fw-bold" style="margin-bottom: 10px;">
                                                        {{ strtoupper($item->title) }}</h6>
                                                    <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                                        class="btn btn-warning text-white fw-bold px-4">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center mt-5 mb-5">
                                    <h5>Belum ada data Laporan Lainnya</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabId, btn) {
            // sembunyikan semua tab
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('d-none');
            });

            // reset tombol
            document.querySelectorAll('.btn-tab').forEach(button => {
                button.classList.remove('active');
            });

            // tampilkan tab terpilih
            document.getElementById(tabId).classList.remove('d-none');

            // aktifkan tombol
            btn.classList.add('active');
        }
    </script>
@endsection