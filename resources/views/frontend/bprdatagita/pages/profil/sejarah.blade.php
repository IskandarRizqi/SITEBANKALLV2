@extends('frontend.bprdatagita.layout.main')

@section('content')
    <style>
        .justify-text {
            text-align: justify;
        }
    </style>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(frontend/bprdatagita/img/profil/top.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Sejarah</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($sejarah)
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-md-6">
                    <div class="about-content mb-100">

                        <div class="section-heading">
                            <div class="line"></div>
                            <h2>{{ $sejarah->title }}</h2>
                        </div>

                        <div class="justify-text" style="color:black">
                            {!! $sejarah->content !!}
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="about-thumbnail mb-100">

                        @if ($sejarah->banner)
                            <img src="/recfil?display=true&rf={{ $sejarah->banner }}" 
                                 alt="{{ $sejarah->title }}"
                                 style="width:100%; height:450px; object-fit:cover;">
                        @else
                            <img src="frontend/bprtanadoang/img/profil/gedung.WEBP" 
                                 alt="Sejarah"
                                 style="width:100%; height:450px; object-fit:cover;">
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif

@endsection