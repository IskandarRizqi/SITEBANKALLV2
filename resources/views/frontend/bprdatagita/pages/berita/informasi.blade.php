@extends('frontend.bprdatagita.layout.main')

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


    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url({{ asset('frontend/bprdatagita/img/profil/top.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2> Informasi Terbaru</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Informasi Terbaru</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="blog">
        <div class="container">

            <div class="row">
                @foreach ($all as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">

                            <div class="blog-img">
                                <a href="{{ route('detberita', $item->id) }}">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}" alt="{{ $item->title }}"
                                        style="width:100%; height:220px; object-fit:fill;">
                                </a>
                            </div>

                            <div class="blog-meta">

                                @if ($item->tanggal_tampil)
                                    <p style="color: #000">
                                        <i class="fa fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                    </p>
                                @endif

                                @if (!empty($item->tag))
                                    <p style="color: #000">
                                        <i class="fa fa-tags"></i>
                                        {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                    </p>
                                @endif

                            </div>

                            <div class="blog-text">
                                <h4>
                                    <a href="{{ route('detberita', $item->id) }}"
                                        style="font-weight:bold; color:#000; text-decoration:none; font-size: 18px;">
                                        {{ \Illuminate\Support\Str::limit($item->title, 80) }}
                                    </a>
                                </h4>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Blog End -->
@endsection
