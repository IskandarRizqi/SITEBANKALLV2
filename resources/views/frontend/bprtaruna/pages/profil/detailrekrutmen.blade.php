@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            /* TIDAK terpotong */
            background-color: #fff;
            /* supaya tidak ada hitam */

            height: 170px;
            max-width: 1120px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
        }


        /* Versi Mobile */
        @media (max-width: 768px) {
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                margin-top: 30px;
                /* tinggi tetap */
                padding: 0;
                object-fit: contain
            }

        }

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

    <body class="body tg-heading-subheading animation-style3">


        <!--=====HERO AREA START=======-->

        <div class="common-heros">

        </div>
        <br>
        <br>



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
