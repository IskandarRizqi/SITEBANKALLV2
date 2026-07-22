@extends('frontend.bprapm.layout.main')

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
        
        .judul-berita {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* jumlah baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 70px;
        }
    </style>

    

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

                                <div class="meta mt-3">

                                            <a href="#" style="color: #000;">
                                                {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') }}
                                            </a>
                                    
                                </div>

                                <h4 class="judul-berita">
                                    <a href="{{ route('detberita', $item->id) }}">
                                        {{ \Illuminate\Support\Str::limit($item->title) }}
                                    </a>
                                </h4>

                                <a class="btn-more"
                                    href="{{ route('detberita', $item->id) }}">
                                    Baca Selengkapnya...
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