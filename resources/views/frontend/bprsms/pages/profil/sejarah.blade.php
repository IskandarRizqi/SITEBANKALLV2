@extends('frontend.bprkotabaru.layout.main')

@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Sejarah
            </h4>
        </div>
    </div>

    @if ($sejarah)
        <div class="container-fluid faq py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">

                    <!-- TEXT -->
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="pb-5">
                            <h1 class="display-4" style="font-size: 30px">
                                {{ $sejarah->title }}
                            </h1>
                        </div>

                        <div class="accordion bg-light rounded p-4">
                            <div style="text-align: justify;">
                                {!! $sejarah->content !!}
                            </div>
                        </div>
                    </div>

                    <!-- IMAGE -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="faq-img RotateMoveRight rounded">

                            @if ($sejarah->banner)
                                <img src="/recfil?display=true&rf={{ $sejarah->banner }}" class="img-fluid rounded w-100"
                                    alt="{{ $sejarah->title }}" style="height:500px; object-fit:cover;">
                            @else
                                <img src="{{ asset('frontend/bprsahabattata/img/faq-img.jpg') }}"
                                    class="img-fluid rounded w-100" alt="Image">
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif

@endsection
