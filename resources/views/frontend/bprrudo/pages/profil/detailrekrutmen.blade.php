@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        @media (max-width: 768px) {
            .job-wrapper {
                padding: 12px;
                margin-top: 100px !important;
            }

            .job-header-title {
                font-size: 20px !important;
                line-height: 1.3;
            }

            .job-banner img {
                height: 220px !important;
            }

            .job-info-row {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 8px !important;
            }
        }

        .event-content {
            max-width: 100%;
            overflow-x: hidden;
            word-break: break-word;
            line-height: 1.7;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
        }

        .event-content img,
        .event-content iframe,
        .event-content table {
            max-width: 100% !important;
            height: auto !important;
        }

        .event-content table {
            display: block;
            overflow-x: auto;
        }

        .event-content * {
            all: revert;
        }
    </style>

    <div class="job-wrapper"
        style="max-width:1150px; margin:120px auto 40px; font-family:'Open Sans', sans-serif; color:#333;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
            <a href="javascript:history.back()" style="text-decoration:none; color:#c62828;">
                <i class="bi bi-arrow-left" style="font-size:26px; font-weight:bold;"></i>
            </a>
            <div class="job-header-title" style="font-size:25px; font-weight:700; color:#c62828;">
                {{ $detrekrutmen->judul }}
            </div>
        </div>

        <div class="job-banner" style="width:100%; border-radius:6px; overflow:hidden; margin-bottom:15px;">
            <img src="/recfil?display=true&rf={{ $detrekrutmen->gambar }}"
                style="width:100%; height:auto; object-fit:fill; border-radius:6px;">
        </div>

        <div class="job-info-row"
            style="display:flex; align-items:center; gap:25px; font-size:14px; color:#444; margin-bottom:25px; flex-wrap:wrap;">

            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/lokergudang.png" style="width:18px; height:18px;">
                <span>PT. BPR Rudo Indobank</span>
            </div>

            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/lokermap.png" style="width:18px; height:18px;">
                <span>{{ $detrekrutmen->lokasi }}</span>
            </div>

            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/loker1.png" style="width:18px; height:18px;">
                <span>{{ $detrekrutmen->tipe_pekerjaan_text }}</span>
            </div>

            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/lokertime.png" style="width:18px; height:18px;">
                <span>
                    {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_posting)->format('d/m/Y') }}
                    -
                    {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->format('d/m/Y') }}
                </span>
            </div>

        </div>

        <div class="event-content">
            {!! $detrekrutmen->deskripsi !!}
        </div>

    </div>
@endsection
