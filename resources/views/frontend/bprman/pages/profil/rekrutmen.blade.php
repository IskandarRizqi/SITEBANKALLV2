@extends('frontend.bprman.layout.main')

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

            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                margin-top: 30px;
                /* tinggi tetap */
                padding: 0;
                object-fit: contain;
            }
        }

        .common-heros {
            background: url('{{ asset ('frontend/bprman/assets/images/banner/loker.jpg') }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */

            height: 170px;
            max-width: 1120px;
            margin: 100px auto 0 auto;
            border-radius: 10px;
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
    </style>
    <body class="body tg-heading-subheading animation-style3">


        <!--=====HERO AREA START=======-->

        <div class="common-heros">
            
        </div>
        <br>
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
</body>
@endsection
