@extends('frontend.bprsms.layout.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .blog {
        margin-top: 70px;
        margin-bottom: 50px;
    }

    .blog-item {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .blog-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .blog-img img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: 0.3s;
    }

    .blog-item:hover .blog-img img {
        transform: scale(1.05);
    }

    .blog-meta {
        padding: 10px 15px 0 15px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 13px;
        color: #666;
    }

    .blog-meta i {
        color: #6443e8;
        margin-right: 5px;
    }

    .blog-text {
        padding: 10px 15px 20px 15px;
    }

    .blog-text h4 {
        margin: 0;
        line-height: 1.4;
    }

    .blog-text a:hover {
        color: #6443e8 !important;
    }

    /* Spacing antar card */
    .row>div {
        margin-bottom: 30px;
    }

    .blog-meta {
        padding: 10px 15px 0 15px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 13px;
        color: #666;
    }

    .blog-meta p {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .blog-meta i {
        color: #6443e8;
    }

    /* Mobile */
    @media (max-width:768px) {
        .blog {
            margin-top: 40px;
        }

        .blog-img img {
            height: 200px;
        }
    }
</style>


<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Informasi Terbaru</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Informasi</a></li>
                    <li>Informasi Terbaru</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Blog Start -->
<!-- Blog Start -->
<section class="blog-area space space-extra2-bottom">
    <div class="container">
        <div class="blog-area">
            <div class="row gy-30 justify-content-center">

                @forelse ($all as $item)
                <div class="col-xl-4 col-md-6">
                    <div class="blog-box th-ani">

                        <div class="blog-img global-img">
                            <a href="{{ route('detberita', $item->id) }}">
                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title }}"
                                    style="object-fit: fill">
                            </a>
                        </div>

                        <div class="blog-box_content">

                            <div class="blog-meta">

                                <a class="author" href="#">
                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                </a>

                                @if (!empty($item->tag))
                                <a href="#">
                                    {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                </a>
                                @endif

                            </div>

                            <h3 class="box-title">
                                <a href="{{ route('detberita', $item->id) }}">
                                    {{ $item->title }}
                                </a>
                            </h3>

                            <a href="{{ route('detberita', $item->id) }}" class="th-btn style4 th-icon mb-10">
                                Selengkapnya
                                <i class="fa-light fa-arrow-right-long"></i>
                            </a>

                        </div>

                    </div>
                </div>

                @empty

                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h5>Belum Ada Berita</h5>
                        <p>Silakan cek kembali nanti</p>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
<!-- Blog End -->
@endsection