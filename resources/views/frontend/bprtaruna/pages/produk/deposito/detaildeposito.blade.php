@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
        .job-wrapper {
            max-width: 1150px;
            margin: 0px auto 40px;
            padding: 0 16px;
            font-family: 'Open Sans', sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        .job-header-title {
            font-size: 26px;
            font-weight: 700;
            color: #000000;
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


        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px; margin-top: 100px;">
            <a href="javascript:history.back()" style="text-decoration:none; color:#000000;">
                <i class="bi bi-arrow-left" style="font-size:26px; font-weight:bold;"></i>
            </a>

            <div class="job-header-title">
                {{ $deposito->title ?? 'Deposito' }}
            </div>
        </div>


        <div class="job-banner">
            <img src="/recfil?display=true&rf={{ $deposito->banner }}" style="object-fit: fill" alt="Banner">
        </div>


        <div style="max-width:1200px;margin:0 auto;">
            <div class="content-flex" style="display:flex;gap:80px;flex-wrap:wrap;">
                <div style="flex:1;">
                    <div class="event-content">
                        {!! $deposito->content !!}
                    </div>
                </div>
            </div>
            <div style="margin-top:30px;">
                <a href="/formpengajuandeposito"
                    style="display:inline-block; background:#0d6efd; color:#fff; padding:12px 30px; border-radius:20px; font-size:16px; font-weight:600;
                    text-decoration:none;cursor:pointer;">
                    AJUKAN
                </a>
            </div>

            <div class="action-buttons">

                <a href="javascript:void(0)" onclick="openFile('{{ $deposito->brosur }}')">
                    Lihat Brosur
                </a>

                <a href="javascript:void(0)" onclick="openFile('{{ $deposito->riplay }}')">
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


{{-- <div class="job-wrapper"
        style="max-width:1150px; margin:120px auto 40px; font-family:'Open Sans', sans-serif; color:#333;">

        <!-- HEADER TITLE + BACK -->
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
            <a href="javascript:history.back()"
                style="text-decoration:none;color:#c62828;font-size:34px;font-weight:200;display:inline-block;line-height:1;">
                &lt;
            </a>

            <div class="job-header-title" style="font-size:26px; font-weight:700; color:#c62828;">
                Deposito Berjangka
            </div>
        </div>

        <!-- IMAGE BANNER -->
        <div class="job-banner" style="width:100%; border-radius:6px; overflow:hidden; margin-bottom:15px;">
            <img src="{{ asset('frontend/bprrudo/assets/img/profil/rec1.png') }}"
                style="width:100%; height:420px; object-fit:cover; border-radius:6px;">
        </div>



        <!-- DESKRIPSI -->
        <div style="font-size:22px; font-weight:700; color:#c62828; margin-bottom:10px;">
            Deskripsi
        </div>

        <div style="font-size:15px; line-height:1.8; margin-bottom:25px; color:#444;">
            Tabungan umum memberikan keuntungan dan kemudahan sebagai tabungan untuk memenuhi kebutuhan dan investasi masa
            depan anda. Suku bunga yang diberikan sangat kompetitif karena dihitung berdasarkan saldo harian.
        </div>

        <!-- WRAPPER -->
        <div style="max-width:1200px;margin:0 auto;font-family:'Open Sans',sans-serif;">

            <!-- 2 COLUMN CONTENT -->
            <div style="display:flex;gap:80px;flex-wrap:wrap;">

                <!-- KIRI -->
                <div style="flex:1;min-width:320px;">
                    <h3 style="color:#a32638;font-size:22px;font-weight:700;margin-bottom:15px;">
                        Syarat & Ketentuan
                    </h3>
                    <ul style="list-style-type: disc; padding-left:20px;line-height:1.9;margin:0;">
                        <li>Minimal Rp. 1.000.000,00</li>
                        <li>Tingkat suku bunga menarik.</li>

                        <li>Jangka waktu dapat disesuaikan dengan kebutuhan.</li>
                        <li>Dapat dijadikan jaminan deposito.</li>
                        <li>Beragam pilihan pengambilan bunga :
                            <ul>
                                <li>

                                    <ul>
                                        <li>1. Dapat diambil secara tunai</li>
                                        <li>2. Didepositokan langsung ke rekening tabungan</li>
                                        <li>3. Ditransfer ke rekening bank lain</li>
                                        <li>4. Automatic Roll Over (ARO) + bunga</li>
                                    </ul>
                                </li>
                            </ul>

                        </li>

                    </ul>
                </div>

                <!-- KANAN -->
                <div style="flex:1;min-width:320px;">
                    <h3 style="color:#a32638;font-size:22px;font-weight:700;margin-bottom:15px;">
                        Informasi Tambahan
                    </h3>

                    <!-- HEADER -->
                    <div style="display:flex;font-weight:700;color:#a32638;margin-bottom:12px;">
                        <div style="flex:1;">Janka Waktu</div>
                        <div style="width:180px;">Bunga</div>
                    </div>

                    <!-- ROW -->
                    <div style="display:flex;margin-bottom:10px;">
                        <div style="flex:1;">1 Bulan</div>
                        <div style="width:180px;">4,25%</div>
                    </div>
                    <div style="display:flex;margin-bottom:10px;">
                        <div style="flex:1;">3 Bulan</div>
                        <div style="width:180px;">4,50%</div>
                    </div>
                    <div style="display:flex;margin-bottom:10px;">
                        <div style="flex:1;">6 Bulan</div>
                        <div style="width:180px;">5,00%</div>
                    </div>
                    <div style="display:flex;margin-bottom:10px;">
                        <div style="flex:1;">12 Bulan</div>
                        <div style="width:180px;">5,25%</div>
                    </div>

                </div>
            </div>

            <!-- BUTTON -->
            <div style="display:flex;gap:40px;margin-top:60px;flex-wrap:wrap;">

                <!-- PREVIEW GAMBAR -->
                <a href="{{ asset('frontend/bprrudo/assets/img/produk/tabungan/thumbtab.png') }}" target="_blank"
                    style="flex:1;background:#a32638;color:#fff;text-align:center;
                padding:20px;border-radius:50px;font-size:18px;font-weight:700;text-decoration:none;">
                    Lihat Brosur
                </a>

                <!-- PREVIEW PDF -->
                <a href="{{ asset('frontend/bprrudo/assets/img/produk/tabungan/contoh.pdf') }}" target="_blank"
                    style="flex:1;background:#a32638;color:#fff;text-align:center;
                padding:20px;border-radius:50px;font-size:18px;font-weight:700;text-decoration:none;">
                    Ringkasan Informasi Produk dan Layanan (RIPLAY)
                </a>

            </div>


        </div>


    </div> --}}
