@extends('frontend.bprkotamagelang.layout.main')

@section('content')
     <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Laporan Piagam Audit Internal
            </h4>
        </div>
    </div>

    <body class="body tg-heading-subheading animation-style3">

        <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
            <div class="row readContent">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="row d-flex justify-content-center">
                        @foreach ($piagamaudit as $item)
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
                                            class="btn btn-danger text-white fw-bold px-4">
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
