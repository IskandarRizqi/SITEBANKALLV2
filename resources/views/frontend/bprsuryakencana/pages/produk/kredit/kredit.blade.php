@extends('frontend.bprsuryakencana.layout.main')

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
    </style>

    <div class="pxn-page-header" data-bg-image="frontend/bprsuryakencana/assets/images/profil/banertop.jpg"
        style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_header_content" style="text-align: center;">
                        <h1 class="page_title">Kredit</h1>
                        <div class="pxn_breadcrumb">
                            <span><a href="index.html">Produk</a></span>
                            /
                            <span class="current">Kredit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="pxn-projects-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_projects_wrap">
                        <div class="pxn_page_projects">

                            @foreach ($kredit as $item)
                                <div class="pxn-h3_project_item">
                                    <div class="project_img">
                                        <a href="{{ route('detkredit', $item->id) }}">
                                            <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                alt="{{ $item->title ?? 'kredit' }}"
                                                style="width: 100%; height: 450px; object-fit: fill;">
                                        </a>

                                        <div class="project_content">
                               
                                            <h3 class="project_title">
                                                <a href="{{ route('detkredit', $item->id) }}">
                                                    {{ \Illuminate\Support\Str::limit($item->title, 40) }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        {{-- Pagination --}}
                        {{-- <div class="pxn_pagination">
                            {{ $kredit->links() }}
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
