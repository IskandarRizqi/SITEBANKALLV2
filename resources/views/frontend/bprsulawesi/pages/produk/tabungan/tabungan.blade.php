@extends('frontend.bprsulawesi.layout.main')

@section('content')
    <style>
        /* Running text animation */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
        .team-box {
            margin-bottom: 30px;
        }


        /* Responsive Banner */
        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
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
        } .breadcrumb-area {
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
                    <h2>Tabungan</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Produk</a></li>
                        <li class="active">Tabungan</li>
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

                        @foreach ($tabungan as $item)
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
                                            <a href="{{ route('dettabungan', $item->id) }}">
                                                {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                            </a>
                                        </div>
                                        <h4>
                                            <a href="{{ route('dettabungan', $item->id) }}">
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
