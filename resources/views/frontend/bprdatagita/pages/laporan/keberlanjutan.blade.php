@extends('frontend.bprdatagita.layout.main')

@section('content')
    
   <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(frontend/bprdatagita/img/profil/top.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Laporan Keberlanjutan</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan Keberlanjutan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <body class="body tg-heading-subheading animation-style3">

        <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
            <div class="row readContent">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="row d-flex justify-content-center">
                        @foreach ($keberlanjutan as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 text-center border-0">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}" class="card-img-top rounded-3"
                                        alt="{{ $item->title }}"
                                        style="width: 200px; height: 300px; object-fit: cover; margin: 0 auto;">
                                    <div class="card-body">
                                        <h6 class="text-muted">Laporan</h6>
                                        <h6 class="fw-bold">{{ strtoupper($item->title) }}</h6>
                                        <br>
                                        <a href="/recfil?display=true&rf={{ $item->url }}" target="_blank"
                                            class="btn btn-success text-white fw-bold px-4">
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- End Row -->
                </div>
            </div>
        </div>

        <!-- END CONTENT PART -->

        <!--=====CTA AREA START=======-->



        <!--=====CTA AREA END=======-->

    </body>
@endsection
