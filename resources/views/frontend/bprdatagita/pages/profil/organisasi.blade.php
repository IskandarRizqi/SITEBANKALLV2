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
                        <h2>Struktur Organisasi</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="about-area section-padding-100-0">
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
