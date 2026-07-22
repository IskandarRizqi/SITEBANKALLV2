@extends('frontend.bprman.layout.main')

@section('content')
    <style>
        .navbar,
        .navbar-area,
        .header-area,
        header {
            background: #fff !important;
            position: relative;
            z-index: 999;
        }

        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
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

        .section-header {
            font-weight: 600;
            padding: 1.5rem;
            color: #1f2937;
        }

        .section-content {
            padding: 0 1.5rem 1.5rem;
        }

        .border-line {
            height: 4px;
            width: 100%;
            background-color: #e5e7eb;
        }

        .blue-line {
            width: 8px;
            height: 100%;
            background-color: #3b82f6;
            margin-right: 1rem;
            border-radius: 4px;
        }
        
        .subjudul {
            text-align: center;
            margin-bottom: 0px;
            padding-top: 20px;
        }
  
    </style>
    
   <body class="body tg-heading-subheading animation-style3">
            
            <div class="common-heros">
        </div>
        
        <h2 class="subjudul">Struktur Organisasi</h2>
        
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
</body>
@endsection
