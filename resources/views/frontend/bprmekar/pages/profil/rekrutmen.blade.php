@extends('frontend.bprsms.layout.main')
z
@section('content')
    <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Karir</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Beranda</a></li>
                        <li>Karir</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="space">
        <div class="container">
            <div class="row gy-30">

                @forelse ($rekruitmen as $item)
                    <div class="col-lg-6 col-xxl-4">
                        <div class="job-post white-bg">

                            <div class="job-content smoke-bg">

                                <div class="job-post_date d-flex align-items-center justify-content-between">
                                    <span class="date">
                                        {{ \Carbon\Carbon::parse($item->tanggal_posting)->format('d F Y') }}
                                    </span>
                                    <div class="icon">
                                        <i class="fa-solid fa-heart"></i>
                                    </div>
                                </div>

                                <div class="job-post_author d-sm-flex align-items-center text-center text-sm-start">

                                    <div class="job-author">
                                        <img src="/recfil?display=true&rf={{ $item->gambar }}" alt="Image">
                                    </div>

                                    <div class="author-info">
                                        <span class="company-name">
                                            PT BPR Baja
                                        </span>

                                        <span class="job-title">
                                            {{ $item->judul }}
                                        </span>

                                        <span class="location">
                                            <i class="fa-light fa-location-dot"></i>
                                            {{ $item->lokasi }}
                                        </span>

                                    </div>

                                </div>

                                <div class="job-category">
                                    <a href="#">
                                        @if ($item->tipe_pekerjaan == 1)
                                            Full-time
                                        @elseif ($item->tipe_pekerjaan == 2)
                                            Part-time
                                        @elseif ($item->tipe_pekerjaan == 3)
                                            Kontrak
                                        @else
                                            Magang
                                        @endif
                                    </a>

                                    <a href="#">Rekruitmen</a>
                                </div>

                            </div>

                            <div
                                class="job-wrapper d-sm-flex align-items-center justify-content-between text-center text-sm-start">

                                <span class="price">
                                    <i class="fa-sharp fa-regular fa-circle-dollar me-2"></i>

                                    Rp {{ number_format($item->gaji_min, 0, ',', '.') }}
                                    -
                                    Rp {{ number_format($item->gaji_max, 0, ',', '.') }}

                                </span>

                                <a href="{{ route('detrekrutmen', $item->id) }}">
                                    <span class="th-btn style3">
                                        Detail
                                    </span>
                                </a>

                            </div>

                        </div>
                    </div>

                @empty

                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <h5>Belum Ada Lowongan Tersedia</h5>
                            <p>Silakan cek kembali nanti untuk informasi karir terbaru.</p>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection
