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
                height: 150px;
                margin-top: 50px;
                object-fit: contain;
                margin: 50px 10px 0px 10px;
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
        
        <h2 class="subjudul">Pengurus</h2>
        
    <!-- start: About Section -->
    <section class="pxn-h1-about-section about-page">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s" style="max-width: 1000px;">
                    @if ($pengurus)
                        <article>
                            <div class="details-post-area">
                                {{-- <div class="image" style="text-align:center;">
                                    <img src="/recfil?display=true&rf={{ $pengurus->banner }}" alt="{{ $pengurus->title }}"
                                        style="border-radius:8px; height: 800px; width: 900px;">
                                </div> --}}
                                <div class="space30"></div>
                                <div class="heading1">
                                    <div class="event-content">
                                        {!! $pengurus->content !!}
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
    </section>
    </body>
    <!-- end: About Section -->
@endsection
