@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        /* RESPONSIVE GLOBAL */
        @media (max-width: 768px) {
            .job-wrapper {
                padding: 10px;
            }

            .job-header-title {
                font-size: 20px !important;
            }

            .job-banner img {
                height: 220px !important;
            }

            .job-info-row {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 10px !important;
            }

            .job-columns {
                flex-direction: column !important;
            }
        }

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
    </style>

    <div class="job-wrapper"
        style="max-width:1150px; margin:120px auto 40px; font-family:'Open Sans', sans-serif; color:#333;">

        <!-- HEADER TITLE + BACK -->
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
            <a href="javascript:history.back()" style="text-decoration:none; color:#c62828;">
                <i class="bi bi-arrow-left" style="font-size:26px; font-weight:bold;"></i>
            </a>
            <div class="job-header-title" style="font-size:25px; font-weight:700; color:#c62828;">
                {{ $lelang->title }}
            </div>
        </div>

        <!-- IMAGE BANNER -->
        <div class="job-banner" style="width:100%; border-radius:6px; overflow:hidden; margin-bottom:15px;">
            <img src="/recfil?display=true&rf={{ $lelang->banner }}"
                style="width:100%; height:auto; object-fit:fill; border-radius:6px;">
        </div>

        <!-- INFO BAR (ICON + TEXT) -->
        <div class="job-info-row"
            style="display:flex; align-items:center; gap:25px; font-size:14px; color:#444; margin-bottom:25px; flex-wrap:wrap;">

            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/wallet.png" style="width:18px; height:18px;">
                <span>Harga Limit : Rp {{ number_format($lelang->limit, 0, ',', '.') }}</span>
            </div>
            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/lokermap.png" style="width:18px; height:18px;">
                <span>{{ $lelang->kota }}, {{ $lelang->provinsi }}</span>
            </div>

            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/clock.png" style="width:18px; height:18px;">
                <span> {{ \Carbon\Carbon::parse($lelang->mulai)->format('d/m/Y') }} -
                    {{ \Carbon\Carbon::parse($lelang->selesai)->format('d/m/Y') }} </span>
            </div>
            <div style="display:flex; align-items:center; gap:6px;">
                <img src="/frontend/bprrudo/assets/img/icons/list.png" style="width:18px; height:18px;">
                <span>{{ $lelang->kategori }}</span>
            </div>
            <div style="margin-left: auto;">
                @php
                    $sekarang = \Carbon\Carbon::now();
                    $mulai = \Carbon\Carbon::parse($lelang->mulai);
                    $selesai = \Carbon\Carbon::parse($lelang->selesai);
                @endphp

                @if ($sekarang->between($mulai, $selesai))
                    {{-- Status Buka --}}
                    <div
                        style="background-color: #00c853; color: white; padding: 6px 20px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; white-space: nowrap;">
                        <i class="fa fa-info-circle"></i> Sedang Buka
                    </div>
                @else
                    {{-- Status Tutup --}}
                    <div
                        style="background-color: #ff5252; color: white; padding: 6px 20px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; white-space: nowrap;">
                        <i class="fa fa-times-circle"></i> Sudah Tutup
                    </div>
                @endif
            </div>

        </div>

        <div class="event-content">
            {!! $lelang->uraian !!}
        </div>
    </div>
@endsection
