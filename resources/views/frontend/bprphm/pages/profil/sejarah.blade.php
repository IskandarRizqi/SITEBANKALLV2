@extends('frontend.bprphm.layout.main')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Sejarah</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    @if ($sejarah)
        <div class="about wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">

                            @if ($sejarah->banner)
                                <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="{{ $sejarah->title }}"
                                    style="width:100%; height:500px; object-fit:cover;">
                            @else
                                <img src="{{ asset('frontend/bprstaja/img/about.jpg') }}" alt="Image"
                                    style="width:100%; height:400px; object-fit:cover;">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="section-header text-left">
                            <p>Profil Perusahaan</p>
                            {{-- <h2 style="font-size: 20px">{{ $sejarah->title }}</h2> --}}
                        </div>

                        <div class="about-text" style="text-align:justify;">
                            {!! $sejarah->content !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endsection
