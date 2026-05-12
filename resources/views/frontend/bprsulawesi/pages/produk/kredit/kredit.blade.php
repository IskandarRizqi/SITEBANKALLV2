@extends('frontend.bprsulawesi.layout.main')

@section('content')
    <style>
        /* Banner */
        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
            }
        }

        /* Card Kredit */
        .team-box {
            margin-bottom: 30px;
        }

        .kredit-img {
            width: 100%;
            height: 400px;
            object-fit: fill;
            border-radius: 15px;
            transition: 0.3s;
        }

        .kredit-img:hover {
            transform: scale(1.03);
        }

        /* Mobile */
        @media(max-width:768px) {
            .kredit-img {
                height: auto;
            }
        }

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
                    <h2>Kredit</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Produk</a></li>
                        <li class="active">Kredit</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="case-studies-area overflow-hidden grid-items default-padding">
       
        <div class="container">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-3">

                        @foreach ($kredit as $item)
                            <div class="pf-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                            alt="{{ $item->title ?? 'kredit' }}"
                                            style="width: 100%; height: 380px; object-fit: fill; border-radius: 10px;">
                                        <a href="/recfil?display=true&rf={{ $item->thumbnail }}" class="item popup-gallery">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="tags">
                                            <a href="{{ route('detkredit', $item->id) }}">
                                                {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                            </a>
                                        </div>
                                        <h4>
                                            <a href="{{ route('detkredit', $item->id) }}">
                                                {{ \Illuminate\Support\Str::limit($item->title, 40) }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
