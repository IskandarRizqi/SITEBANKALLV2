@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')
<style>
    .common-hero {
        background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
        background-size: cover;
        /* default untuk desktop */
        background-position: center;
        color: #fff;
        padding: 40px 0;
        position: relative;
        margin-top: 70px;
        /* jarak dari navbar */
        text-align: center;
        /* teks ke tengah */
    }

    /* Versi Mobile */
    @media (max-width: 768px) {
        .common-hero {
            background: url('{{ asset(env(' GLOBAL_TOPMOBILE')) }}') no-repeat center center;
            background-size: cover;
            /* gambar diperbesar biar penuh */
            min-height: 180px;
            /* tinggi hero agar kelihatan besar */
            display: flex;
            align-items: center;
            /* teks di tengah vertikal */
            justify-content: center;
            /* teks di tengah horizontal */
            padding: 0;
            /* hilangkan padding default */
        }

        .common-hero h1,
        .common-hero h2,
        .common-hero .title {
            font-size: 20px;
            /* sesuaikan ukuran teks agar pas di mobile */
            font-weight: bold;
            color: #000;
            /* atau putih jika kontras dengan background */
        }
    }
</style>

<body class="body tg-heading-subheading animation-style3">


    <!--=====progress END=======-->

    <div class="paginacontainer">

        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

    </div>


    <!--=====HERO AREA START=======-->

    <div class="common-hero">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-8 m-auto">
                    <div class="main-heading">
                        <h1 style="font-size:35px; color: #fff;">Struktur Organisasi</h1>
                        <span class="span"> <a href="/">Beranda</a> <span class="arrow"><i
                                    class="fa-regular fa-angle-right"></i></span> Profil <span class="arrow"><i
                                    class="fa-regular fa-angle-right"></i></span> Struktur Organisasi <span
                                class="arrow">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--=====SERVICE DETAILS AREA START=======-->

    <div class="service-details-area-all sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">


                    <div class="sidebar-box-area sidebar-bg mb-40">
                        <h3>Profil Terkait</h3>
                        <ul class="features-list">
                            <li><a href="sejarah">Sejarah <span><i class="fa-regular fa-angle-right"></i></span></a>
                            </li>
                            <li><a href="pengurus">Pengurus <span><i class="fa-regular fa-angle-right"></i></span></a>
                            </li>
                            <li><a href="organisasi">Struktur Organisasi<span><i
                                            class="fa-regular fa-angle-right"></i></span></a></li>

                        </ul>
                    </div>

                </div>

                <div class="col-lg-8 col-md-12 col-12 ">
                    <div class="service-details-post">
                        @if($organisasi)
                        <article>
                            <div class="details-post-area">
                                <div class="image" style="text-align:center;">
                                    <img src="/recfil?display=true&rf={{ $organisasi->banner }}"
                                        alt="{{ $organisasi->title }}"
                                        style="border-radius:8px ;height: 450px; width: 900px;">
                                </div>
                                <div class="space30"></div>
                                <div class="heading1">
                                    <div class="event-content">
                                        {!! $organisasi->content !!}
                                    </div>
                                </div>
                            </div>
                        </article>
                        @else
                        <div class="alert alert-warning text-center">
                            Data tidak ditemukan.
                        </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--=====CTA AREA START=======-->



    <!--=====CTA AREA END=======-->

</body>
@endsection