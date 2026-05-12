@extends('frontend.bprbahari.layout.main')

@section('content')
    <style>
        /* Optimasi Animasi: Gunakan translate3d untuk akselerasi hardware */
        @keyframes marquee {
            0% {
                transform: translate3d(0, 0, 0);
            }

            100% {
                transform: translate3d(-100%, 0, 0);
            }
        }

        /* Responsive Banner */
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

        /* Responsive Running Text */
        .running-text {
            color: rgb(250, 109, 109);
            font-size: 58px;
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media(max-width:768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }

        /* Optimalisasi Scroll & Layout */
        .value-card {
            width: 420px;
            padding: 18px 22px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-sizing: border-box;
            will-change: transform;
            /* Beritahu browser elemen ini akan bergerak */
        }

        @media(max-width: 991px) {
            .value-card {
                width: 100% !important;
                margin-right: 0 !important;
                margin-left: 0 !important;
                margin-top: 10px !important;
            }
        }
    </style>

    <div style="width:100%; overflow:hidden; margin-top:100px;">
        <img src="{{ asset('frontend/bprrudo/assets/img/profil/sejarahhh.png') }}" alt="Banner" class="banner-img" style="object-fit: fill; height: auto;"
            loading="lazy">
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

    <div style="font-family:'Open Sans',sans-serif;padding:90px 20px;">
        <h2 style="text-align:center;font-weight:700;margin-bottom:20px;color:#A62C3D;">Core Value ( Nilai Nilai Utama)</h2>
        <div style="display:flex;justify-content:center; margin-bottom: 30px;">
            <img src="frontend/bprrudo/assets/img/profil/stairs.png" alt="" style="max-width:100%;height:auto;"
                loading="lazy">
        </div>

        <div style="width:90%;max-width:1200px;margin:0 auto;display:flex;flex-direction:column;">
            <p style="text-align:justify; font-size: 20px;">Core values adalah prinsip atau keyakinan yang menjadi pedoman
                sikap, perilaku, dan pembentukan budaya bagi individu maupun organisasi. Core values mencerminkan hal-hal
                yang dianggap penting dan bermakna serta menjadi landasan moral dan praktis dalam menjalankan operasional
                sehari-hari untuk mencapai tujuan organisasi.</p>
            <br>
            <p style="text-align:justify; font-size: 20px; margin-bottom: 35px;"> Core values PT BPR Rudo Indobank adalah
                Service Excellence, Target Oriented, Accountability, Integrity, Reliable, Synergy.</p>

            <div class="value-card" style="background:#FFE600;color:#333;margin-left:auto;">
                <img src="frontend/bprrudo/assets/img/profil/s.png" style="width:40px;height:70px;object-fit:contain;">
                <div>
                    <div style="font-style:italic;">Synergy</div><strong>Sinergi</strong>
                </div>
            </div>

            <div class="value-card"
                style="background:#B77D00;color:#333;margin-left:auto;margin-right:160px;margin-top:-6px;">
                <img src="frontend/bprrudo/assets/img/profil/r.png" style="width:40px;height:70px;object-fit:contain;">
                <div>
                    <div style="font-style:italic;">Reliable</div><strong>Dapat Diandalkan</strong>
                </div>
            </div>

            <div class="value-card"
                style="background:#2BB8FF;color:#333;margin-left:auto;margin-right:320px;margin-top:-6px;">
                <img src="frontend/bprrudo/assets/img/profil/i.png" style="width:40px;height:70px;object-fit:contain;">
                <div>
                    <div style="font-style:italic;">Integrity</div><strong>Integritas</strong>
                </div>
            </div>

            <div class="value-card"
                style="background:#FFBB00;color:#333;margin-left:auto;margin-right:480px;margin-top:-6px;">
                <img src="frontend/bprrudo/assets/img/profil/a.png" style="width:40px;height:70px;object-fit:contain;">
                <div>
                    <div style="font-style:italic;">Accountability</div><strong>Akuntabilitas</strong>
                </div>
            </div>

            <div class="value-card"
                style="background:#FF0000;color:#333;margin-left:auto;margin-right:640px;margin-top:-6px;">
                <img src="frontend/bprrudo/assets/img/profil/t.png" style="width:40px;height:70px;object-fit:contain;">
                <div>
                    <div style="font-style:italic;">Target Oriented</div><strong>Berorientasi Pada Target</strong>
                </div>
            </div>

            <div class="value-card" style="background:#8CD169;color:#333;margin-top:-6px;">
                <img src="frontend/bprrudo/assets/img/profil/sijo.png" style="width:40px;height:70px;object-fit:contain;">
                <div>
                    <div style="font-style:italic;">Service Excellence</div><strong>Pelayanan Prima</strong>
                </div>
            </div>

        </div>
    </div>
@endsection
