@extends('frontend.bprsuryakencana.layout.main')

@section('content')
    <div id="smooth-wrapper">

       <section class="pxn-h3-hero-section" style="padding:15px; margin-top:130px;">
            <div class="swiper pxn-hero-slider">
                <div class="swiper-wrapper">

                    @foreach ($baner as $item)
                        @if (!empty($item->url) || !empty($item->url_mobile))
                            <div class="swiper-slide">

                                {{-- DESKTOP --}}
                                @if (!empty($item->url))
                                    <img src="/recfil?display=true&rf={{ $item->url }}" alt="Banner Desktop"
                                        class="d-none d-md-block"
                                        style="width:100%; height:550px; object-fit:fill; display:block; border-radius:10px;">
                                @endif

                                {{-- MOBILE --}}
                                @if (!empty($item->url_mobile))
                                    <img src="/recfil?display=true&rf={{ $item->url_mobile }}" alt="Banner Mobile"
                                        class="d-block d-md-none"
                                        style="width:100%; height:550px; object-fit:cover; display:block; border-radius:10px;">
                                @endif

                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Pagination --}}
                <div class="pxn_slider-pagination swiper-pagination"></div>
            </div>
        </section>


        <!-- start: Projects Section -->
        <section class="pxn-h3-projects-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="pxn-h3_projects_wrap">
                            <div class="section_heading text-center">
                                <span class="sec_sub pxn-fade">Layanan Kami</span>
                                <h2 class="sec_title pxn-chars-reveal">Produk Layanan BPR Surya Kencana Jaya</h2>
                            </div>

                            <div class="pxn-h3_projects">
                                <div class="pxn-h3_project_item">
                                    <div class="project_img pxn-zoom-in pxn-hover-btn-wrapper">
                                        <a href="/kredit">
                                            <div class="pxn-hover-btn-item">
                                                <img src="frontend/bprsuryakencana/assets/images/produk/kreditsurya.jpg"
                                                    alt="Project">
                                            </div>
                                        </a>

                                        <div class="project_content">
                                            <div class="project_cat">
                                                <a class="category" href="/kredit">Produk</a>
                                            </div>
                                            <h3 class="project_title">
                                                <a href="/kredit">KREDIT</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="pxn-h3_project_item">
                                    <div class="project_img pxn-zoom-in pxn-hover-btn-wrapper">
                                        <a href="/deposito">
                                            <div class="pxn-hover-btn-item">
                                                <img src="frontend/bprsuryakencana/assets/images/produk/deposurya.jpg"
                                                    alt="Project">
                                            </div>
                                        </a>

                                        <div class="project_content">
                                            <div class="project_cat">
                                                <a class="category" href="/deposito">Produk</a>
                                            </div>
                                            <h3 class="project_title"><a href="/deposito">DEPOSITO</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="pxn-h3_project_item">
                                    <div class="project_img pxn-zoom-in pxn-hover-btn-wrapper">
                                        <a href="portfolio-details.html">
                                            <div class="pxn-hover-btn-item">
                                                <img src="frontend/bprsuryakencana/assets/images/produk/tabsurya.jpg"
                                                    alt="Project">
                                            </div>
                                        </a>

                                        <div class="project_content">
                                            <div class="project_cat">
                                                <a class="category" href="/tabungan">Produk</a>

                                            </div>
                                            <h3 class="project_title"><a href="/tabungan">TABUNGAN</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Projects Section -->

        <br>

        <!-- start: Progress Section -->
        <section class="pxn-h3-progress-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="pxn-h3_progress_wrap">
                            <div class="bg_img pxn-img-parallax"
                                data-bg-image="frontend/bprsuryakencana/assets/images/progress/h3-progress-bg-img.jpg">
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="progress_content_wrap">
                                            <div class="progress_content">
                                                <h2 class="title pxn-chars-reveal">PROFILE SINGKAT</h2>
                                                <div class="desc pxn-fade" data-delay=".3">
                                                    PT. BPR Surya Kencana Jaya adalah sebuah lembaga keuangan bank yang beroperasi di Indonesia. 
                                                    BPR merupakan singkatan dari Bank Perekonomian Rakyat, yang menunjukkan bahwa Surya Kencana adalah salah satu bentuk bank yang bergerak di sektor perbankan.
                                                    Sebagai BPR, Surya Kencana fokus pada pemberian kredit kepada sektor usaha kecil dan mikro, serta masyarakat yang memiliki akses terbatas ke lembaga keuangan formal. 
                                                    Misi utama BPR Surya Kencana adalah memberikan layanan keuangan yang inklusif dan berkelanjutan kepada anggotanya, serta mendukung pertumbuhan ekonomi lokal.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Progress Section -->
        <br>

        <!-- start: Blog Section -->
        <section class="pxn-h2-blog-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="pxn-h2_blog_wrap">
                            <div class="section_heading">
                                <div class="heading_text">
                                    <span class="sec_sub pxn-fade">Informasi</span>
                                    <h2 class="sec_title pxn-chars-up">Informasi Terbaru</h2>
                                </div>

                                <div class="pxn-fade d-none d-lg-inline-flex" data-delay=".3">
                                    <a href="blog.html" class="blog_more_btn pxn-btn-primary">
                                        <span class="btn_text"><span>Lihat Semua..</span></span>
                                        <span class="btn_icon"><i class="pxni-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>

                            <div class="pxn-h2_blog_posts">
                                @foreach ($allinfo as $item)
                                    <article class="pxn_blog_post_2 pxn-fade">
                                        <div class="blog_image">
                                            <a href="blog-details.html">
                                                <img src="/recfil?display=true&rf={{ $item->thumbnail }}"
                                                    alt="{{ $item->title }}">
                                            </a>
                                        </div>
                                        <div class="blog_content" style="min-height: 180px; width: 100%;">
                                            <a href="{{ route('detberita', $item->id) }}" class="blog_category">
                                                {{ implode(', ', json_decode($item->tag, true) ?? []) }}
                                            </a>

                                            <h3 class="blog_title"><a href="{{ route('detberita', $item->id) }}">  {{ \Illuminate\Support\Str::limit($item->title, 55) }}</a></h3>

                                            <a href="blog.html" class="blog_btn pxn-btn-text-inline">
                                                <span class="btn_text"><span>Detail</span></span>
                                                <span class="btn_icon"><i class="pxni-arrow-right"></i></span>
                                            </a>


                                            <div class="blog_date">
                                                <div class="blog_date_inner">
                                                    <span class="day"> {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d') }}</span>
                                                    <span class="month_year"> {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('M y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach

                            </div>

                            <div class="more_blog_buttons text-center d-lg-none pxn-fade">
                                <a href="blog.html" class="blog_more_btn pxn-btn-primary">
                                    <span class="btn_text"><span>View All Blog</span></span>
                                    <span class="btn_icon"><i class="pxni-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {{-- Init slider --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.pxn-hero-slider', {
                loop: true,
                autoplay: {
                    delay: 4000, // ← 4 detik
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.pxn-hero-slider .swiper-pagination',
                    clickable: true,
                },
                speed: 800,
            });
        });
    </script>
    <!-- end: Hero Section -->
@endsection
