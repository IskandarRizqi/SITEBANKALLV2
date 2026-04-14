@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        .job-wrapper {
            max-width: 1150px;
            margin: 120px auto 40px;
            padding: 0 16px;
            font-family: 'Open Sans', sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        .job-header-title {
            font-size: 26px;
            font-weight: 700;
            color: #c62828;
        }

        .job-banner {
            width: 100%;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .job-banner img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }


        .event-content {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            word-wrap: break-word;
            word-break: break-word;
            line-height: 1.7;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
        }


        .event-content * {
            all: revert;
        }

        .event-content img,
        .event-content iframe,
        .event-content video {
            max-width: 100% !important;
            height: auto !important;
            display: block;
        }

        .event-content table {
            width: 100% !important;
            max-width: 100%;
            display: block;
            overflow-x: auto;
        }


        .action-buttons {
            display: flex;
            gap: 40px;
            margin-top: 60px;
            flex-wrap: wrap;
        }

        .action-buttons a {
            flex: 1;
            background: #a32638;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
        }


        @media (max-width: 768px) {

            .job-wrapper {
                margin: 90px auto 30px;
                padding: 0 14px;
            }

            .job-header-title {
                font-size: 20px;
                line-height: 1.3;
            }

            .job-banner img {
                height: 220px;
            }

            .content-flex {
                flex-direction: column;
                gap: 30px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 16px;
                margin-top: 40px;
            }

            .action-buttons a {
                font-size: 16px;
                padding: 16px;
            }

            .info-rows {
                flex-direction: column;
            }

            .info-rows div {
                width: 100% !important;
            }
        }
    </style>

    <div class="job-wrapper">

        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;">
            <a href="javascript:history.back()" style="text-decoration:none; color:#c62828;">
                <i class="bi bi-arrow-left" style="font-size:26px; font-weight:bold;"></i>
            </a>


            <div class="job-header-title">
                {{ $tabungan->title ?? 'Tabungan' }}
            </div>
        </div>
        <div class="job-banner">
            <img src="/recfil?display=true&rf={{ $tabungan->banner }}" style="object-fit: fill" alt="Banner">
        </div>

        <div style="max-width:1200px;margin:0 auto;">
            <div class="content-flex" style="display:flex;gap:80px;flex-wrap:wrap;">
                <div style="flex:1;">
                    <div class="event-content">
                        {!! $tabungan->content !!}
                    </div>
                </div>
            </div>
            <div style="margin-top:30px;">
                <a href="/formpengajuantabungan"
                    style="display:inline-block; background:#0d6efd; color:#fff; padding:12px 30px; border-radius:20px; font-size:16px; font-weight:600;
                    text-decoration:none;cursor:pointer;">
                    AJUKAN
                </a>
            </div>


            <div class="action-buttons">

                <a href="javascript:void(0)" onclick="openFile('{{ $tabungan->brosur }}')">
                    Lihat Brosur
                </a>

                <a href="javascript:void(0)" onclick="openFile('{{ $tabungan->riplay }}')">
                    Ringkasan Informasi Produk dan Layanan (RIPLAY)
                </a>

            </div>
        </div>

    </div>
    <script>
        function openFile(file) {
            if (!file) {
                alert('Data tidak tersedia');
                return;
            }

            window.open('/recfil?display=true&rf=' + encodeURIComponent(file), '_blank');
        }
    </script>
@endsection
