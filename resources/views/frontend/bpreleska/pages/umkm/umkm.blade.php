@extends('frontend.bprstaja.layout.main')

@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>UMKM</h2>
                </div>

            </div>
        </div>
    </div>


    <!-- Portfolio Start -->
    <div class="portfolio">
        <div class="container">
            {{-- <div class="section-header text-center">
            <p>UMKM</p>
            <h2>UMKM BPRS Taja</h2>
        </div> --}}
            <div class="row">
                <div class="col-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".first">Rekomendasi</li>
                        <li data-filter=".second">Terlaris</li>
                        <li data-filter=".third">Top rating</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <!-- Rekomendasi Items -->
                @foreach ($rekomendasi as $item)
                    @php
                        // badge
                        $badge = '⭐ Rekomendasi';
                        $badgeColor = '#28a745';

                        // layanan json
                        $layanan = json_decode($item->layanan, true);
                        $layananText = is_array($layanan) ? implode(', ', $layanan) : $item->layanan;
                    @endphp

                    <div class="col-lg-3 col-md-6 col-sm-12 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-warp">
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
                                        style="height:200px;width:100%;object-fit:fill;">

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
                                 <div style="padding:12px; text-align: left;">

                                    <!-- title -->
                                    <h5
                                        style="
                                        font-size:15px;
                                        font-weight:bold;
                                        margin-bottom:5px;
                                        height:40px;
                                        overflow:hidden;
                                        text-align: center;
                                    ">
                                        {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                                    </h5>

                                    <!-- rating -->
                                    <div style="font-size:13px;color:#ffc107;margin-bottom:5px;">
                                        ⭐ {{ $item->rating }}
                                    </div>

                                    <!-- lokasi -->
                                    <div style="font-size:13px;color:#666;margin-bottom:4px;">
                                        ⏰ Buka: {{ substr($item->jam_buka, 0, 5) }} -
                                        {{ substr($item->jam_tutup, 0, 5) }}
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
                                        background:#0a6e22;
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
                    </div>
                @endforeach

                <!-- Terlaris Items -->
                @foreach ($terlaris as $item)
                    @php
                        // badge
                        $badge = '🔥 Terlaris';
                        $badgeColor = '#dc3545';

                        // layanan json
                        $layanan = json_decode($item->layanan, true);
                        $layananText = is_array($layanan) ? implode(', ', $layanan) : $item->layanan;
                    @endphp

                    <div class="col-lg-3 col-md-6 col-sm-12 portfolio-item second wow fadeInUp" data-wow-delay="0.2s">
                        <div class="portfolio-warp">
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
                                        style="height:200px;width:100%;object-fit:fill;">

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
                                    <div style="padding:12px; text-align: left;">

                                    <!-- title -->
                                    <h5
                                        style="
                                        font-size:15px;
                                        font-weight:bold;
                                        margin-bottom:5px;
                                        height:40px;
                                        overflow:hidden;
                                        text-align: center;
                                    ">
                                        {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                                    </h5>

                                    <!-- rating -->
                                    <div style="font-size:13px;color:#ffc107;margin-bottom:5px;">
                                        ⭐ {{ $item->rating }}
                                    </div>

                                    <!-- lokasi -->
                                    <div style="font-size:13px;color:#666;margin-bottom:4px;">
                                        ⏰ Buka: {{ substr($item->jam_buka, 0, 5) }} -
                                        {{ substr($item->jam_tutup, 0, 5) }}
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
                                        background:#0a6e22;
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
                    </div>
                @endforeach

                <!-- Top Rating Items -->
                @foreach ($toprating as $item)
                    @php
                        // badge
                        $badge = '🏆 Top Rating';
                        $badgeColor = '#ffc107';

                        // layanan json
                        $layanan = json_decode($item->layanan, true);
                        $layananText = is_array($layanan) ? implode(', ', $layanan) : $item->layanan;
                    @endphp

                    <div class="col-lg-3 col-md-6 col-sm-12 portfolio-item third wow fadeInUp" data-wow-delay="0.3s">
                        <div class="portfolio-warp">
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
                                        style="height:200px;width:100%;object-fit:fill;">

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
                                 <div style="padding:12px; text-align: left;">

                                    <!-- title -->
                                    <h5
                                        style="
                                        font-size:15px;
                                        font-weight:bold;
                                        margin-bottom:5px;
                                        height:40px;
                                        overflow:hidden;
                                        text-align: center;
                                    ">
                                        {{ \Illuminate\Support\Str::limit($item->title, 45) }}
                                    </h5>

                                    <!-- rating -->
                                    <div style="font-size:13px;color:#ffc107;margin-bottom:5px;">
                                        ⭐ {{ $item->rating }}
                                    </div>

                                    <!-- lokasi -->
                                    <div style="font-size:13px;color:#666;margin-bottom:4px;">
                                        ⏰ Buka: {{ substr($item->jam_buka, 0, 5) }} -
                                        {{ substr($item->jam_tutup, 0, 5) }}
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
                                        background:#0a6e22;
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
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Portfolio End -->
@endsection
