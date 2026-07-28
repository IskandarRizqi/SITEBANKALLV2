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
  
    </style>
    
    <body class="body tg-heading-subheading animation-style3">

        <div class="common-heros">
        </div>

    <div class="choose-us-area overflow-hidden reverse default-padding-bottom" style="margin-top: 100px;">
        <div class="container">
            <div class="row align-center" style="display: flex; justify-content: center;">

                @if ($sejarah)
                    <div class="col-lg-6 info wow fadeInUp">
                        <h5>{{ $sejarah->title }}</h5>
                        <div style="text-align: justify;">
                            {!! $sejarah->content !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInRight" data-wow-delay="0.6s">
                            @if ($sejarah->banner)
                                <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="{{ $sejarah->title }}"
                                    style="width: 100%; object-fit: cover;">
                            @else
                                <img src="frontend/bprbahari/assets/img/illustration/1.png" alt="Thumb">
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    
    </body>

@endsection
