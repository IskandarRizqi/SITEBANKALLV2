@extends('frontend.bprphm.layout.main')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Struktur Organisasi</h2>
            </div>
        </div>
    </div>
</div>

@if ($organisasi)
<div class="about wow fadeInUp" data-wow-delay="0.1s">

    <div style="width:100vw; margin-left:calc(-50vw + 50%); text-align:center; margin-top:30px;">
        @if ($organisasi->banner)
            <img src="/recfil?display=true&rf={{ $organisasi->banner }}"
                 alt="{{ $organisasi->title }}"
                 style="width:95%; max-width:1000px; height:auto;">
        @else
            <img src="{{ asset('frontend/bprstaja/img/about.jpg') }}"
                 alt="Image"
                 style="width:95%; max-width:1900px; height:auto;">
        @endif
    </div>

    <div class="container mt-4">
        <div class="about-text" style="text-align:justify;">
            {!! $organisasi->content !!}
        </div>
    </div>

</div>
@else
<div class="container mt-4">
    <div class="alert alert-warning text-center">
        Data belum tersedia.
    </div>
</div>
@endif

@endsection