@extends('frontend.bprsahabattata.layout.main')

@section('content')
    <style>
        .blog-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .blog-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .blog-img img {
            width: 100%;
            height: 220px;
            object-fit: fill;
        }

        .blog-title {
            padding: 15px 15px 5px 15px;
        }

        .blog-title h3 {
            font-size: 18px;
            font-weight: 600;
            color: #222;
        }

        .blog-meta {
            padding: 0 15px;
            color: #666;
            font-size: 14px;
        }

        .blog-meta i {
            color: #19178e;
            margin-right: 5px;
        }

        .blog-text {
            padding: 10px 15px 20px 15px;
            font-size: 14px;
            color: #555;
        }

        .blog-page>div {
            margin-bottom: 30px;
        }

        /* Mobile */
        @media (max-width:768px) {
            .blog-img img {
                height: 200px;
            }
        }
    </style>
   
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Rekruitment
            </h4>
        </div>
    </div>

    <!-- Blog Start -->
    <div class="blog" style="margin-top: 80px;">
        <div class="container">
            <div class="section-header text-center">

                <div class="row blog-page">

                    @foreach ($rekruitmen as $item)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">

                            <a href="{{ route('detrekrutmen', $item->id) }}"
                                style="text-decoration:none; color:inherit; display:block;">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <img src="/recfil?display=true&rf={{ $item->gambar }}" alt="{{ $item->judul }}">
                                    </div>

                                    <div class="blog-title" style="text-align:center;">
                                        <h3 style="font-size: 20px; margin-top: 5px;">{{ $item->judul }}</h3>
                                    </div>

                                    <div class="blog-meta" style="text-align:center;">
                                        <p
                                            style="display:flex; justify-content:center; align-items:center; gap:5px; color:#000;">
                                            <i class="fa fa-calendar"></i>
                                            <strong>Batas Lamar:</strong>
                                            <span>
                                                {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d F Y') }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="blog-text">
                                        <p style="color: #000">
                                            Bergabunglah dengan tim kami! Kami mencari individu yang bersemangat dan
                                            profesional
                                            untuk mengisi posisi {{ $item->judul }}. Peluang karir menanti Anda.
                                        </p>
                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    @endsection
