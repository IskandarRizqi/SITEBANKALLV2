@extends('frontend.bprsuryakencana.layout.main')

@section('content')
      <div class="pxn-page-header" data-bg-image="frontend/bprsuryakencana/assets/images/profil/banertop.jpg"
        style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center;">


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_header_content" style="text-align: center;">
                        <h1 class="page_title">Laporan Tahunan</h1>
                        <div class="pxn_breadcrumb">
                            <span><a href="index.html">Laporan</a></span>
                            /
                            <span class="current">Laporan Tahunan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <body class="body tg-heading-subheading animation-style3">

        <div id="superParentContainer" class="container pb-3" style="margin-top:40px;">
            <div class="row readContent">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="row d-flex justify-content-center">
                        @foreach ($tahunan as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 text-center border-0">
                                    <img src="/recfil?display=true&rf={{ $item->thumbnail }}" class="card-img-top rounded-3"
                                        alt="{{ $item->title }}"
                                        style="width: 200px; height: 300px; object-fit: fill; margin: 0 auto;">
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
