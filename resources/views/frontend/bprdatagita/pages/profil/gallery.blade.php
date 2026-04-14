@extends('frontend.bprdatagita.layout.main')

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
    </style>

    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(frontend/bprdatagita/img/profil/top.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Gallery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@endsection
