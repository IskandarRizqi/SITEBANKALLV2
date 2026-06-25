@extends('frontend.bprkotamagelang.layout.main')

@section('content')
    <style>

    </style>
     <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprkotamagelang/assets/img/banner/profile.jpeg')}}" alt="Breadcrumb" class="breadcrumb-img" />
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
