@extends('frontend.bprsulawesi.layout.main')

@section('content')
    <style>
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

    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url(frontend/bprsulawesi/assets/img/profil/banertop.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Informasi</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Berita</a></li>
                        <li class="active">Informasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Area -->
    <div class="container" style="margin-top:100px; margin-bottom:80px;">

        <div class="blog-items">
            <div class="row">

                @foreach ($all as $item)
                    <div class="single-item col-lg-4 col-md-6 mb-4">

                        <div class="item">

                            <!-- Thumbnail -->
                            <div class="thumb" style="height:250px; overflow:hidden;">

                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                    alt="{{ $item->title }}"
                                    style="width:100%; height:100%; object-fit:cover;">

                                <div class="date">
                                    {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d') }}
                                    <span>
                                        {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('M, Y') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="info">

                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-calendar"></i>
                                                {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <h4 style="min-height:70px;">
                                    <a href="{{ route('detberita', $item->id) }}">
                                        {{ \Illuminate\Support\Str::limit($item->title, 60) }}
                                    </a>
                                </h4>

                                <a class="btn-more"
                                    href="{{ route('detberita', $item->id) }}">
                                    Baca Selengkapnya
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>
    <!-- End Blog Area -->
@endsection