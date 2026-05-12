@extends('frontend.bprana.layout.main')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  

    <div class="pxn-page-header" data-bg-image="frontend/bprana/assets/images/profil/banertop.jpg"
        style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center; object-fit: fill;">


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_header_content" style="text-align: center;">
                        <h1 class="page_title">Informasi Terbaru</h1>
                        <div class="pxn_breadcrumb">
                            <span><a href="index.html">Profil</a></span>
                            /
                            <span class="current">Informasi Terbaru</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->
     <!-- start: Blog Section -->
        <section class="pxn-h2-blog-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="pxn-h2_blog_wrap">
                            

                            <div class="pxn-h2_blog_posts">
                                @foreach ($all as $item)
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

                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Blog End -->
@endsection
