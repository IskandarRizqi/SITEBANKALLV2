@extends('frontend.bprphm.layout.main')

@section('content')
    <style>
        
        custom-wrapper {
            padding: 30px 15px;
        }

        .custom-card {
            max-width: 850px;
            margin: auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
        }

        @media (max-width: 768px) {
            .custom-card {
                padding: 15px;
            }

            .custom-title {
                font-size: 20px !important;
            }
        }

        .event-content {
            width: 100%;
            overflow-x: auto;
            word-break: break-word;
            line-height: 1.6;
            font-size: 15px;
        }

        .event-content img,
        .event-content table {
            max-width: 100% !important;
            height: auto !important;
        }
    </style>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Detail Rekruitment</h2>
                </div>

            </div>
        </div>
    </div>


    <body class="body tg-heading-subheading animation-style3">
        <div class="custom-wrapper">
            <div class="custom-card">

                <h2 class="custom-title" style="text-align:center; font-size:28px; margin-bottom:15px;">
                    {{ $detrekrutmen->judul }}
                </h2>

                <div style="text-align:center; margin-bottom:20px; font-size:14px;">
                    {{ $detrekrutmen->tipe_pekerjaan_text }}
                    |
                    {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('d/m/Y') }}
                    -
                    {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d/m/Y') }}
                </div>

                <div style="text-align:center; margin-bottom:20px;">
                    <img src="/recfil?display=true&rf={{ $detrekrutmen->gambar }}"
                        style="max-width:100%; height:auto; border-radius:8px;">
                </div>

                <div class="event-content">
                    {!! $detrekrutmen->deskripsi !!}
                </div>

            </div>
        </div>

        <br>
    </body>
@endsection
