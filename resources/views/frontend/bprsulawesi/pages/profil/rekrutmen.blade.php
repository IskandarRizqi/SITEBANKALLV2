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
                    <h2>Karir</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                        <li class="active">Karir</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="pxn-h1-blog-section section-padding" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn-h1_blog_wrap">

                        <div class="pxn-h1_blog_posts">
                            @forelse ($rekruitmen as $item)
                                <article class="pxn_blog_post pxn-fade">
                                    <div class="pxn_blog_post_inner">
                                        <div class="blog_meta">
                                            <div class="meta">
                                                <i class="pxni-author"></i>
                                                <span class="meta_text"><a href="#">{{ $item->lokasi }}</a></span>
                                            </div>

                                            <span class="meta_divider"></span>

                                            <div class="meta">
                                                <i class="pxni-comments"></i>
                                                <span class="meta_text">
                                                    @if ($item->tipe_pekerjaan == 1)
                                                        Full-time
                                                    @elseif ($item->tipe_pekerjaan == 2)
                                                        Part-time
                                                    @elseif ($item->tipe_pekerjaan == 3)
                                                        Kontrak
                                                    @else
                                                        Magang
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="blog_image">
                                            <a href="{{ route('detrekrutmen', $item->id) }}">
                                                <img src="/recfil?display=true&rf={{ $item->gambar }}" alt="Blog">
                                            </a>
                                        </div>

                                        <div class="blog_content">
                                            <div class="blog_date">
                                                <span class="day">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d') }}</span>
                                                <span class="month_year">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->translatedFormat('M y') }}</span>
                                            </div>

                                            <a href="#" class="blog_category">Rekruitmen</a>

                                            <h3 class="blog_title"><a
                                                    href="{{ route('detrekrutmen', $item->id) }}">{{ $item->judul }}</a>
                                            </h3>

                                            <a href="{{ route('detrekrutmen', $item->id) }}"
                                                class="blog_btn pxn-btn-text-inline">
                                                <span class="btn_text"><span>Detail</span></span>
                                                <span class="btn_icon"><i class="pxni-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @empty

                                <div class="col-12 text-center">
                                    <div class="alert alert-info">
                                        <h5>Belum Ada Lowongan Tersedia</h5>
                                        <p>Silakan cek kembali nanti untuk informasi karir terbaru.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <br>
                    {{-- <div class="section_heading d-flex justify-content-end">
                        <div class="pxn-fade d-none d-lg-inline-flex" data-delay=".3">
                            <a href="blog.html" class="blog_more_btn pxn-btn-primary">
                                <span class="btn_text"><span>Selengkapnya..</span></span>
                                <span class="btn_icon"><i class="pxni-arrow-right"></i></span>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
