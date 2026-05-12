@extends('frontend.bprana.layout.main')

@section('content')
    <div class="pxn-page-header" data-bg-image="frontend/bprana/assets/images/profil/banertop.jpg"
        style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_header_content" style="text-align: center;">
                        <h1 class="page_title">Sejarah</h1>
                        <div class="pxn_breadcrumb">
                            <span><a href="index.html">Profil</a></span>
                            /
                            <span class="current">Sejarah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start: About Section -->
    @if ($sejarah)
        <section class="pxn-h1-about-section about-page">
            <div class="bg_shape pxn-fade" data-direction="left" data-delay="1.5">
                <img src="frontend/bprana/assets/images/about/h1-about-bg-shape.png" alt="Shape">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="pxn-h1_about_wrapper">
                            <div class="pxn-h1_about_img">
                                <div class="pxn-img-reveal d-flex justify-content-end">
                                    @if ($sejarah->banner)
                                        <img src="/recfil?display=true&rf={{ $sejarah->banner }}" style="object-fit: fill"
                                            alt="{{ $sejarah->title }}">
                                    @else
                                        <img src="frontend/bprana/assets/images/about/h1-about-img-1.jpg"
                                            alt="About">
                                    @endif
                                </div>
                                <div class="border_line pxn-fade" data-direction="right" data-delay="1.3"></div>
                            </div>

                            <div class="pxn-h1_about_content">
                                <div class="section_heading">
                                    <span class="sec_sub pxn-fade" style="color: #fff">{{ $sejarah->title }}</span>
                                    <div class="sec_desc pxn-fade" style="text-align: justify;">
                                        {!! $sejarah->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- end: About Section -->
@endsection
