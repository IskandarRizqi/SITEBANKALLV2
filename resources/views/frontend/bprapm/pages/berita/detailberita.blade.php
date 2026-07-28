@extends('frontend.bprapm.layout.main')

@section('content')
    <style>
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .detail-wrapper {
            padding: 80px 0;
        }

        .blog-single {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        }

        .blog-img img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .blog-content {
            padding: 30px;
        }

        .blog-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .blog-meta a {
            color: #777;
            font-size: 14px;
            text-decoration: none;
        }

        .blog-meta i {
            margin-right: 5px;
            color: #0a1c92;
        }

        .blog-title {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 25px;
        }

        .blog-text {
            line-height: 1.9;
            font-size: 16px;
            color: #444;
            overflow-x: auto;
            word-wrap: break-word;
        }

        .blog-text img,
        .blog-text table,
        .blog-text iframe {
            max-width: 100% !important;
            height: auto !important;
        }

        .sidebar-area .widget {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        }

        .widget_title {
            font-size: 22px;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .recent-post {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .recent-post:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .media-img img {
            width: 95px;
            height: 75px;
            object-fit: cover;
            border-radius: 8px;
        }

        .recent-post-meta {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .recent-post-meta a {
            color: #777;
            text-decoration: none;
        }

        .post-title {
            font-size: 15px;
            line-height: 1.5;
            margin: 0;
        }

        .post-title a {
            color: #222;
            text-decoration: none;
            transition: 0.3s;
        }

        .post-title a:hover {
            color: #0a1c92;
        }

        @media (max-width: 768px) {

            .detail-wrapper {
                padding: 40px 0;
            }

            .blog-content {
                padding: 20px;
            }

            .blog-title {
                font-size: 24px;
            }

            .media-img img {
                width: 80px;
                height: 65px;
            }

        }
          .breadcrumb-area {
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }
    </style>

     <div class="breadcrumb-area text-center shadow dark bg-fixed text-light">
       
    </div>

    <!-- Detail -->
    <section class="detail-wrapper">
        <div class="container">

            <div class="row">

                <!-- CONTENT -->
                <div class="col-lg-8 mb-4">

                    <div class="blog-single">

                        <!-- Banner -->
                        <div class="blog-img">
                            <img src="/recfil?display=true&rf={{ $berita->banner }}"
                                alt="{{ $berita->title }}">
                        </div>

                        <!-- Content -->
                        <div class="blog-content">

                            <!-- Meta -->
                            <div class="blog-meta">

                                <a href="#">
                                    <i class="fa fa-folder"></i>
                                    {{ $berita->kategori ?? 'Informasi' }}
                                </a>

                                <a href="#">
                                    <i class="fa fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($berita->tanggal_tampil)->translatedFormat('d F Y') }}
                                </a>

                                @if (!empty($berita->tag))
                                    <a href="#">
                                        <i class="fa fa-tags"></i>
                                        {{ implode(', ', json_decode($berita->tag, true) ?? []) }}
                                    </a>
                                @endif

                            </div>

                            <!-- Title -->
                            <h1 class="blog-title">
                                {{ $berita->title }}
                            </h1>

                            <!-- Isi -->
                            <div class="blog-text">
                                {!! $berita->content !!}
                            </div>

                        </div>

                    </div>

                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">

                    <aside class="sidebar-area">

                        <div class="widget">

                            <h3 class="widget_title">
                                Berita Lainnya
                            </h3>

                            <div class="recent-post-wrap">

                                @foreach ($other_beritaall as $item)

                                    <div class="recent-post">

                                        <!-- Image -->
                                        <div class="media-img">
                                            <a href="{{ route('detberita', $item->id) }}">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    alt="{{ $item->title }}">
                                            </a>
                                        </div>

                                        <!-- Content -->
                                        <div class="media-body">

                                            <div class="recent-post-meta">
                                                <a href="#">
                                                    <i class="fa fa-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d M Y') }}
                                                </a>
                                            </div>

                                            <h4 class="post-title text-truncate-2">
                                                <a href="{{ route('detberita', $item->id) }}">
                                                    {{ \Illuminate\Support\Str::limit($item->title, 60) }}
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