@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
        .header-top {
            padding: 5px 0;
            background-color: transparent !important;
            position: fixed;
            top: 0;
            right: 0px;
            left: auto;
            width: auto;
            z-index: 2100;
        }

        .header-area {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2000;
            background: #ffffff;
            /* ganti sesuai warna brand */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        body {
            padding-top: 85px;
        }

        #carouselExampleControls {
            width: 100%;
        }

        .carousel-item img {
            width: 100%;
            height: 650px;
            object-fit: fill;
        }

        /* Navigasi panah */
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .nav-tabs .nav-link.active {
            background: #ffc107 !important;
            color: #000 !important;
            border-color: #ffc107 #ffc107 #fff !important;
        }



        @media (max-width: 768px) {

            body {
                padding-top: 90px;
                /* biasanya header lebih kecil di mobile */
            }

            .carousel-item img {
                height: 550px;
                object-fit: fill;
            }

            .carousel-control-prev,
            .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
            }
        }

        /* produk tiga */
        .produk-img {
            width: 100%;
            max-width: 300px;
            height: 300px;
            object-fit: contain;
            display: block;
            margin: 0 auto 15px auto;
            transition: 0.3s ease;
        }

        @media (max-width: 576px) {
            .produk-img {
                max-width: 120px;
                height: 120px;
            }

            .produk-title {
                font-size: 13px !important;
            }

            .produk-col {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
        }

        /* STARS */
        @media (max-width: 768px) {
            .head-title {
                font-size: 24px !important;
            }

            .about img {
                width: 100% !important;
                height: auto !important;
            }

            .about .section-title b {
                font-size: 22px !important;
                line-height: 1.3 !important;
            }

            .about p {
                font-size: 14px !important;
                line-height: 1.6 !important;
            }

            .flex-container-produk {
                margin-bottom: 30px;
            }

            .about .row {
                text-align: center;
            }

            .about .block img {
                max-width: 220px;
                margin: 0 auto 20px auto;
                display: block;
            }

        }
    </style>

    <body>


        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

            <div class="carousel-inner">
                @php $activeSet = false; @endphp

                @foreach ($baner as $item)
                    @if (!empty($item->url) || !empty($item->url_mobile))
                        <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">

                            {{-- DESKTOP --}}
                            @if (!empty($item->url))
                                <img src="/recfil?display=true&rf={{ $item->url }}" class="d-none d-md-block w-100"
                                    alt="Slide">
                            @endif

                            {{-- MOBILE --}}
                            @if (!empty($item->url_mobile))
                                <img src="/recfil?display=true&rf={{ $item->url_mobile }}" class="d-block d-md-none w-100"
                                    alt="Slide">
                            @endif

                        </div>

                        @php $activeSet = true; @endphp
                    @endif
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>



        <section style="background:#ffffff;  margin-top: 80px;">

            <div class="container">

                <div class="row">
                    <div class="col-12 text-center">
                        <h2 style="font-weight:700; font-size:24px; margin-bottom:45px;">
                            Yang bisa dilakukan <br>
                            di BPR Taruna Adidaya Santosa
                        </h2>
                    </div>
                </div>

                <div class="row text-center justify-content-center">

                    <!-- KREDIT -->
                    <div class="col-4 produk-col">
                        <a href="/kredit" style="text-decoration:none; display:block;"
                            onmouseover="this.querySelector('img').style.transform='translateY(-6px) scale(1.05)'; this.querySelector('h4').style.borderBottom='2px solid #1f4fa3';"
                            onmouseout="this.querySelector('img').style.transform='none'; this.querySelector('h4').style.borderBottom='2px solid transparent';">

                            <img src="{{ asset('frontend/bprtaruna/assets/img/produk/kredit/kredit-icon.jpg') }}"
                                class="produk-img">

                            <h4 class="produk-title"
                                style="font-weight:600; font-size:18px; color:#1f4fa3; display:inline-block; padding-bottom:0px; border-bottom:2px solid transparent; transition:0.3s;">
                                KREDIT
                            </h4>
                        </a>
                    </div>

                    <!-- DEPOSITO -->
                    <div class="col-4 produk-col">
                        <a href="/deposito" style="text-decoration:none; display:block;"
                            onmouseover="this.querySelector('img').style.transform='translateY(-6px) scale(1.05)'; this.querySelector('h4').style.borderBottom='2px solid #1f4fa3';"
                            onmouseout="this.querySelector('img').style.transform='none'; this.querySelector('h4').style.borderBottom='2px solid transparent';">

                            <img src="{{ asset('frontend/bprtaruna/assets/img/produk/deposito/deposito-icon.jpg') }}"
                                class="produk-img">

                            <h4 class="produk-title"
                                style="font-weight:600; font-size:18px; color:#1f4fa3; display:inline-block; padding-bottom:0px; border-bottom:2px solid transparent; transition:0.3s;">
                                DEPOSITO
                            </h4>
                        </a>
                    </div>

                    <!-- TABUNGAN -->
                    <div class="col-4 produk-col">
                        <a href="/tabungan" style="text-decoration:none; display:block;"
                            onmouseover="this.querySelector('img').style.transform='translateY(-6px) scale(1.05)'; this.querySelector('h4').style.borderBottom='2px solid #1f4fa3';"
                            onmouseout="this.querySelector('img').style.transform='none'; this.querySelector('h4').style.borderBottom='2px solid transparent';">

                            <img src="{{ asset('frontend/bprtaruna/assets/img/produk/tabungan/tabungan-icon.jpg') }}"
                                class="produk-img">

                            <h4 class="produk-title"
                                style="font-weight:600; font-size:18px; color:#1f4fa3; display:inline-block; padding-bottom:0px; border-bottom:2px solid transparent; transition:0.3s;">
                                TABUNGAN
                            </h4>
                        </a>
                    </div>

                </div>


            </div>

        </section>


        <div class="blog sp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="heading1">
                            <h2 class="title tg-element-title" style="font-size: 30px;">
                                UMKM Bpr Taruna
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="space30"></div>

                <div class="row">
                    @foreach ($umkm as $item)
                        @php
                            // badge
                            $badge = '';
                            $badgeColor = '';

                            if ($item->type_pilihan == 0) {
                                $badge = '⭐ Rekomendasi';
                                $badgeColor = '#28a745';
                            } elseif ($item->type_pilihan == 1) {
                                $badge = '🔥 Terlaris';
                                $badgeColor = '#dc3545';
                            } elseif ($item->type_pilihan == 2) {
                                $badge = '🏆 Top Rating';
                                $badgeColor = '#ffc107';
                            }

                            // layanan json
                            $layanan = json_decode($item->layanan, true);
                            $layananText = is_array($layanan) ? implode(', ', $layanan) : $item->layanan;
                        @endphp

                        <div class="col-md-3 col-12 mb-3">
                            <div style="
                        border-radius:10px;
                        overflow:hidden;
                        box-shadow:0 4px 12px rgba(0,0,0,0.1);
                        background:#fff;
                        transition:0.3s;
                        height:100%;
                    "
                                onmouseover="this.style.transform='translateY(-5px)'"
                                onmouseout="this.style.transform='translateY(0)'">

                                <!-- gambar -->
                                <div style="position:relative;">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                        style="height:200px;width:100%;object-fit:cover;">

                                    @if ($badge)
                                        <span
                                            style="
                                    position:absolute;
                                    top:10px;
                                    left:10px;
                                    background:{{ $badgeColor }};
                                    color:#fff;
                                    padding:4px 10px;
                                    font-size:12px;
                                    border-radius:20px;
                                    font-weight:bold;
                                ">
                                            {{ $badge }}
                                        </span>
                                    @endif

                                    @if ($item->nilai_discount > 0)
                                        <span
                                            style="
                                    position:absolute;
                                    top:10px;
                                    right:10px;
                                    background:#ff5722;
                                    color:#fff;
                                    padding:4px 10px;
                                    font-size:12px;
                                    border-radius:20px;
                                    font-weight:bold;
                                ">
                                            Diskon {{ $item->nilai_discount }}
                                        </span>
                                    @endif
                                </div>

                                <!-- content -->
                                <div style="padding:12px;">

                                    <!-- title -->
                                    <h5
                                        style="
                                font-size:15px;
                                font-weight:bold;
                                margin-bottom:5px;
                                height:40px;
                                overflow:hidden;
                            ">
                                        {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                                    </h5>

                                    <!-- rating -->
                                    <div style="font-size:13px;color:#ffc107;margin-bottom:5px;">
                                        ⭐ {{ $item->rating }}
                                    </div>

                                    <!-- lokasi -->
                                    <div style="font-size:13px;color:#666;margin-bottom:4px;">
                                        ⏰ Buka: {{ substr($item->jam_buka, 0, 5) }} - {{ substr($item->jam_tutup, 0, 5) }}
                                    </div>

                                    <!-- layanan -->
                                    <div
                                        style="
                                font-size:12px;
                                color:#444;
                                margin-bottom:10px;
                                height:30px;
                                overflow:hidden;
                            ">
                                        🛍️ {{ \Illuminate\Support\Str::limit($layananText, 40) }}
                                    </div>

                                    <!-- button -->
                                    <a href="{{ route('detumkm', $item->id) }}"
                                        style="
                                   display:block;
                                   text-align:center;
                                   background:#218bfc;
                                   color:#fff;
                                   padding:6px;
                                   border-radius:5px;
                                   font-size:13px;
                                   text-decoration:none;
                                   font-weight:bold;
                               ">
                                        Lihat Detail
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-end mt-3">
                    <a href="umkm"
                        style="
                    background:#218bfc;
                    color:#fff;
                    padding:8px 20px;
                    border-radius:5px;
                    font-weight:bold;
                    text-decoration:none;
               ">
                        Selengkapnya...
                    </a>
                </div>

            </div>
        </div>
        {{-- <section class="rate section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <b class="head-title" style=" font-size:30px; font-weigth:bold">Counter Rate</b>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item mr-2" role="presentation">
                                <button class="nav-link active" id="tabratedeposit-tab" data-toggle="tab"
                                    data-target="#tabratedeposit" type="button" role="tab"
                                    aria-controls="tabratedeposit" aria-selected="true"
                                    style="color: black">Deposito</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link mr-2" id="tabratetabungan-tab" data-toggle="tab"
                                    data-target="#tabratetabungan" type="button" role="tab"
                                    aria-controls="tabratetabungan" aria-selected="false"
                                    style="color: black">Tabungan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabratekredit-tab" data-toggle="tab"
                                    data-target="#tabratekredit" type="button" role="tab"
                                    aria-controls="tabratekredit" aria-selected="false"
                                    style="color: black">Kredit</button>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabratedeposit" role="tabpanel"
                                aria-labelledby="tabratedeposit-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-warning" style="color:#fff;">
                                            <tr>
                                                <th class="text-center" rowspan="2">NOMINAL</th>
                                                <th class="text-center" colspan="5">BULAN</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">1</th>
                                                <th class="text-center">3</th>
                                                <th class="text-center">6 & 12</th>
                                                <th class="text-center">24</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rp 1 Juta - Rp 50 Juta</td>
                                                <td>4,00%</td>
                                                <td>4,25%</td>
                                                <td>4,50%</td>
                                                <td>4,75%</td>
                                            </tr>
                                            <tr>
                                                <td>> Rp 50 Juta - Rp 100 Juta</td>
                                                <td>4,25%</td>
                                                <td>4,50%</td>
                                                <td>4,75%</td>
                                                <td>5,00%</td>
                                            </tr>
                                            <tr>
                                                <td>> Rp 100 Juta - Rp 250 Juta</td>
                                                <td>4,50%</td>
                                                <td>4,75%</td>
                                                <td>5,00%</td>
                                                <td>5,25%</td>
                                            </tr>
                                            <tr>
                                                <td>> Rp 250 Juta - Rp 500 Juta</td>
                                                <td>4,75%</td>
                                                <td>5,00%</td>
                                                <td>5,25%</td>
                                                <td>5,50%</td>
                                            </tr>
                                            <tr>
                                                <td>> Rp 500 Juta</td>
                                                <td>5,00%</td>
                                                <td>5,25%</td>
                                                <td>5,50%</td>
                                                <td>5,75%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabratetabungan" role="tabpanel"
                                aria-labelledby="tabratetabungan-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-warning" style="color:#fff;">
                                            <tr>
                                                <th>PRODUK</th>
                                                <th>TABUNGAN EKSTRA</th>
                                                <th>TABUNGAN PRIMA</th>
                                                <th>TABUNGAN TARUNA</th>
                                                <th>TABUNGAN MIKRO</th>
                                                <th>TABUNGAN PELAJAR</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Suku Bunga</td>
                                                <td>
                                                    <p style="text-align: center;">1,00 - 3,75 %</p>
                                                    <p>- Tier 1: ≤10jt 1,00%</p>
                                                    <p>- Tier 2: >10-30jt 1,75%</p>
                                                    <p>- Tier 3: >30-50jt 2,75%</p>
                                                    <p>- Tier 4: >50jt 3,75%</p>
                                                </td>
                                                <td>1,5% <br> ( suku bunga menyesuaikan program )</td>
                                                <td>
                                                    <p style="text-align: center;">1,00 - 2,50 %</p>
                                                    <p>- Tier 1: ≤1jt 1,00%</p>
                                                    <p>- Tier 2: >1-5jt 1,50%</p>
                                                    <p>- Tier 3: >5-10jt 2,00%</p>
                                                    <p>- Tier 4: >10jt 2,50%</p>
                                                </td>
                                                <td>1,50%</td>
                                                <td>1,00%</td>
                                            </tr>
                                            <tr>
                                                <td>Setoran Awal</td>
                                                <td>Rp. 200.000</td>
                                                <td>Rp. 100.000</td>
                                                <td>Rp. 50.000</td>
                                                <td>Rp. 50.000</td>
                                                <td>Rp. 5.000</td>
                                            </tr>
                                            <tr>
                                                <td>Setoran Minimal</td>
                                                <td>Rp. 500.000</td>
                                                <td>Rp. 0</td>
                                                <td>Rp. 20.000</td>
                                                <td>Rp. 10.000</td>
                                                <td>Rp. 2.000</td>
                                            </tr>
                                            <tr>
                                                <td>Saldo Minimal</td>
                                                <td>Rp. 200.000</td>
                                                <td>Rp. 100.000</td>
                                                <td>Rp. 30.000</td>
                                                <td>Rp. 20.000</td>
                                                <td>Rp. 5.000</td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Administrasi/Bln</td>
                                                <td>Rp. 3.500</td>
                                                <td>Rp. 3.500</td>
                                                <td>Rp. 1.500</td>
                                                <td>Rp. Tidak Ada</td>
                                                <td>Rp. Tidak Ada</td>
                                            </tr>
                                            <tr>
                                                <td>Penggantian Buku</td>
                                                <td>Rp. 10.000</td>
                                                <td>Rp. 10.000</td>
                                                <td>Rp. 10.000</td>
                                                <td>Rp. 5.000</td>
                                                <td>Rp. 3.000</td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Penutupan</td>
                                                <td>Rp. 20.000</td>
                                                <td>Rp. 20.000</td>
                                                <td>Rp. 10.000</td>
                                                <td>Rp. 5.000</td>
                                                <td>Rp. 1.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabratekredit" role="tabpanel"
                                aria-labelledby="tabratekredit-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-warning" style="color:#fff;">
                                            <tr>
                                                <th class="text-center">Ketentuan</th>
                                                <th class="text-center">Kredit Multiguna</th>
                                                <th class="text-center">Kredit Multiguna ( pembiayaan perhiasan emas)</th>
                                                <th class="text-center">Kredit Multiguna ( kredit ultra mikro tanpa
                                                    agunanan )</th>
                                                <th class="text-center">Kredit Multiguna ( renovasi besar dan pembelian
                                                    kavling )</th>
                                                <th class="text-center">Kredit Kendaraan Baru ( R-2 KKB Motor)</th>
                                                <th class="text-center">Kredit Kendaraan Baru ( R-4 KKB Mobil)</th>
                                                <th class="text-center">Kredit Musiman</th>
                                                <th class="text-center">Kredit Rekening Koran</th>
                                                <th class="text-center">Kredit Griya Taruna</th>
                                                <th class="text-center">Kredit Karyawan Mitra</th>
                                                <th class="text-center">Kredit Karyawan Mitra ( KTA guru / pegawai MOU)
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jenis Kredit</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>
                                                <td>Berjangka</td>
                                                <td>Berjangka</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>
                                                <td>Angsuran</td>

                                            </tr>
                                            <tr>
                                                <td>Jangka Waktu</td>
                                                <td>1 s/d 5 tahun</td>
                                                <td>6 bln s/d 5 tahun</td>
                                                <td>6 bln s/d 5 tahun</td>
                                                <td>1 s/d 7 tahun</td>
                                                <td>1 s/d 3 tahun</td>
                                                <td>1 s/d 5 tahun</td>
                                                <td>3 bln s/d 12 bulan</td>
                                                <td>12 bulan</td>
                                                <td>1 s/d 15 tahun</td>
                                                <td>1 s/d 3 tahun</td>
                                                <td>1 s/d 3 tahun</td>

                                            </tr>
                                            <tr>
                                                <td rowspan="4">Suku Bunga</td>
                                                <td>
                                                    <ul>
                                                        <li>1 thn : 0,85% pm . Flat Anuitas</li>
                                                        <li>2 thn : 0,95% pm . Flat Anuitas</li>
                                                        <li>3 thn : 1,00% pm . Flat Anuitas</li>
                                                        <li>4 thn : 1,10% pm . Flat Anuitas</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>6 bln : 0,85% pm . Flat Anuitas</li>
                                                        <li>1 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>18 bln : 0,95% pm . Flat Anuitas</li>
                                                        <li>2 thn : 1,00% pm . Flat Anuitas</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>6 bln : 1,50% pm . Flat Anuitas</li>
                                                        <li>1 thn : 1,65% pm . Flat Anuitas</li>
                                                        <li>18 bln : 1,75% pm . Flat Anuitas</li>
                                                        <li>2 thn : 2,00% pm . Flat Anuitas</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>1-2 thn : 0,85% pm . Flat Anuitas</li>
                                                        <li>2-4 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>4-6 thn : 0,95% pm . Flat Anuitas</li>
                                                        <li>6-7 thn : 1,00% pm . Flat Anuitas</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>1 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>2 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>3 thn : 0,90% pm . Flat Anuitas</li>

                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>1 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>2 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>3 thn : 0,90% pm . Flat Anuitas</li>
                                                        <li>4 & 5 thn : 0,95% pm . Flat Anuitas</li>

                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>3 bln : 16,00% Pa . Efek</li>
                                                        <li>6 bln : 17.00% Pa . Efek</li>
                                                        <li>12 bln : 18.00% Pa . Efek</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    14% pa Efektif
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>1-5 thn : 0,80% pm . Flat Anuitas</li>
                                                        <li>5-10 thn : 0,85% pm . Flat Anuitas</li>
                                                        <li>10-15 thn : 0,95% pm . Flat Anuitas</li>


                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>1 thn : 0,75% pm . Flat Anuitas</li>
                                                        <li>2 thn : 0,75% pm . Flat Anuitas</li>
                                                        <li>3 thn : 0,75% pm . Flat Anuitas</li>


                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>1 thn : 1,50% pm . Flat Anuitas</li>
                                                        <li>2 thn : 1,50% pm . Flat Anuitas</li>
                                                        <li>3 thn : 1,50% pm. Flat Anuitas</li>
                                                    </ul>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="rate section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <b class="head-title" style="font-size:30px; font-weight:bold">
                                Counter Rate
                            </b>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- TAB HEADER -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item mr-2">
                                <button class="nav-link active" data-toggle="tab" data-target="#tabratedeposit"
                                    type="button" style="color:black">
                                    Deposito
                                </button>
                            </li>
                            <li class="nav-item mr-2">
                                <button class="nav-link" data-toggle="tab" data-target="#tabratetabungan" type="button"
                                    style="color:black">
                                    Tabungan
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-toggle="tab" data-target="#tabratekredit" type="button"
                                    style="color:black">
                                    Kredit
                                </button>
                            </li>
                        </ul>

                        <br>

                        <!-- TAB CONTENT -->
                        <div class="tab-content">

                            <!-- ================= DEPOSITO ================= -->
                            <div class="tab-pane fade show active" id="tabratedeposit">
                                <div class="tab-pane fade show active" id="tabratedeposit">
                                    @forelse ($deposito as $item)
                                        <div class="mb-3">
                                            <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                                style="height:500px; object-fit:fill; border-radius: 10px;">
                                        </div>
                                    @empty
                                        <div class="text-center">
                                            <p>Tidak ada data deposito</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <!-- ================= TABUNGAN ================= -->
                            <div class="tab-pane fade" id="tabratetabungan">
                                @forelse ($tabungan as $item)
                                    <div class="mb-3">
                                        <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                            style="height:500px; object-fit:fill;  border-radius: 10px;">
                                    </div>
                                @empty
                                    <div class="text-center">
                                        <p>Tidak ada data tabungan</p>
                                    </div>
                                @endforelse
                            </div>

                            <!-- ================= KREDIT ================= -->
                            <div class="tab-pane fade" id="tabratekredit">
                                @forelse ($kredit as $item)
                                    <div class="mb-3">
                                        <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                            style="height:500px; object-fit:flll;  border-radius: 10px;">
                                    </div>
                                @empty
                                    <div class="text-center">
                                        <p>Tidak ada data kredit</p>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        @if ($deposito->count() || $tabungan->count() || $kredit->count())

        <section class="rate section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <b class="head-title" style="font-size:30px; font-weight:bold">
                                Counter Rate
                            </b>
                        </div>
                    </div>
        
                    <div class="col-12">
                        <!-- TAB HEADER -->
                        <ul class="nav nav-tabs" id="myTab">
                            @if($deposito->count())
                                <li class="nav-item mr-2">
                                    <button class="nav-link active" data-toggle="tab" data-target="#tabratedeposit">
                                        Deposito
                                    </button>
                                </li>
                            @endif
        
                            @if($tabungan->count())
                                <li class="nav-item mr-2">
                                    <button class="nav-link {{ !$deposito->count() ? 'active' : '' }}" data-toggle="tab" data-target="#tabratetabungan">
                                        Tabungan
                                    </button>
                                </li>
                            @endif
        
                            @if($kredit->count())
                                <li class="nav-item">
                                    <button class="nav-link {{ (!$deposito->count() && !$tabungan->count()) ? 'active' : '' }}" data-toggle="tab" data-target="#tabratekredit">
                                        Kredit
                                    </button>
                                </li>
                            @endif
                        </ul>
        
                        <br>
        
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
        
                            @if($deposito->count())
                            <div class="tab-pane fade show active" id="tabratedeposit">
                                @foreach ($deposito as $item)
                                    <div class="mb-3">
                                        <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                             style="height:500px; object-fit:fill; border-radius:10px;">
                                    </div>
                                @endforeach
                            </div>
                            @endif
        
                            @if($tabungan->count())
                            <div class="tab-pane fade {{ !$deposito->count() ? 'show active' : '' }}" id="tabratetabungan">
                                @foreach ($tabungan as $item)
                                    <div class="mb-3">
                                        <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                             style="height:500px; object-fit:fill; border-radius:10px;">
                                    </div>
                                @endforeach
                            </div>
                            @endif
        
                            @if($kredit->count())
                            <div class="tab-pane fade {{ (!$deposito->count() && !$tabungan->count()) ? 'show active' : '' }}" id="tabratekredit">
                                @foreach ($kredit as $item)
                                    <div class="mb-3">
                                        <img src="/recfil?rf={{ $item->image }}" class="w-100"
                                             style="height:500px; object-fit:fill; border-radius:10px;">
                                    </div>
                                @endforeach
                            </div>
                            @endif
        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        @endif

        <section class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-4 mb-4">
                        <b class="head-title" style="font-size: 30px; font-weigth:bold">Kenapa memilih kami</b>
                        <br>
                        <br>
                        <img src="{{ asset('frontend/bprtaruna/assets/img/profil/stars.webp') }}" alt="STARS"
                            style="width: 50%;">
                    </div>
                </div>
                <div class="flex-container-produk">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="block">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/profil/service.webp') }}"
                                    alt="Img">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-7 mb-4">
                            <div class="block">
                                <div class="section-title">
                                    <p style="font-style: italic;">Service Excellence</p>

                                    <b style="color: #1f4fa3; font-size: 37px;">Pelayanan prima <br>
                                        kepada nasabah
                                    </b>
                                </div>
                                <br>
                                <p>Perbaikan berkelanjutan didukung oleh proaktivitas tinggi mengacu kepada pembangunan
                                    karakter,
                                    pengembangan keterampilan dan keahlian spesifik melalui pembelajaran sistematis, terarah
                                    dan terukur.</p>
                                <!-- <button class="myButton" href="#">SELENGKAPNYA</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-container-produk">
                    <div class="row produk">
                        <div class="col-lg-7 mb-4">
                            <div class="block">
                                <div class="section-title">
                                    <p style="font-style: italic;">Target Oriented</p>
                                    <b style="color: #1f4fa3; font-size: 37px;">Orientasi pencapaian <br>
                                        target perusahaan</b>
                                </div>
                                <p>Menekankan pada ketajaman bisnis yang kuat dalam melihat peluang dan dinamika pasar
                                    dengan orientasi
                                    sebagai yang terdepan dan mendorong pengembangan usaha berdaya saing tinggi.</p>
                                <!-- <button class="myButton" href="#">SELENGKAPNYA</button> -->
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4">
                            <div class="block">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/profil/target.webp') }}"
                                    alt="Img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-container-produk">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="block">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/profil/accountablity.webp') }}"
                                    alt="Img">
                            </div>
                        </div>
                        <div class="col-lg-7 mb-4">
                            <div class="block">
                                <div class="section-title">
                                    <p style="font-style: italic;">Accountability</p>
                                    <b style="color: #1f4fa3; font-size: 37px;">Bertanggung jawab dalam bekerja<br>
                                        sesuai dengan ketentuan</b>
                                </div>
                                <p>
                                    Pengelolaan organisasi profesional dan terintegrasi melalui pengelolaan kinerja handal
                                    dalam upaya
                                    mencapai produktifitas tinggi.
                                </p>
                                <!-- <button class="myButton" href="#">SELENGKAPNYA</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-container-produk">
                    <div class="row produk">
                        <div class="col-lg-7 mb-4">
                            <div class="block">
                                <div class="section-title">
                                    <p style="font-style: italic;">Realiable</p>
                                    <b style="color: #1f4fa3; font-size: 37px;">Dapat diandalkan untuk <br>
                                        menyelesaikan pekerjaan</b>
                                </div>
                                <p>
                                    Kepemimpinan dengan visi memberdayakan organisasi untuk senantiasa bertumbuh dan
                                    berkembang, dengan
                                    integritas, keteladanan, kebersamaan, dan kepercayaan untuk melangkah maju bersama.
                                </p>
                                <!-- <button class="myButton" href="#">SELENGKAPNYA</button> -->
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4">
                            <div class="block">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/profil/realiable.webp') }}"
                                    alt="Img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-container-produk">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="block">
                                <img src="{{ asset('frontend/bprtaruna/assets/img/profil/synergi.webp') }}"
                                    alt="Img">
                            </div>
                        </div>
                        <div class="col-lg-7 mb-4">
                            <div class="block">
                                <div class="section-title">
                                    <p style="font-style: italic;">Synergy</p>
                                    <b style="color: #1f4fa3; font-size: 37px;">Membangun kerjasama <br>
                                        yang baik</b>
                                </div>
                                <p>
                                    Senantiasa mengedepankan pelayanan unggul, melalui hubungan kerja mutualistis, membangun
                                    jaringan luas dan
                                    kokoh, serta menjunjung tinggi nilai kepercayaan bagi seluruh pemangku kepentingan
                                </p>
                                <!-- <button class="myButton" href="#">SELENGKAPNYA</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







        <!--=====TESTIMONIAL AREA START=======-->

        <div class="testimonial sp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="heading1">
                            <h2 class="title tg-element-title" style="font-size: 30px;">Taruna Video</h2>
                        </div>
                    </div>
                </div>

                <div class="row _relative">
                    <div class="tes1-slider" data-aos="fade-up" data-aos-duration="800">
                        <div class="tes1-single-slider">
                            <div class="col-lg-12">

                                <div
                                    style="
                                        max-width: 900px;
                                        margin: 0 auto;
                                        padding: 20px;
                                        background: #fff;
                                        border-radius: 12px;
                                    ">
                                    <div
                                        style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:12px;">
                                        <iframe src="https://www.youtube.com/embed/25X7vZhiQ6E" allowfullscreen
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;">
                                        </iframe>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!--=====TESTIMONIAL AREA END=======-->

        <!--=====BLOG AREA START=======-->

        <div class="blog sp ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="heading1">

                            <h2 class="title tg-element-title" style="font-size: 30px;">Informasi Terbaru</h2>
                        </div>
                    </div>
                </div>
                <div class="space30"></div>
                <div class="row">
                    @foreach ($allinfo as $item)
                        <div class="col-md-4 col-12 mb-2">
                            <div class="blog-box" data-aos="zoom-in-up" data-aos-duration="1100">
                                <div class="image image-anime">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                        style="height: 215px; border-radius: 5px 5px;" class="card-img-top img-fluid"
                                        alt="{{ $item->title }}">
                                </div>
                                <div class="heading">
                                    <div class="tags">
                                        <a href="#" style="font-size: 15px;"><img
                                                src="frontend/nusaintim/assets/img/icons/blog-icon1.png" alt="">
                                            {{ $item->kategori }}</a>
                                        <a href="#" style="font-size: 15px;">
                                            <img src="frontend/nusaintim/assets/img/icons/blog-icon2.png" alt="">
                                            {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                        </a>

                                    </div>
                                    <h4>
                                        <a href="{{ route('detberita', $item->id) }}" style="font-size: 17px;">
                                            {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                                        </a>
                                    </h4>
                                    {{-- <a href="{{ route('detberita', $item->id) }}" class="learn"> Selengkapnya <span><i class="fa-solid fa-arrow-right"></i></span></a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-end mt-3">
                    <a href="umkm"
                        style="
                    background:#218bfc;
                    color:#fff;
                    padding:8px 20px;
                    border-radius:5px;
                    font-weight:bold;
                    text-decoration:none;
               ">
                        Selengkapnya...
                    </a>
                </div>
            </div>
        </div>

        <div class="blog sp" style="padding:25px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="heading1">

                            <h2 class="title tg-element-title" style="font-size: 30px;">Galerry</h2>
                        </div>
                    </div>
                </div>
                <div class="space30"></div>
                <div class="row">
                    @foreach ($galerymulti as $title => $items)
                        <div class="col-md-4 col-12 mb-3">
                            <div class="blog-box">

                                {{-- SLIDER --}}
                                <div id="carousel{{ md5($title) }}" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="2500">

                                    <div class="carousel-inner">

                                        @foreach ($items as $key => $item)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="/recfil?display=true&rf={{ $item->image }}"
                                                    class="d-block w-100"
                                                    style="height:215px; object-fit:cover; border-radius:5px; "
                                                    alt="{{ $title }}">
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                {{-- END SLIDER --}}

                                <div class="heading mt-2">

                                    <div class="tags">
                                        <a href="#" style="font-size: 15px;">
                                            {{ $items->first()->kategori ?? '-' }}
                                        </a>
                                        <a href="#" style="font-size: 15px;">
                                            {{ \Carbon\Carbon::parse($items->first()->published_at)->translatedFormat('d M Y') }}
                                        </a>
                                    </div>

                                    <h4>
                                        <a href="{{ route('detgallery', $items->first()->id) }}"
                                            style="font-size: 17px;">
                                            {{ \Illuminate\Support\Str::limit($title, 45) }}
                                        </a>
                                    </h4>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-end mt-3">
                    <a href="umkm"
                        style="
                    background:#218bfc;
                    color:#fff;
                    padding:8px 20px;
                    border-radius:5px;
                    font-weight:bold;
                    text-decoration:none;
               ">
                        Selengkapnya...
                    </a>
                </div>
            </div>
        </div>

        <!--=====BLOG AREA END=======-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil elemen carousel
                const myCarousel = document.querySelector('#slider');
                const carousel = new bootstrap.Carousel(myCarousel, {
                    interval: 4000, // jeda antar slide otomatis (ms)
                    ride: 'carousel'
                });

                // Tombol navigasi manual
                document.getElementById('prev-btn').addEventListener('click', function() {
                    carousel.prev();
                });

                document.getElementById('next-btn').addEventListener('click', function() {
                    carousel.next();
                });

                // Tombol tutup popup
                document.getElementById('close-popup').addEventListener('click', function() {
                    document.getElementById('popup-modal').style.display = 'none';
                });
            });
        </script>






    </body>
@endsection
