@extends('frontend.bprana.layout.main')

@section('content')
<div class="pxn-page-header" data-bg-image="frontend/bprana/assets/images/profil/banertop.jpg"
    style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center;">


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="pxn_page_header_content" style="text-align: center;">
                    <h1 class="page_title">Struktur Organisasi</h1>
                    <div class="pxn_breadcrumb">
                        <span><a href="/">Profil</a></span>
                        /
                        <span class="current">Struktur Organisasi</span>
                    </div>
                </div>
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
                    <img src="/recfil?display=true&rf={{ $organisasi->banner }}" alt="{{ $organisasi->title }}"
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
@endsection