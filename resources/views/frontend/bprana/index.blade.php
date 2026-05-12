@extends('frontend.bprana.layout.main')

@section('content')
    <div id="smooth-wrapper">

        <!-- Swiper CSS sudah ada di template, tambahkan ini -->
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
                                <span class="sec_sub pxn-fade" style="color: #fff">Layanan Kami</span>
                                <h2 class="sec_title pxn-chars-reveal">Produk Layanan BPR Surya Kencana Jaya</h2>
                            </div>

                            <div class="pxn-h3_projects">
                                <div class="pxn-h3_project_item">
                                    <div class="project_img pxn-zoom-in pxn-hover-btn-wrapper">
                                        <a href="portfolio-details.html">
                                            <div class="pxn-hover-btn-item">
                                                <img src="frontend/bprana/assets/images/projects/h3-project-img-1.jpg"
                                                    alt="Project">
                                            </div>
                                        </a>

                                        <div class="project_content">
                                            <div class="project_cat">
                                                <a class="category" href="portfolio-details.html">Kredit</a>

                                            </div>
                                            <h3 class="project_title">
                                                <a href="portfolio-details.html">Business Analytics & Reporting</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="pxn-h3_project_item">
                                    <div class="project_img pxn-zoom-in pxn-hover-btn-wrapper">
                                        <a href="portfolio-details.html">
                                            <div class="pxn-hover-btn-item">
                                                <img src="frontend/bprana/assets/images/projects/h3-project-img-2.jpg"
                                                    alt="Project">
                                            </div>
                                        </a>

                                        <div class="project_content">
                                            <div class="project_cat">
                                                <a class="category" href="portfolio-details.html">Deposito</a>

                                            </div>
                                            <h3 class="project_title"><a href="portfolio-details.html">Sales and Marketing
                                                    Strategy</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="pxn-h3_project_item">
                                    <div class="project_img pxn-zoom-in pxn-hover-btn-wrapper">
                                        <a href="portfolio-details.html">
                                            <div class="pxn-hover-btn-item">
                                                <img src="frontend/bprana/assets/images/projects/h3-project-img-3.jpg"
                                                    alt="Project">
                                            </div>
                                        </a>

                                        <div class="project_content">
                                            <div class="project_cat">
                                                <a class="category" href="portfolio-details.html">Tabungan</a>

                                            </div>
                                            <h3 class="project_title"><a href="portfolio-details.html">Business Process
                                                    Optimization</a>
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
                                data-bg-image="frontend/bprana/assets/images/progress/h3-progress-bg-img.jpg">
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="progress_content_wrap">
                                            <div class="progress_content">
                                                <h2 class="title pxn-chars-reveal">Skills & Expertise</h2>
                                                <div class="desc pxn-fade" data-delay=".3">Our skills and experience are
                                                    built on years of
                                                    hands-on consulting across
                                                    diverse
                                                    industries.</div>

                                                <div class="pxn_progress_item pxn-fade" data-delay=".4">
                                                    <div class="progress_title">Business Consultants</div>

                                                    <div class="pxn_progress">
                                                        <div class="progress_bar" data-percent="65">
                                                            <span class="progress_percent">0%</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pxn_progress_item pxn-fade" data-delay=".5">
                                                    <div class="progress_title">Client Communication</div>

                                                    <div class="pxn_progress">
                                                        <div class="progress_bar" data-percent="83">
                                                            <span class="progress_percent">0%</span>
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
                                    <span class="sec_sub pxn-fade" style="color: #fff">Informasi</span>
                                    <h2 class="sec_title pxn-chars-up">Informasi Terbaru</h2>
                                </div>

                                <div class="pxn-fade d-none d-lg-inline-flex" data-delay=".3">
                                    <a href="/informasi" class="blog_more_btn pxn-btn-primary">
                                        <span class="btn_text"><span style="color: #fff">Lihat Semua..</span></span>
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

                                            <h3 class="blog_title"><a href="{{ route('detberita', $item->id) }}">
                                                    {{ \Illuminate\Support\Str::limit($item->title, 55) }}</a></h3>

                                            <a href="blog.html" class="blog_btn pxn-btn-text-inline">
                                                <span class="btn_text"><span>Detail</span></span>
                                                <span class="btn_icon"><i class="pxni-arrow-right"></i></span>
                                            </a>


                                            <div class="blog_date">
                                                <div class="blog_date_inner">
                                                    <span class="day">
                                                        {{ \Carbon\Carbon::parse($item->tanggal_tampil)->format('d') }}</span>
                                                    <span class="month_year">
                                                        {{ \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('M y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach

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
