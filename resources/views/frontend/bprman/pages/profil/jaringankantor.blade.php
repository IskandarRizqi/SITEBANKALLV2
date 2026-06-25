@extends('frontend.bprbahari.layout.main')

@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }

        /* Running text */
        @keyframes marquee {
            0% {
                transform: translateX(0)
            }

            100% {
                transform: translateX(-100%)
            }
        }



        .page-wrap {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px 80px;
            background: #fff;
        }

        /* Slider container */
        .slider-box {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            position: relative;
            background: #fff;
        }


        #slideViewport {
            display: flex;
            transition: transform 0.5s ease;
            width: 100%;
        }

        .slide {
            min-width: 100%;
            padding: 40px 30px;
        }


        .slide .row {
            display: flex;
            flex-wrap: wrap;
            gap: 0;
        }

        .slide .col-left {
            flex: 0 0 66%;
            max-width: 66%;
            padding: 20px;
        }

        .slide .col-right {
            flex: 0 0 34%;
            max-width: 34%;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        @media(max-width:900px) {

            .slide .col-left,
            .slide .col-right {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }


        .info-row {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            align-items: flex-start;
        }

        .info-row img {
            width: 38px;
            height: 38px;
            object-fit: contain;
        }


        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.85);
            color: #0a1c92;
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            font-size: 22px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .nav-left {
            left: 12px;
        }

        .nav-right {
            right: 12px;
        }


        .dots {
            text-align: center;
            padding: 12px 0 22px;
        }

        .dot {
            height: 12px;
            width: 12px;
            margin: 0 6px;
            background: #bbb;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
        }

        .dot.active {
            background: #0a1c92;
        }


        @media(max-width:600px) {
            .nav-btn {
                width: 36px;
                height: 36px;
                font-size: 18px;
            }

            .info-row img {
                width: 34px;
                height: 34px;
            }

            .running-text {
                font-size: 14px;
            }
        }

        .breadcrumb-area {
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }
    </style>
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url(frontend/bprbahari/assets/img/profil/banertop.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Jaringan Kantor</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                        <li class="active">Jaringan Kantor</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="page-wrap">
        <div class="slider-box" aria-label="Slider Kantor">
            {{-- <h2 style="text-align:center; font-weight:700; color:#0a1c92; margin:26px 0 8px;">JARINGAN KANTOR</h2> --}}
            <div id="slideViewport" role="list">
                @php
                    $pusat = $kantor[0] ?? null;
                    $cabang = $kantor[1] ?? null;
                    $kas = $kantor[2] ?? null;
                @endphp
                <!-- SLIDE 1 - KANTOR PUSAT -->
                @if ($pusat)
                    <section class="slide" role="listitem" aria-label="Kantor Pusat" style="padding: 25px 60px">
                        <div class="row">
                            <div class="col-left">
                                <h3 style="color:#0a1c92; font-size:22px; margin:6px 0 18px;">Kantor Pusat</h3>

                                <div class="info-row">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/map.png') }}" alt="icon alamat">
                                    <div>
                                        <strong style="font-size:16px;">Alamat</strong><br>
                                        <span style="color:#444;">{{ $pusat->alamat }}
                                        </span>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/telp.png') }}"
                                        alt="icon telepon">
                                    <div>
                                        <strong style="font-size:16px;">No. Telepon + Fax</strong><br>
                                        <span style="color:#444;">{{ $pusat->no_telp }}</span>
                                    </div>
                                </div>

                                <div style="display:flex; gap:134px; flex-wrap:wrap;">
                                    <div class="info-row" style="gap:12px;">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/wa.png') }}" alt="icon wa">
                                        <div>
                                            <strong style="font-size:16px;">WhatsApp (Kredit)</strong><br>
                                            <span style="color:#444;">0281334084545</span>
                                        </div>
                                    </div>

                                    <div class="info-row" style="gap:2px;">

                                        <div>
                                            <strong style="font-size:16px;">WhatsApp (Tabungan & Deposito)</strong><br>
                                            <span style="color:#444;">0281334084545</span>
                                        </div>
                                    </div>
                                </div>

                                <div style="display:flex; gap:24px; margin-top:18px; flex-wrap:wrap;">
                                    <div class="info-row" style="gap:12px;">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/jam.png') }}" alt="icon jam">
                                        <div>
                                            <strong style="font-size:16px;">Jam Operasional Transaksi</strong><br>
                                            <span style="color:#444;">Senin s/d Jumat 08:00 - 15:00 WIB</span>
                                        </div>
                                    </div>

                                    <div class="info-row" style="gap:12px;">

                                        <div>
                                            <strong style="font-size:16px;">Jam Operasional Kantor</strong><br>
                                            <span style="color:#444;">Senin s/d Jumat 08:00 - 17:00 WIB</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-right">
                                <a href="https://www.google.com/maps?q={{ $pusat->latitude }},{{ $pusat->longitude }}">
                                    <img src="/recfil?display=true&rf={{ $pusat->thumbnail }}" alt="peta kantor pusat"
                                        style="width:100%; border-radius:10px;">
                                </a>

                            </div>
                        </div>
                    </section>
                @endif

                <!-- SLIDE 2 - KANTOR CABANG 1 -->
                @if ($cabang)
                    <section class="slide" role="listitem" aria-label="Kantor Cabang" style="padding: 25px 60px">
                        <div class="row">
                            <div class="col-left">
                                <h3 style="color:#0a1c92; font-size:22px; margin:6px 0 18px;">{{ $cabang->kantor }}</h3>

                                <div class="info-row">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/map.png') }}" alt="icon alamat">
                                    <div>
                                        <strong style="font-size:16px;">Alamat</strong><br>
                                        <span style="color:#444;">{{ $cabang->alamat }}
                                        </span>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/telp.png') }}"
                                        alt="icon telepon">
                                    <div>
                                        <strong style="font-size:16px;">No. Telepon + Fax</strong><br>
                                        <span style="color:#444;">{{ $cabang->no_telp }}</span>
                                    </div>
                                </div>

                                <div style="display:flex; gap:134px; flex-wrap:wrap;">
                                    <div class="info-row" style="gap:12px;">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/wa.png') }}" alt="icon wa">
                                        <div>
                                            <strong style="font-size:16px;">WhatsApp (Kredit)</strong><br>
                                            <span style="color:#444;">0281334084545</span>
                                        </div>
                                    </div>

                                    <div class="info-row" style="gap:2px;">

                                        <div>
                                            <strong style="font-size:16px;">WhatsApp (Tabungan & Deposito)</strong><br>
                                            <span style="color:#444;">0281334084545</span>
                                        </div>
                                    </div>
                                </div>

                                <div style="display:flex; gap:24px; margin-top:18px; flex-wrap:wrap;">
                                    <div class="info-row" style="gap:12px;">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/jam.png') }}"
                                            alt="icon jam">
                                        <div>
                                            <strong style="font-size:16px;">Jam Operasional Transaksi</strong><br>
                                            <span style="color:#444;">Senin s/d Jumat 08:00 - 15:00 WIB</span>
                                        </div>
                                    </div>

                                    <div class="info-row" style="gap:12px;">

                                        <div>
                                            <strong style="font-size:16px;">Jam Operasional Kantor</strong><br>
                                            <span style="color:#444;">Senin s/d Jumat 08:00 - 17:00 WIB</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-right">
                                <a href="https://www.google.com/maps?q={{ $pusat->latitude }},{{ $pusat->longitude }}"
                                    target="_blank">
                                    <img src="/recfil?display=true&rf={{ $pusat->thumbnail }}" alt="peta kantor pusat"
                                        style="width:100%; border-radius:10px;">
                                </a>
                            </div>

                        </div>
                    </section>
                @endif

                <!-- SLIDE 3 - KANTOR CABANG 2 -->
                @if ($kas)
                    <section class="slide" role="listitem" aria-label="Kantor Cabang 2" style="padding: 25px 60px">
                        <div class="row">
                            <div class="col-left">
                                <h3 style="color:#0a1c92; font-size:22px; margin:6px 0 18px;">{{ $kas->kantor }}</h3>

                                <div class="info-row">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/map.png') }}"
                                        alt="icon alamat">
                                    <div>
                                        <strong style="font-size:16px;">Alamat</strong><br>
                                        <span style="color:#444;">{{ $kas->alamat }}
                                        </span>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/telp.png') }}"
                                        alt="icon telepon">
                                    <div>
                                        <strong style="font-size:16px;">No. Telepon + Fax</strong><br>
                                        <span style="color:#444;">{{ $kas->no_telp }}</span>
                                    </div>
                                </div>

                                <div style="display:flex; gap:134px; flex-wrap:wrap;">
                                    <div class="info-row" style="gap:12px;">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/wa.png') }}"
                                            alt="icon wa">
                                        <div>
                                            <strong style="font-size:16px;">WhatsApp (Kredit)</strong><br>
                                            <span style="color:#444;">0281334084545</span>
                                        </div>
                                    </div>

                                    <div class="info-row" style="gap:2px;">

                                        <div>
                                            <strong style="font-size:16px;">WhatsApp (Tabungan & Deposito)</strong><br>
                                            <span style="color:#444;">0281334084545</span>
                                        </div>
                                    </div>
                                </div>

                                <div style="display:flex; gap:24px; margin-top:18px; flex-wrap:wrap;">
                                    <div class="info-row" style="gap:12px;">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/jam.png') }}"
                                            alt="icon jam">
                                        <div>
                                            <strong style="font-size:16px;">Jam Operasional Transaksi</strong><br>
                                            <span style="color:#444;">Senin s/d Jumat 08:00 - 15:00 WIB</span>
                                        </div>
                                    </div>

                                    <div class="info-row" style="gap:12px;">

                                        <div>
                                            <strong style="font-size:16px;">Jam Operasional Kantor</strong><br>
                                            <span style="color:#444;">Senin s/d Jumat 08:00 - 17:00 WIB</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-right">
                                <a href="https://www.google.com/maps?q={{ $kas->latitude }},{{ $kas->longitude }}"
                                    target="_blank">
                                    <img src="/recfil?display=true&rf={{ $kas->thumbnail }}" alt="peta kantor pusat"
                                        style="width:100%; border-radius:10px;">
                                </a>
                            </div>
                        </div>
                    </section>
                @endif

            </div>

            <!-- nav buttons -->
            <button class="nav-btn nav-left" id="prevBtn" aria-label="Previous slide">&#10094;</button>
            <button class="nav-btn nav-right" id="nextBtn" aria-label="Next slide">&#10095;</button>

            <!-- dots -->
            <div class="dots" id="dotsWrap" aria-hidden="false">
                <span class="dot" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewport = document.getElementById('slideViewport');
            const slides = Array.from(viewport.querySelectorAll('.slide'));
            const dots = Array.from(document.querySelectorAll('.dot'));
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let index = 0;
            const total = slides.length;

            function update() {
                // clamp index
                if (index < 0) index = total - 1;
                if (index >= total) index = 0;
                // move
                viewport.style.transform = 'translateX(' + (-index * 100) + '%)';
                // dots
                dots.forEach((d, i) => {
                    d.classList.toggle('active', i === index);
                });
            }

            // init
            update();

            // events
            prevBtn.addEventListener('click', () => {
                index -= 1;
                update();
            });
            nextBtn.addEventListener('click', () => {
                index += 1;
                update();
            });

            dots.forEach(d => {
                d.addEventListener('click', () => {
                    index = Number(d.getAttribute('data-index'));
                    update();
                });
            });

            // keyboard support
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    index -= 1;
                    update();
                }
                if (e.key === 'ArrowRight') {
                    index += 1;
                    update();
                }
            });

            // responsive: ensure slides widths are equal (not strictly necessary but safe)
            function setSlideWidths() {
                slides.forEach(s => s.style.minWidth = viewport.clientWidth + 'px');
            }
            window.addEventListener('resize', () => {
                // remove transform while calculating width, then restore
                setSlideWidths();
                update();
            });
            setSlideWidths();
        });
    </script>
@endsection
