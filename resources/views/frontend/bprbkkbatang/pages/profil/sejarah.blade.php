@extends('frontend.bprbkkbatang.layout.main')

@section('content')
    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprbkkbatang/assets/img/banner/profile.jpeg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>

    @if ($sejarah)
        <div class="container-fluid faq py-5">
        <h5 class="display-4 wow fadeInDown" style="color: #000; text-align: center; margin-top: 30px;" data-wow-delay="0.1s">SEJARAH</h5>
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
                                <img src="{{ asset('frontend/bprbkkbatang/img/faq-img.jpg') }}"
                                    class="img-fluid rounded w-100" alt="Image">
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif

@endsection
