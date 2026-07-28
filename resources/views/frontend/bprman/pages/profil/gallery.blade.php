@extends('frontend.bprman.layout.main')

@section('content')
    <!-- Tambahkan CSS ini untuk menyamakan tinggi -->
    <style>
        .portfolio-warp {
            display: flex;
            flex-direction: column;
            height: 100%;
            /* Pastikan elemen mengisi tinggi kolom */
            border: 1px solid #e0e0e0;
            /* Opsional: tambahkan border untuk melihat batas kartu */
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .portfolio-warp:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .portfolio-img {
            height: 250px;
            /* TINGGI TETAP untuk gambar utama */
            overflow: hidden;
        }

        .portfolio-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Agar gambar memenuhi kotak tanpa distorsi */
            transition: transform 0.5s ease;
        }

        .portfolio-warp:hover .portfolio-img img {
            transform: scale(1.1);
            /* Efek zoom saat hover */
        }

        .portfolio-thumbnails {
            padding: 10px;
        }

        .portfolio-thumbnails .row {
            margin: 0;
        }

        .portfolio-thumbnails .col-4 {
            padding: 2px;
            /* Jarak kecil antar thumbnail */
        }

        .portfolio-thumbnails img {
            transition: opacity 0.3s ease;
        }

        .portfolio-thumbnails a:hover img {
            opacity: 0.8;
        }

        .portfolio-text {
            padding: 15px;
            text-align: center;
            margin-top: auto;
            /* Mendorong bagian teks ke bawah */
            background-color: #f8f9fa;
            /* Opsional: warna latar teks */
        }

        /* Menyamakan tinggi untuk semua item di baris yang sama */
        @media (min-width: 768px) {
            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .portfolio-item {
                display: flex;

            }

        }

        .portfolio-thumbnails .col-4 {
            padding: 3px;
        }

        .portfolio-thumbnails img {
            width: 100%;
            height: 80px;
            /* Tinggi thumbnail sama */
            object-fit: fill;
            border-radius: 4px;
        }

        .navbar,
        .navbar-area,
        .header-area,
        header {
            background: #fff !important;
            position: relative;
            z-index: 999;
        }

      
        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            height: 170px;
            max-width: 1120px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
        }


        /* Versi Mobile */
        @media (max-width: 768px) {
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                margin-top: 30px;
                /* tinggi tetap */
                padding: 0;
                object-fit: contain
            }

        }

        .section-header {
            font-weight: 600;
            padding: 1.5rem;
            color: #1f2937;
        }

        .section-content {
            padding: 0 1.5rem 1.5rem;
        }

        .border-line {
            height: 4px;
            width: 100%;
            background-color: #e5e7eb;
        }

        .blue-line {
            width: 8px;
            height: 100%;
            background-color: #3b82f6;
            margin-right: 1rem;
            border-radius: 4px;
        }
        
        .subjudul {
            text-align: center;
            margin-bottom: 0px;
            padding-top: 20px;
        }
    
    </style>


    <body class="body tg-heading-subheading animation-style3">
            
            <div class="common-heros">
        </div>
        
        <h2 class="subjudul">Galeri</h2>
        
    <div class="portfolio" style="margin-top: 50px; margin-bottom: 50px;">
        <div class="container">
            <div class="row">

                @php
                    $groupedGallery = $gallery->groupBy('kategori');
                @endphp

                @foreach ($groupedGallery as $title => $items)
                    <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item wow fadeInUp mb-4"
                        data-wow-delay="{{ $loop->index * 0.1 }}s">
                        <div class="portfolio-warp">

                            <!-- Gambar Utama dengan tinggi tetap -->
                            <div class="portfolio-img">
                                <a href="/recfil?display=true&rf={{ $items->first()->image }}"
                                    data-lightbox="gallery-{{ \Illuminate\Support\Str::slug($title) }}">
                                    <img src="/recfil?display=true&rf={{ $items->first()->image }}"
                                        alt="{{ $title }}">
                                </a>
                                <div class="portfolio-overlay">
                                    <p>{{ $title }}</p>
                                </div>
                            </div>

                            <!-- Grid Thumbnail dengan jumlah yang dibatasi -->
                            <div class="portfolio-thumbnails">
                                <div class="row g-1">
                                    {{-- Hanya ambil 3 gambar pertama untuk thumbnail --}}
                                    @foreach ($items->take(3) as $item)
                                        <div class="col-4">
                                            <a href="/recfil?display=true&rf={{ $item->image }}"
                                                data-lightbox="gallery-{{ \Illuminate\Support\Str::slug($title) }}"
                                                title="{{ $item->title ?? $title }}">
                                                <img src="/recfil?display=true&rf={{ $item->image }}"
                                                    alt="{{ $item->title ?? $title }}" class="img-fluid">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="portfolio-text">
                                <h3 style="font-size: 17px">{{ $title }}</h3>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </body>
@endsection
