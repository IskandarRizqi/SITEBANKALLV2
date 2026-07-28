@extends('frontend.nusaintim.layout.main')

@section('content')
<style>
    .common-hero {
        background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
        background-size: contain;
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

        argin-top: 80px;
        /* Jarak dari navbar */
    }

    .kantor-container {
        margin: 30px auto;
        max-width: 1100px;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .section-header {
        background-color: #113ADC;
        /* biru dongker */
        color: white;
        font-weight: bold;
        padding: 10px;
        margin-top: 20px;
    }

    .kantor-item {
        padding: 15px;
        border: 1px solid #ddd;
        background: #f9f9f9;
    }

    .kantor-item strong {
        display: block;
        margin-bottom: 5px;
    }

    .kantor-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 10px;
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
                        <h1 style="font-size: 35px;">JARINGAN KANTOR</h1>
                        <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a
                                href="/">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span>
                            Jaringan Kantor <span class="arrow">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--=====SERVICE DETAILS AREA START=======-->

    <div class="kantor-container">
        <!-- KANTOR PUSAT -->
        @foreach ($kantor as $item)
        <div class="section-header">{{ $item->kantor }}</div>

        <div class="kantor-item">

            <p class="flex items-center gap-2" style="font-weight: bold">
                <i class="fa-solid fa-map-marker-alt text-red-500" style="margin-right: 10px;"></i>
                <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank"
                    style="color: inherit; text-decoration: none;">
                    {{ $item->alamat }}
                </a>
            </p>
            <p class="flex items-center gap-2" style="font-weight: bold">
                <i class="fa-solid fa-phone text-green-600" style="margin-right: 10px;"></i>
                <a href="tel:{{ $item->no_telp }}" style="color: inherit; text-decoration: none;">
                    {{ $item->no_telp }}
                </a>
            </p>

        </div>
        @endforeach
    </div>



    <div class="contact-map-page">
        <iframe src="https://www.google.com/maps/d/embed?mid=1G5OqPRRfiWj3SnZAxdJFzQB_Xuf6yY8&ehbc=2E312F&noprof=1"
            width="640" height="480"></iframe>

    </div>



</body>
@endsection