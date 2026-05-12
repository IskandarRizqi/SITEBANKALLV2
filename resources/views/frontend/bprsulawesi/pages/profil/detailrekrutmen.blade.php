@extends('frontend.bprsulawesi.layout.main')

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

    <div class="pxn-page-header" data-bg-image="{{asset('frontend/bprsulawesi/assets/images/profil/banertop.jpg')}}"
        style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center;">


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_header_content" style="text-align: center;">
                        <h1 class="page_title">Detail Rekrutmen</h1>
                        <div class="pxn_breadcrumb">
                            <span><a href="#">Beranda</a></span>
                            /
                            <span class="current">Detail Rekrutmen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pxn-post-details section-padding">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="col-lg-8">
                    <div class="pxn_post_details_wrap">
                        <div class="pxn_post_thumbnail">
                            <img src="/recfil?display=true&rf={{ $detrekrutmen->gambar }}" alt="Rekrutmen">

                            <div class="post_date">
                                <span
                                    class="day">{{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('d') }}</span>
                                <span
                                    class="month_year">{{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('M y') }}</span>
                            </div>
                        </div>
                        <div class="pxn_post_content">
                            <div class="pxn_post_meta">
                                <div class="meta">
                                    <i class="pxni-author"></i>
                                    <span class="meta_text"><a href="#">PT BPR Surya Kencana</a></span>
                                </div>

                                <div class="meta">
                                    <i class="pxni-file"></i>
                                    <span class="meta_text"><a
                                            href="#">{{ $detrekrutmen->tipe_pekerjaan_text }}</a></span>
                                </div>

                                <div class="meta">
                                    <i class="fa-light fa-location-dot"></i>
                                    <span class="meta_text">{{ $detrekrutmen->lokasi }}</span>
                                </div>
                            </div>

                            <h2>{{ $detrekrutmen->judul }}</h2>

                            <div class="job-description">
                                <h5>Deskripsi Pekerjaan</h5>
                                {!! $detrekrutmen->deskripsi !!}
                            </div>

                            <div class="job-description mt-4">
                                <h5>Kualifikasi</h5>
                                {!! $detrekrutmen->kualifikasi !!}
                            </div>

                            {{-- <div class="mt-4">
                                <a href="mailto:hrd@bprsulawesi.co.id" class="th-btn">Apply Posisi Ini</a>
                            </div> --}}

                            <span>&nbsp;</span>
                        </div>
                    </div>
                </div>

                <!-- sidebar -->
                <div class="col-lg-4">
                    <aside class="pxn_sidebar">

                        <div class="pxn_sidebar_widget">
                            <h2 class="sidebar_title">Info Rekrutmen</h2>
                            <ul class="pxn_recent_posts">
                                <li class="post">
                                    <div class="post_content">
                                        <span class="date"><i class="pxni-calendar"></i> <strong>Posting:</strong>
                                            {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('d F Y') }}</span>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="date"><i class="pxni-calendar"></i> <strong>Deadline:</strong>
                                            {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d F Y') }}</span>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="date"><i class="fa-light fa-location-dot"></i>
                                            <strong>Lokasi:</strong> {{ $detrekrutmen->lokasi }}</span>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="date"><i class="fa-sharp fa-regular fa-circle-dollar"></i>
                                            <strong>Gaji:</strong>
                                            Rp {{ number_format($detrekrutmen->gaji_min, 0, ',', '.') }}
                                            -
                                            Rp {{ number_format($detrekrutmen->gaji_max, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="date"><i class="pxni-file"></i> <strong>Tipe:</strong>
                                            {{ $detrekrutmen->tipe_pekerjaan_text }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
