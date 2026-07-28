@extends('frontend.bprbaja.layout.main')

@section('content')
<style>
    .job-description,
    .job-description p,
    .job-description ul,
    .job-description li {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }

    .job-description img {
        max-width: 100%;
        height: auto;
    }

    .event-content {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }
</style>

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="{{asset('frontend/bprbaja/assets/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Detail Rekruitment</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Rekruitment</a></li>
                    <li>Detail Rekruitment</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="space">
    <div class="container">
        <div class="job-post style2 mb-60 smoke-bg">
            <div class="job-content_wrapper">

                <div class="job-content d-sm-flex align-items-start justify-content-between">

                    <div class="job-post_author">

                        <span class="date">
                            <span class="deadline">Deadline: </span>
                            {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d F Y') }}
                        </span>

                        <div class="job-post_author-content d-sm-flex align-items-center">

                            <div class="job-author">
                                <img src="/recfil?display=true&rf={{ $detrekrutmen->gambar }}">
                            </div>

                            <div class="author-info">

                                <span class="company-name">
                                    PT BPR Baja
                                </span>

                                <span class="job-title">
                                    {{ $detrekrutmen->judul }}
                                </span>

                                <span class="location">
                                    <i class="fa-light fa-location-dot"></i>
                                    {{ $detrekrutmen->lokasi }}
                                </span>

                            </div>

                        </div>
                    </div>

                    <div class="job-post_date text-sm-end">

                        <div class="job-post-action d-sm-flex align-items-center mb-20">

                            <span class="icon">
                                <i class="fa-solid fa-heart"></i>
                            </span>

                            {{-- <a href="#apply" class="th-btn style2 th-radius ms-sm-4">
                                Apply Now
                            </a> --}}

                        </div>

                        <span class="price d-block">
                            <i class="fa-sharp fa-regular fa-circle-dollar me-2"></i>

                            Rp {{ number_format($detrekrutmen->gaji_min, 0, ',', '.') }}
                            -
                            Rp {{ number_format($detrekrutmen->gaji_max, 0, ',', '.') }}

                        </span>

                    </div>

                </div>

                <div class="job-category_wrapper d-sm-flex justify-content-between">

                    <div class="job-category">

                        <a href="#">
                            {{ $detrekrutmen->tipe_pekerjaan_text }}
                        </a>

                        <a href="#">Rekrutmen</a>

                    </div>

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-xxl-8 col-lg-8">

                <div class="job-single mb-0">

                    <div class="job-description mb-45">
                        <h5 class="sec-title page-title mb-30">
                            Deskripsi Pekerjaan
                        </h5>

                        {!! $detrekrutmen->deskripsi !!}
                    </div>


                    <div class="job-responsibilities mb-45">

                        <h5 class="sec-title page-title mb-30">
                            Kualifikasi
                        </h5>

                        {!! $detrekrutmen->kualifikasi !!}

                    </div>


                    <div class="career-btn" id="apply">
                        <a href="mailto:hrd@bprbaja.co.id" class="th-btn">
                            Apply Posisi Ini
                        </a>
                    </div>

                </div>

            </div>


            <div class="col-xxl-4 col-lg-4">

                <aside class="sidebar-area m-auto">

                    <div class="widget widget_info">

                        <div class="job-sidebar">

                            <ul>

                                <li>
                                    <strong>Lokasi: </strong>
                                    <span>{{ $detrekrutmen->lokasi }}</span>
                                </li>

                                <li>
                                    <strong>Tipe Pekerjaan: </strong>
                                    <span>{{ $detrekrutmen->tipe_pekerjaan_text }}</span>
                                </li>

                                <li>
                                    <strong>Gaji: </strong>
                                    <span>
                                        Rp {{ number_format($detrekrutmen->gaji_min, 0, ',', '.') }}
                                        -
                                        Rp {{ number_format($detrekrutmen->gaji_max, 0, ',', '.') }}
                                    </span>
                                </li>

                                <li>
                                    <strong>Posting: </strong>
                                    <span>
                                        {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('d F Y') }}
                                    </span>
                                </li>

                                <li>
                                    <strong>Deadline: </strong>
                                    <span>
                                        {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d F Y') }}
                                    </span>
                                </li>

                            </ul>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>
</section>
@endsection