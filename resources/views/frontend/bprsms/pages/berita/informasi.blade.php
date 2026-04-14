@extends('frontend.bprkotabaru.layout.main')

@section('content')

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


    
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Informasi Terbaru
            </h4>
        </div>
    </div>
   <!-- Blog Start -->
      <!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">

        <div class="row g-4 justify-content-center">

            @foreach ($all as $item)
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded p-4"
                        style="background-image: url(frontend/bprsahabattata/img/bg.png);">

                        <!-- META -->
                        <div class="mb-4">
                            <h4 class="text-primary mb-2">
                                {{ $item->kategori ?? 'Informasi' }}
                            </h4>

                            <div class="d-flex justify-content-between">

                                @if ($item->tanggal_tampil)
                                    <p class="mb-0">
                                        <span class="text-dark fw-bold">Tanggal</span>
                                        {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                    </p>
                                @endif

                                @if (!empty($item->tag))
                                    <p class="mb-0">
                                        <span class="text-dark fw-bold">Tag</span>
                                        {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                    </p>
                                @endif

                            </div>
                        </div>

                        <!-- IMAGE -->
                        <div class="project-img">
                            <a href="{{ route('detberita', $item->id) }}">
                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                    class="img-fluid w-100 rounded"
                                    style="height:220px; object-fit:cover;"
                                    alt="{{ $item->title }}">
                            </a>

                            <div class="blog-plus-icon">
                                <a href="/recfil?display=true&rf={{ $item->thumbnail }}"
                                    data-lightbox="blog"
                                    class="btn btn-primary btn-md-square rounded-pill">
                                    <i class="fas fa-plus fa-1x"></i>
                                </a>
                            </div>
                        </div>

                        <!-- TITLE -->
                        <div class="my-4">
                            <a href="{{ route('detberita', $item->id) }}" 
                            class="h4"
                            style="
                                    display:-webkit-box;
                                    -webkit-line-clamp:2;
                                    -webkit-box-orient:vertical;
                                    overflow:hidden;
                            ">
                                {{ $item->title }}
                            </a>
                        </div>

                        <!-- BUTTON -->
                        <a class="btn btn-primary rounded-pill py-2 px-4"
                            href="{{ route('detberita', $item->id) }}" style="color: #fff">
                            Selengkapnya
                        </a>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
