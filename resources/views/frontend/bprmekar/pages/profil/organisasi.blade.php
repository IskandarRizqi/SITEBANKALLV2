@extends('frontend.bprmekar.layout.main')

@section('content') 
    <style>

    </style>
     <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Struktur Organisasi</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Profil</a></li>
                        <li>Struktur Organisasi</li>
                    </ul>
                </div>
            </div>
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
