@extends('frontend.bprbaja.layout.main')

@section('content')
<style>
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Container utama */
    .single {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    /* Artikel utama */
    .single-content {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .single-content h2 {
        font-size: 26px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    /* Konten berita */
    .event-content {
        max-width: 100%;
        overflow-x: auto;
        word-wrap: break-word;
        line-height: 1.7;
        text-align: justify;
        font-family: 'Archivo', sans-serif;
        font-size: 15px;
        margin-top: 15px;
    }

    .event-content img,
    .event-content table {
        max-width: 100% !important;
        height: auto !important;
    }

    /* Meta Artikel */
    .article-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 15px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eee;
        color: #6c757d;
    }

    .article-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
    }

    .article-meta i {
        color: #007bff;
    }

    /* Sidebar */
    .sidebar-widget {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-top: 50px;
    }

    .widget-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    /* Berita Lain */
    .post-item {
        display: flex;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eee;
    }

    .post-item:last-child {
        border-bottom: none;
    }

    .post-img {
        margin-right: 12px;
        flex-shrink: 0;
    }

    .post-img img {
        width: 90px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
    }

    /* Text Berita */
    .post-text {
        flex-grow: 1;
    }

    .post-text a {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        line-height: 1.4;
    }

    .post-text a:hover {
        color: #007bff;
    }

    /* Meta kecil */
    .post-meta {
        margin-top: 5px;
        font-size: 12px;
        color: #888;
    }

    /* Hover effect */
    .post-item:hover {
        transform: translateX(3px);
        transition: 0.2s ease;
    }

    /* Responsive Mobile */
    @media (max-width: 768px) {

        .single {
            margin-top: 30px;
        }

        .single-content {
            padding: 15px;
        }

        .single-content h2 {
            font-size: 20px;
        }

        .sidebar-widget {
            margin-top: 30px;
        }

        .post-img img {
            width: 80px;
            height: 60px;
        }

    }

    /* Tambahan agar gambar utama rapi */
    .single-content img {
        border-radius: 8px;
    }

    /* Breadcrumb spacing */
    .breadcrumb-area {
        margin-bottom: 30px;
    }
</style>

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('frontend/bprbaja/assets/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Detail informasi</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Informasi</a></li>
                    <li>Detail informasi</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row">

            <!-- CONTENT -->
            <div class="col-xxl-8 col-lg-7">
                <div class="th-blog blog-single">

                    <div class="blog-img">
                        <img src="/recfil?display=true&rf={{ $berita->banner }}" alt="{{ $berita->title }}">
                    </div>

                    <div class="blog-content">

                        <div class="blog-meta">

                            <a class="author" href="#">
                                <i class="fa-light fa-user"></i>
                                {{ $berita->kategori ?? 'Informasi' }}
                            </a>

                            <a href="#">
                                <i class="fa-regular fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal_tampil)->translatedFormat('d F Y') }}
                            </a>

                            @if (!empty($berita->tag))
                            <a href="#">
                                <i class="fa fa-tag"></i>
                                {{ implode(', ', json_decode($berita->tag, true) ?? []) }}
                            </a>
                            @endif

                        </div>

                        <h2 class="blog-title">
                            {{ $berita->title }}
                        </h2>

                        <div class="blog-text">
                            {!! $berita->content !!}
                        </div>

                    </div>

                </div>
            </div>


            <!-- SIDEBAR -->
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">

                    <div class="widget">
                        <h3 class="widget_title">Berita Lain</h3>

                        <div class="recent-post-wrap">

                            @foreach ($other_beritaall as $item)
                            <div class="recent-post">

                                <div class="media-img">
                                    <a href="{{ route('detberita', $item->id) }}">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title }}">
                                    </a>
                                </div>

                                <div class="media-body">

                                    <div class="recent-post-meta">
                                        <a href="#">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d M Y') }}
                                        </a>
                                    </div>

                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ route('detberita', $item->id) }}">

                                            {{ $item->title }}

                                        </a>
                                    </h4>

                                </div>

                            </div>
                            @endforeach

                        </div>

                    </div>

                </aside>
            </div>

        </div>
    </div>
</section>
@endsection