@extends('frontend.bpreleska.layout.main')

@section('content')
    <style>
        .justify-text {
            text-al
            ign: justify;
        }
        
    </style>
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bpreleska/assets/img/banner/banner1.jpg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>

    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s">
                 @if ($pengurus)
                        <article>
                            <div class="details-post-area">
                                <div class="image" style="text-align:center;">
                                    <img src="/recfil?display=true&rf={{ $pengurus->banner }}" alt="{{ $pengurus->title }}"
                                        style="border-radius:8px; height: 800px; width: 900px;">
                                </div>
                                <div class="space30"></div>
                                <div class="heading1">
                                    <div class="event-content">
                                        {!! $pengurus->content !!}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @else
                        <div class="alert alert-warning text-center">
                            Data tidak ditemukan.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>


    <!-- ##### About Area End ###### -->
@endsection
