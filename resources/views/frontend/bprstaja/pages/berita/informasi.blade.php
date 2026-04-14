@extends('frontend.bprstaja.layout.main')

@section('content')
    <style>
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* jumlah baris yang ditampilkan */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .event-content {
            max-width: 100%;
            overflow-x: auto;
            /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
            word-wrap: break-word;
            /* biar teks panjang gak keluar area */
            line-height: 1.6;
            /* biar enak dibaca */
            text-align: justify;
            font-family: 'Archivo', sans-serif;
        }

        /* UNTUK CONTENT */
        .btn-tab {
            border: none;
            background: #f0f0f0;
            padding: 10px 25px;
            margin: 0 5px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-tab.active {
            background: #007bff;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .btn-tab:hover {
            background: #f80606;
            color: #fff;
        }

        .tab-content {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blog2-box .image img {
            width: 100%;
            height: 300px;
            /* atur tinggi sesuai kebutuhan */
            object-fit: cover;
            border-radius: 8px;
        }
    </style>


    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Informasi Terbaru</h2>
                </div>

            </div>
        </div>
    </div>
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
                                <p>
                                    <i class="far fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                </p>

                                <p class="ml-3">
                                    <i class="fas fa-tag"></i>
                                    {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                </p>
                            </div>

                            <div class="blog-text">
                                <h4>
                                    <a href="{{ route('detberita', $item->id) }}"
                                        style="font-weight:bold; color:#000; text-decoration:none; font-size: 20px;">
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
