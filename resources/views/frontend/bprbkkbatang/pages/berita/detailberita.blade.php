@extends('frontend.bprbkkbatang.layout.main')

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
    
    <!-- Single Post Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="margin-top: 50px;">
                    <div class="single-content wow fadeInUp">
                        <!-- Dynamic Article Image -->
                        <img src="/recfil?display=true&rf={{ $berita->banner }}" alt="{{ $berita->title }}"
                            style="width: 100%; height: auto; border-radius: 5px; margin-bottom: 20px;" />

                        <!-- Article Meta Data -->
                        <div class="article-meta" style="margin-bottom: 15px; color: #6c757d; font-size: 14px;">
                            <span>
                                <i class="fa fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal_tampil)->translatedFormat('d F Y') }}
                            </span>
                            <span style="margin-left: 15px;">
                                <i class="fa fa-tag"></i>
                                {{ implode(', ', json_decode($berita->tag, true) ?? []) }}
                            </span>
                        </div>

                        <!-- Dynamic Article Title -->
                        <h2>{{ $berita->title }}</h2>

                        <!-- Dynamic Article Content -->
                        <div class="event-content">
                            {!! $berita->content !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">


                        <div class="sidebar-widget wow fadeInUp">
                            <h2 class="widget-title">Berita Lain</h2>
                            <div class="recent-post">
                                @foreach ($other_beritaall as $item)
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                alt="{{ $item->title }}" />
                                        </div>
                                        <div class="post-text">
                                            <a href="{{ route('detberita', $item->id) }}"
                                                class="text-truncate-2">{{ $item->title }}</a>
                                            <div class="post-meta">
                                                <p style="color: #000; font-size: 12px;">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d F Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Post End-->
@endsection
