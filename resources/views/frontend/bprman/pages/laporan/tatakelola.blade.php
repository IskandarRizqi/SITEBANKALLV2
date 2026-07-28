@extends('frontend.bprman.layout.main')

@section('content')

    <style>
        .breadcrumb-area {
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }

        .judullap{
        text-align: center;
        margin-bottom: 0px;
        margin-top: 120px;
    }
    </style>
@section('content')
    <body class="body tg-heading-subheading animation-style3">
    <h2 class="judullap">Laporan Tata Kelola</h2>
        <!-- BEGIN CONTENT PART -->
        <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
            <div class="row readContent">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="row d-flex justify-content-center">

                        @foreach ($tatakelola as $item)
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
                                            class="btn btn-warning text-white fw-bold px-4">
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
