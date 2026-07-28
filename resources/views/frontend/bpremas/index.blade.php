@extends('frontend.bpremas.layout.main')

@section('content')
<div id="sc-page-wrapper" data-uk-ef_newsletter="" class="uk-ef_newsletter" data-ef-uid="ef-uid-1784557196115-9">
    <div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
        <div data-uk-ef_blog_post="post-type:Page;post-slug:home;" class="uk-ef_blog_post"
            data-ef-uid="ef-uid-1784557196116-10">

            <!-- PAGE SLIDER -->
            @include('frontend.bpremas.components.section_page_slider')
            <!-- END PAGE SLIDER -->

            <div class="data-uk-content_builder_render after-page-title content_builder_render"
                data-uk-content_builder_render="" data-ef-uid="ef-uid-1784557196264-30">
            </div>

            <!-- Breadcrumbs -->
            <div class="blog-main-content content_builder_render" data-ef-uid="ef-uid-1784557196252-27">
                <!-- PROMO -->
                @include('frontend.bpremas.components.section_promo')
                <!-- END PROMO -->

                <!-- BANER -->
                @include('frontend.bpremas.components.section_baner')
                <!-- END BANER -->

                <!-- BERITA -->
                @include('frontend.bpremas.components.section_berita')
                <!-- BERITA -->

                <!-- KURS SPESIAL -->
                @include('frontend.bpremas.components.section_kurs')
                <!-- END KURS SPESIAL -->

                <!-- COUNTER RATE -->
                @include('frontend.bpremas.components.section_counter_rate')
                <!-- END COUNTER RATE -->
            </div>
            <!-- BANTUAN -->
            @include('frontend.bpremas.components.section_bantuan')
            <!-- END BANTUAN -->
        </div>
    </div>
</div>
@endsection