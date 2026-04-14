@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        /* ===== WRAPPER ===== */
        .job-wrapper {
            max-width: 1150px;
            margin: 120px auto 40px;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        .job-header-title {
            font-size: 25px;
            font-weight: 700;
            color: #c62828;
        }

        /* ===== BANNER ===== */
        .job-banner img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }

        /* ===== INFO BAR ===== */
        .job-info-row {
            display: flex;
            align-items: center;
            gap: 25px;
            font-size: 14px;
            color: #444;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .job-info-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .job-info-item img {
            width: 18px;
            height: 18px;
        }

        /* ===== EVENT CONTENT ===== */
        .event-content {
            max-width: 100%;
            overflow-x: auto;
            word-wrap: break-word;
            line-height: 1.6;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
        }

        .event-content * {
            all: revert;
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .job-wrapper {
                padding: 10px;
                margin-top: 100px;
            }

            .job-header-title {
                font-size: 20px;
            }

            .job-banner img {
                height: 220px;
            }

            .job-info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .job-banner img {
                height: 200px;
            }
        }
    </style>

    <div class="job-wrapper">


        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
            <a href="javascript:history.back()" style="text-decoration:none; color:#c62828;">
                <i class="bi bi-arrow-left" style="font-size:26px; font-weight:bold;"></i>
            </a>

            <div class="job-header-title">
                {{ $eventberita->title }}
            </div>
        </div>

        <div class="job-banner" style="margin-bottom:15px;">
            <img src="/recfil?display=true&rf={{ $eventberita->banner }}" alt="Event Banner">
        </div>

        <div class="job-info-row">

            <div class="job-info-item">
                <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokertime.png') }}">
                <span>{{ \Carbon\Carbon::parse($eventberita->tanggal_posting)->format('d/m/Y') }}</span>
            </div>

            <div class="job-info-item">
                <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokermap.png') }}">
                <span>{{ $eventberita->tag }}</span>
            </div>

            <div class="job-info-item">
                <img src="{{ asset('frontend/bprrudo/assets/img/icons/loker1.png') }}">
                <span>{{ $eventberita->kategori }}</span>
            </div>

        </div>

        <div class="event-content">
            {!! $event->content !!}
        </div>

    </div>
@endsection
