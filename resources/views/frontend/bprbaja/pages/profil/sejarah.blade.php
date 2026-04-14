@extends('frontend.bprbaja.layout.main')

@section('content')
<style>
    .sejarah-img img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.sejarah-title {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #222;
}

.sejarah-text {
    text-align: justify;
    line-height: 1.8;
    color: #555;
}

.sejarah-content {
    padding: 20px 10px;
}

/* Mobile */
@media (max-width: 768px) {

.sejarah-img img {
    height: 260px;
}

.sejarah-title {
    font-size: 22px;
}

}
</style>
<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprbaja/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Sejarah</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Profil</a></li>
                    <li>Sejarah</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@if ($sejarah)
<div class="container py-5">
    <div class="row align-items-center g-5">

        <!-- IMAGE -->
        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
            <div class="sejarah-img">
                @if ($sejarah->banner)
                    <img 
                        src="/recfil?display=true&rf={{ $sejarah->banner }}" 
                        class="img-fluid"
                        alt="{{ $sejarah->title }}">
                @else
                    <img 
                        src="{{ asset('frontend/bprsahabattata/img/faq-img.jpg') }}"
                        class="img-fluid" 
                        alt="Image">
                @endif
            </div>
        </div>

        <!-- TEXT -->
        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
            <div class="sejarah-content">

                <h2 class="sejarah-title">
                    {{ $sejarah->title }}
                </h2>

                <div class="sejarah-text">
                    {!! $sejarah->content !!}
                </div>

            </div>
        </div>

    </div>
</div>
@endif

@endsection