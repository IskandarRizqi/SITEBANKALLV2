@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media (max-width: 768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }

        .running-text {
            color: rgb(250, 109, 109);
          
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }

        .btn-tab {
            border: none;
            background: #f0f0f0;
            padding: 10px 22px;
            margin: 5px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            white-space: nowrap;
        }

        .btn-tab.active {
            background: #9c2b33;
            color: #fff;
        }

        .btn-tab:hover {
            background: #9c2b33;
            color: #fff;
        }

        .tab-content {
            animation: fadeIn .4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .tab-wrapper {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .lelang-card {
                flex-basis: 100% !important;
                max-width: 100% !important;
            }

            .lelang-info {
                flex-direction: column !important;
                gap: 8px;
            }
        }

        @media (max-width: 480px) {
            .running-text {
                font-size: 24px;
                padding-right: 30px;
            }

            .lelang-img {
                height: 200px !important;
            }
        }
    </style>

    <div style="width:100%; overflow:hidden; margin-top:100px;">
        <img src="{{ asset('frontend/bprrudo/assets/img/profil/lelang.png') }}" style="object-fit: fill; height: auto;" class="banner-img">
    </div>

    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -  SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
            </span>
        </div>
    </div>

    <div class="blog blog-page sp" style="padding-top:30px">
        <h2 style="text-align:center; font-weight:700; margin-bottom:30px; color:#A62C3D;">
            Informasi Lelang
        </h2>

        <div class="container">
            <div class="tab-wrapper text-center mb-4">
                <button class="btn-tab active" onclick="showTab('all', this)">Semua</button>
                <button class="btn-tab" onclick="showTab('rumah', this)">Rumah</button>
                <button class="btn-tab" onclick="showTab('kendaraan', this)">Kendaraan</button>
                <button class="btn-tab" onclick="showTab('elektronik', this)">Elektronik</button>
                <button class="btn-tab" onclick="showTab('tanah', this)">Tanah</button>
                <button class="btn-tab" onclick="showTab('pabrik', this)">Pabrik</button>
            </div>

            @php
                $tabToDbMap = [
                    'all' => 'ALL',
                    'rumah' => 'RUMAH',
                    'kendaraan' => 'KENDARAAN',
                    'elektronik' => 'ELEKTRONIK',
                    'tanah' => 'TANAH',
                    'pabrik' => 'PABRIK',
                ];
            @endphp

            @foreach ($tabToDbMap as $tabId => $dbKeyword)
                <div class="tab-content {{ $tabId != 'all' ? 'd-none' : '' }}" id="{{ $tabId }}">
                    <div
                        style="display:flex; flex-wrap:wrap; justify-content:center; gap:25px; max-width:1200px; margin:auto;">

                        @php
                            $filteredLelang = $lelang->filter(function ($item) use ($tabId, $dbKeyword) {
                                if ($tabId == 'all') {
                                    return true;
                                }
                                $categories = is_string($item->kategori)
                                    ? json_decode($item->kategori, true)
                                    : $item->kategori;
                                return is_array($categories) &&
                                    in_array($dbKeyword, array_map('strtoupper', $categories));
                            });
                        @endphp

                        @forelse ($filteredLelang as $item)
                            <div class="lelang-card"
                                style="flex-basis:45%; max-width:48%; background:#fff; border-radius:15px; box-shadow:0 4px 12px rgba(0,0,0,.12); overflow:hidden; display:flex; flex-direction:column;">

                                <img src="/recfil?rf={{ $item->thumbnail }}" class="lelang-img"
                                    style="width:100%; height:280px; object-fit:fill;">

                                <div style="padding:15px 20px; display:flex; flex-direction:column; flex:1;">
                                    <h3 style="font-size:17px; font-weight:700; margin-bottom:14px;">
                                        {{ $item->title }}
                                    </h3>

                                    <div class="lelang-info"
                                        style="display:flex; justify-content:space-between; margin-bottom:10px;">
                                        <div style="display:flex; align-items:center; gap:6px;">
                                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/wallet.png') }}"
                                                width="18">
                                            <strong>Rp {{ number_format($item->limit, 0, ',', '.') }}</strong>
                                        </div>
                                        <div style="display:flex; align-items:center; gap:6px;">
                                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/lokermap.png') }}"
                                                width="18">
                                            <span>{{ $item->kota }}</span>
                                        </div>
                                    </div>

                                    <div class="lelang-info"
                                        style="display:flex; justify-content:space-between; margin-bottom:20px;">
                                        <div style="display:flex; align-items:center; gap:6px;">
                                            <img src="{{ asset('frontend/bprrudo/assets/img/icons/clock.png') }}"
                                                width="18">
                                            <span>{{ \Carbon\Carbon::parse($item->selesai)->translatedFormat('d M Y') }}</span>
                                        </div>
                                        <span
                                            style="font-size:12px; background:#f0f0f0; padding:3px 10px; border-radius:12px;">
                                            {{ $item->type_text }}
                                        </span>
                                    </div>

                                    <a href="/detlelang/{{ $item->id }}"
                                        style="margin-top:auto; text-decoration:none;">
                                        <button
                                            style="width:100%; background:#b72a3a; color:#fff; padding:12px; border:none; border-radius:25px;">
                                            Lihat Detail
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div style="width:100%; text-align:center; padding:40px;">
                                <p style="color:#999;">Data belum tersedia</p>
                            </div>
                        @endforelse

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function showTab(tabId, btn) {
            document.querySelectorAll('.tab-content').forEach(t => t.classList.add('d-none'));
            document.getElementById(tabId).classList.remove('d-none');
            document.querySelectorAll('.btn-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        }
    </script>
@endsection
