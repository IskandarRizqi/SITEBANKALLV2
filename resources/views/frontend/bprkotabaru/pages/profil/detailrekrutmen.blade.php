@extends('frontend.bprkotabaru.layout.main')

@section('content')
    <style>
        .custom-wrapper {
            padding: 40px 15px;
        }

        .custom-card {
            max-width: 850px;
            margin: auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .info-meta {
            text-align: center;
            margin-bottom: 25px;
            font-size: 14px;
            color: #666;
        }

        .info-meta span {
            margin: 0 10px;
        }

        .info-meta i {
            color: #0d6efd;
            margin-right: 5px;
        }

        .event-content {
            width: 100%;
            overflow-x: auto;
            word-break: break-word;
            line-height: 1.8;
            font-size: 15px;
            text-align: justify;
        }

        .event-content img,
        .event-content table {
            max-width: 100% !important;
            height: auto !important;
        }

        @media (max-width: 768px) {
            .custom-card {
                padding: 15px;
            }
        }
    </style>

     <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Detail Rekrutment
            </h4>
        </div>
    </div>


    <body class="body tg-heading-subheading animation-style3">
       <div class="custom-wrapper">
    <div class="custom-card">

        <div class="info-meta">
            <span>
                <i class="fa fa-briefcase"></i>
                {{ $detrekrutmen->tipe_pekerjaan_text }}
            </span>

            <span>
                <i class="fa fa-calendar"></i>
                {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d M Y') }}
            </span>

          
        </div>

        <div style="text-align:center; margin-bottom:25px;">
            <img src="/recfil?display=true&rf={{ $detrekrutmen->gambar }}"
                style="max-width:100%; height:auto; border-radius:10px;">
        </div>

        <div class="event-content">
            {!! $detrekrutmen->deskripsi !!}
        </div>

    </div>
</div>
    </body>
@endsection
