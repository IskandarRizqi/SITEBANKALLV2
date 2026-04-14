@extends('frontend.bprkotabaru.layout.main')

@section('content')
    <style>

    </style>
     <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Struktur Organisasi
            </h4>
        </div>
    </div>

   <section class="about-area section-padding-100-0" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="container">
        @if ($organisasi)
            <div class="row">
                <div class="col-12">
                    <div class="about-thumbnail mb-100" style="text-align:center;">
                        <img src="/recfil?display=true&rf={{ $organisasi->banner }}"
                             alt="{{ $organisasi->title }}"
                             style="width:100%; height:auto; border-radius:8px;">
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">
                Data Belum Terupload.
            </div>
        @endif
    </div>
</section>
    <!-- ##### About Area End ###### -->
@endsection
