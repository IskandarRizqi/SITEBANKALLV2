@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */
            background-color: #fff;
            /* supaya tidak ada hitam */

            height: 170px;
            max-width: 1120px;
            margin: 80px auto 0 auto;
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

        :root {
            --primary-color: #ff6b35;
            /* Oranye Cerah */
            --secondary-color: #000000;
            /* Hijau Tua */
            --accent-color: #abd1c6;
            /* Hijau Muda */
            --light-bg: #f8f9fa;
            --text-dark: #212529;
            --text-muted: #6c757d;
        }

        .job-wrapper {
            max-width: 1125px;
            margin: 30px auto 40px;
            padding: 0 15px;
        }

        /* --- Kartu Detail UMKM --- */
        .umkm-details-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            background: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 95%;
            display: flex;
            flex-direction: column;
        }

        .umkm-details-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .umkm-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .umkm-category {
            font-size: 0.9rem;
            color: var(--primary-color);
            font-weight: 550;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .umkm-badge {
            display: inline-block;
            padding: 5px 12px;
            background: linear-gradient(45deg, var(--primary-color), #ff8f65);
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 107, 53, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(255, 107, 53, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 107, 53, 0);
            }
        }

        .contact-info li {
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .contact-info i {
            color: var(--primary-color);
            width: 20px;
        }

        /* --- Tombol Aksi --- */
        .btn-cta {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            margin-top: 10px;
            margin-right: 10px;
            border: none;
            cursor: pointer;
        }

        .btn-whatsapp {
            background-color: #25d366;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .btn-whatsapp:hover {
            background-color: #128c7e;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            color: white;
        }

        .btn-map {
            background: linear-gradient(45deg, var(--primary-color), #ff8f65);
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-map:hover {
            background: linear-gradient(45deg, #e55a2b, var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
            color: white;
        }

        /* --- Galeri Gambar --- */
        .main-image-wrapper {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        #main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        #main-image:hover {
            transform: scale(1.05);
        }

        .thumbnail-gallery {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            overflow-x: auto;
            padding: 5px 0;
        }

        .thumbnail-gallery::-webkit-scrollbar {
            height: 8px;
        }

        .thumbnail-gallery::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .thumbnail-gallery::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        .thumbnail-gallery::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }

        .thumbnail-item {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .thumbnail-item:hover {
            opacity: 1;
            border-color: var(--accent-color);
        }

        .thumbnail-item.active {
            opacity: 1;
            border-color: var(--primary-color);
            box-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
        }

        /* --- Kartu Deskripsi --- */
        .full-description-card {
            border: none;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border-top: 5px solid var(--primary-color);
        }

        .full-description-card h3 {
            color: var(--secondary-color);
        }

        /* --- Animasi Masuk --- */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .fade-in-up-1 {
            animation-delay: 0.1s;
        }

        .fade-in-up-2 {
            animation-delay: 0.2s;
        }

        .fade-in-up-3 {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                height: 180px;
                margin-top: 30px;
            }

            .job-wrapper {
                margin-top: 20px;
            }

            .umkm-title {
                font-size: 1.5rem;
            }

            #main-image {
                height: 250px;
            }


        }

        .discount-ribbon {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #dc3545;
            /* merah */
            color: #fff;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 700;
            border-radius: 20px;
            line-height: 1;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        /* --- Tambahan untuk Info Tambahan --- */
        .additional-info {
            margin-top: auto;
            padding-top: 15px;
        }

        .social-links {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f0f0f0;
            color: #333;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .website-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .website-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .info-row i {
            color: var(--primary-color);
            width: 20px;
            margin-right: 10px;
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">

        <div class="common-heros"></div>
        <div class="job-wrapper" style="margin-top: 50px">
            <div class="container">
                <div class="row" >
                    <!-- Kolom Kiri: Galeri Gambar -->
                    @php
                        $imagesFromJson = json_decode($umkm->gambar, true) ?? [];
                        $images = array_slice($imagesFromJson, 0, 5);
                    @endphp

                    @if (!empty($images))
                        <div class="col-lg-7 col-md-12 mb-4 fade-in-up fade-in-up-1">

                            <div class="main-image-wrapper">
                                <img id="main-image" src="{{ url('/recfil?display=true&rf=' . $images[0]) }}"
                                    alt="Gambar Utama {{ $umkm->title }}" style="width:100%;">
                            </div>

                            <div class="thumbnail-gallery"
                                style="display:grid; grid-template-columns:repeat(5,1fr); gap:6px; margin-top:6px;">

                                @foreach ($images as $index => $img)
                                    <img src="{{ url('/recfil?display=true&rf=' . $img) }}"
                                        class="thumbnail-item {{ $index == 0 ? 'active' : '' }}"
                                        data-main-image="{{ url('/recfil?display=true&rf=' . $img) }}"
                                        alt="Thumbnail {{ $index + 1 }}" style="width:100%;">
                                @endforeach

                            </div>

                        </div>
                    @endif

                    <!-- Kolom Kanan: Detail Informasi UMKM -->
                    <div class="col-lg-5 col-md-12 fade-in-up fade-in-up-2">
                        <div class="umkm-details-card p-4">
                            @if (!empty($umkm->nilai_discount) && $umkm->nilai_discount > 0)
                                <div class="discount-ribbon">
                                    <span>{{ $umkm->nilai_discount }} OFF</span>
                                </div>
                            @endif
                            <br>
                            <h1 class="umkm-title">{{ $umkm->title }}</h1>
                            <p class="umkm-category">
                                {{ $umkm->layanan ? implode(', ', json_decode($umkm->layanan, true)) : 'Layanan Umum' }}
                            </p>
                            @php
                                $badge = [
                                    0 => 'Rekomendasi',
                                    1 => 'Terlaris',
                                    2 => 'Top Rating',
                                ];
                            @endphp

                            <span class="umkm-badge">⭐ {{ $badge[$umkm->type_pilihan] ?? 'Umum' }}</span>


                            <div class="contact-info mt-3">
                                <h5 class="fw-bold">Informasi & Kontak</h5>
                                <ul class="list-unstyled mt-3">

                                    <li class="d-flex align-items-center" style="line-height:1;">
                                        <i class="fas fa-clock me-3"></i>
                                        <span>{{ $umkm->jam_buka }} - {{ $umkm->jam_tutup }}</span>
                                    </li>
                                    <li class="d-flex align-items-center" style="line-height:1;">
                                        <i class="fas fa-star me-3"></i>
                                        <span>Rating: {{ $umkm->rating ?? 'Belum ada rating' }}</span>
                                    </li>

                                    <!-- Website -->
                                    @if (!empty($umkm->website))
                                        <li class="d-flex align-items-center" style="line-height:1;">
                                            <i class="fas fa-globe me-3"></i>
                                            <a href="{{ $umkm->website }}" target="_blank" class="website-link">
                                                Kunjungi Website
                                            </a>
                                        </li>
                                    @endif
                                    <li class="d-flex align-items-center" style="line-height:1;">
                                        <i class="fas fa-map-marker-alt me-3"></i>
                                        <span>{{ $umkm->alamat ?? 'Lokasi tidak tersedia' }}</span>
                                    </li>
                                </ul>

                                <!-- Sosial Media (Versi Gambar Kustom) -->
                                @if (!empty($umkm->sosmed))
                                    @php
                                        $socialMediaItems = json_decode($umkm->sosmed, true) ?? [];
                                    @endphp
                                    @if (!empty($socialMediaItems))
                                        <h5 class="fw-bold mt-3">Sosial Media</h5>
                                        <div class="social-links">
                                            @foreach ($socialMediaItems as $social)
                                                <a href="{{ $social['link'] }}" target="_blank" class="social-link"
                                                    title="{{ ucfirst($social['nama']) }}">
                                                    <img src="{{ url('/recfil?display=true&rf=' . $social['icon']) }}"
                                                        alt="{{ $social['nama'] }}"
                                                        style="width: 20px; height: 20px; object-fit: contain;">
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            </div>

                            <div class="mt-2 d-flex gap-2">

                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->no_telp) }}?text=Halo%2C%20saya%20tertarik%20dengan%20{{ urlencode($umkm->title) }}"
                                    target="_blank" class="btn-cta btn-whatsapp"
                                    style="padding:6px 12px; font-size:13px; border-radius:20px; display:inline-flex; align-items:center; gap:5px;">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>

                                <a href="https://maps.google.com/?q={{ urlencode($umkm->lokasi) }}" target="_blank"
                                    class="btn-cta btn-map"
                                    style="padding:6px 12px; font-size:13px; border-radius:20px; display:inline-flex; align-items:center; gap:5px;">
                                    <i class="fas fa-map-marked-alt"></i> Lihat Lokasi
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Deskripsi Lengkap -->
                <div class="row mt-5">
                    <div class="col-12 fade-in-up fade-in-up-3">
                        <div class="full-description-card p-4">
                            <h3 class="fw-bold mb-3">Tentang {{ $umkm->title }}</h3>
                            <div class="event-content">
                                {!! $umkm->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mainImage = document.getElementById('main-image');
                const thumbnails = document.querySelectorAll('.thumbnail-item');

                thumbnails.forEach(thumb => {
                    thumb.addEventListener('click', function() {
                        // Hapus class active dari semua thumbnail
                        thumbnails.forEach(t => t.classList.remove('active'));
                        // Tambahkan class active ke thumbnail yang diklik
                        this.classList.add('active');
                        // Ganti gambar utama
                        mainImage.src = this.dataset.mainImage;
                    });
                });
            });
        </script>
    </body>
@endsection
