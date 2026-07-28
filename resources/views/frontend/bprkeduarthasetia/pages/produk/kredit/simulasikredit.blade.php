@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')

<style>
    .common-hero {
        background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
        background-size: cover;
        /* default untuk desktop */
        background-position: center;
        color: #fff;
        padding: 40px 0;
        position: relative;
        margin-top: 70px;
        /* jarak dari navbar */
        text-align: center;
        /* teks ke tengah */
    }

    .event-content {
        max-width: 100%;
        overflow-x: auto;
        /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
        word-wrap: break-word;
        /* biar teks panjang gak keluar area */
        line-height: 1.6;
        /* biar enak dibaca */
        text-align: justify;
        font-family: 'Archivo', sans-serif;
    }

    .bullet-list {
        list-style: disc !important;
        padding-left: 18px !important;
    }

    /* Versi Mobile */
    @media (max-width: 768px) {
        .common-hero {
            background: url('{{ asset(env(' GLOBAL_TOPMOBILE')) }}') no-repeat center center;
            background-size: cover;
            /* gambar diperbesar biar penuh */
            min-height: 180px;
            /* tinggi hero agar kelihatan besar */
            display: flex;
            align-items: center;
            /* teks di tengah vertikal */
            justify-content: center;
            /* teks di tengah horizontal */
            padding: 0;
            /* hilangkan padding default */
        }

        .common-hero h1,
        .common-hero h2,
        .common-hero .title {
            font-size: 20px;
            /* sesuaikan ukuran teks agar pas di mobile */
            font-weight: bold;
            color: #000;
            /* atau putih jika kontras dengan background */
        }
    }
</style>

<body class="body tg-heading-subheading animation-style3">


    <!--=====progress END=======-->

    <div class="paginacontainer">

        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

    </div>





    <!--=====HERO AREA START=======-->

    <div class="common-hero">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-8 m-auto">
                    <div class="main-heading">
                        <h1 style="font-size: 35px; color: #fff;">SIMULASI KREDIT</h1>
                        <span class="span"> <a href="/">Simulasi</a> <span class="arrow"><i
                                    class="fa-regular fa-angle-right"></i></span> Simulasi Kredit
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--=====TEAM AREA START=======-->
    <div style="width:83%; margin:auto;   background: linear-gradient(45deg, #611641, #06135c); padding:35px; border-radius:15px; margin-top:50px; margin-bottom: 50px; display:flex; flex-direction:column;"
        class="simulasi-wrapper">

        <div class="simulasi-wrapper" style="display:flex;">

            <div class="simulasi-left" style="width:55%; color:white; padding-right:20px;" class="simulasi-left">

                <h3 style="font-weight:600; margin-bottom:25px; display:flex; align-items:center; color:white;">
                    <img src="frontend/bprdatagita/img/produk/iconsimulasi.png" style="width:50px; margin-right:10px; ">
                    Simulasi Kredit
                </h3>


                <label style="font-size:14px;; color: #fff;">Plafon Pembiayaan</label>
                <div style="display:flex; align-items:center; background:white; border-radius:30px;
                        padding:8px 20px; margin-bottom:18px;">
                    <span style="color:#0a1c92; font-weight:bold; margin-right:10px;">Rp.</span>

                    <input type="text" id="plafon" placeholder="Ketik disini"
                        style="border:none; outline:none; width:100%; font-size:14px;">
                </div>

                <label style="font-size:14px; color: #fff">Lama Angsuran</label>
                <div style="display:flex; align-items:center; background:white; border-radius:30px;
                        padding:8px 20px; margin-bottom:18px;">

                    <input type="text" id="tenor" placeholder="Ketik disini"
                        style="border:none; outline:none; width:100%; font-size:14px;">

                    <span style="color:#0a1c92; font-weight:bold; margin-left:10px;">Bulan</span>
                </div>

                <label style="font-size:14px; color: #fff">Bunga</label>
                <div style="display:flex; align-items:center; background:white; border-radius:30px;
                        padding:8px 20px; margin-bottom:18px;">

                    <input type="text" id="bunga" placeholder="Ketik disini"
                        style="border:none; outline:none; width:100%; font-size:14px;">

                    <span style="color:#0a1c92; font-weight:bold; white-space:nowrap; margin-left:10px;">
                        % / Tahun
                    </span>
                </div>

                <label style="font-size:14px; color: #fff">Sistem Angsuran</label>
                <div style="background:white; border-radius:30px; padding:0; margin-bottom:30px;">

                    <select id="sistem" style="width:100%; padding:8px 20px; border-radius:30px;
                        border:none; outline:none; font-size:14px;
                        appearance:none; -webkit-appearance:none; -moz-appearance:none;
                        background:white url('data:image/svg+xml;utf8,<svg fill=\'%23f71827\' height=\'18\' viewBox=\'0 0 24 24\' width=\'18\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>') 
                        no-repeat right 20px center;">
                        <option value="">Pilih</option>
                        <option value="flat">Flat</option>
                        <option value="anuitas">Anuitas</option>
                    </select>

                </div>


                <div style="display:flex; justify-content:space-between; gap:20px; margin-top:5px; margin-bottom:20px;  padding:7px 20px;"
                    class="simulasi-buttons">

                    <button id="btnReset" style="width:40%; padding:7px; border-radius:40px; background: #06135c;
                                border:none; color:white; font-size:18px; font-weight:500; cursor:pointer;">
                        Reset
                    </button>

                    <button id="btnHitung" style="width:55%; padding:7px; border-radius:40px; background:#efefef;
                                border:none; color: #06135c; font-weight:500; font-size:18px; cursor:pointer;">
                        Hitung
                    </button>

                </div>

            </div>


            <div class="simulasi-right" style="width:45%; display:flex; align-items:center; justify-content:center;"
                class="simulasi-right">
                <img src="frontend/bprdatagita/img/produk/simulasikredit.png"
                    style="width:95%; height: 350px; border-radius:10px;">
            </div>

        </div>


        <div id="hasilSimulasiContainer" style="width:100%; margin-top:30px; display:none;">
            <div style="background:white; border-radius:10px; padding:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
                <h4 style="color:#000; margin-bottom:15px; text-align:center;">Hasil Simulasi Pinjaman</h4>
                <div id="hasilSimulasi" style="width:100%;"></div>
            </div>
        </div>

    </div>


</body>

<script>
    function customRound(number) {
            const last2 = String(Math.round(number)).slice(-2);
            const val = Number(last2);
            if (val === 0) return Math.round(number);

            if (val <= 50) return Math.round(number) - val + 50;
            else return Math.round(number) - val + 100;
        }

        // FORMAT RUPIAH + 2 DESIMAL
        function formatRupiah(num) {
            return Number(num).toLocaleString("id-ID", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }


        document.getElementById("btnHitung").addEventListener("click", function() {

            let plafon = parseInt(document.getElementById("plafon").value.replace(/\D/g, ''));
            let tenor = parseInt(document.getElementById("tenor").value);
            let bungaTahun = parseFloat(document.getElementById("bunga").value);
            let sistem = document.getElementById("sistem").value;

            if (!plafon || !tenor || !bungaTahun || !sistem) {
                alert("Harap lengkapi semua input.");
                return;
            }

            let bungaPerBulan = bungaTahun / 12 / 100;

            let html = `
        <table style="width:100%; border-collapse:collapse;">
            <tr style="background:#06135c; color:white; text-align:center;">
                <th style="padding:12px 8px; font-size:14px;">Tenor</th>
                <th style="padding:12px 8px; font-size:14px;">Angsuran Pokok</th>
                <th style="padding:12px 8px; font-size:14px;">Angsuran Bunga</th>
                <th style="padding:12px 8px; font-size:14px;">Total Angsuran</th>
                <th style="padding:12px 8px; font-size:14px;">Baki Debet</th>
            </tr>
    `;

            let totalPokok = 0,
                totalBunga = 0,
                totalAngsuran = 0;

            let baki = plafon;



            // ====================================================
            // BARIS AWAL
            // ====================================================
            html += `
        <tr style="text-align:center; background:white; border-bottom:1px solid #eee;">
            <td style="padding:10px 8px; font-size:14px;">-</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.0,00</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.0,00</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.0,00</td>
            <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(plafon)}</td>
        </tr>
    `;



            // ====================================================
            // SISTEM FLAT — PERHITUNGAN BPR
            // ====================================================
            if (sistem === "flat") {

                let bungaFlat = plafon * bungaPerBulan;
                let pokokTetap = plafon / tenor;
                let lastPokok = 0;

                for (let i = 1; i <= tenor; i++) {

                    let pokok = customRound(pokokTetap);
                    let bunga = customRound(bungaFlat);
                    let total = customRound(pokok + bunga);

                    baki -= pokok;
                    if (baki < 0) baki = 0;

                    // koreksi tenor terakhir
                    if (i === tenor - 1) lastPokok = baki;
                    if (i === tenor) pokok = lastPokok;

                    html += `
                <tr style="text-align:center; background:white; border-bottom:1px solid #eee;">
                    <td style="padding:10px 8px; font-size:14px;">${i}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(pokok)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(bunga)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(total)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(baki)}</td>
                </tr>
            `;

                    totalPokok += pokok;
                    totalBunga += bunga;
                    totalAngsuran += total;
                }
            }



            // ====================================================
            // SISTEM ANUITAS — SAMA DGN BPR
            // ====================================================
            else if (sistem === "anuitas") {

                let A = (plafon * bungaPerBulan) / (1 - Math.pow(1 + bungaPerBulan, -tenor));
                A = customRound(A);

                let lastPokok = 0;

                for (let i = 1; i <= tenor; i++) {

                    let bunga = customRound(baki * bungaPerBulan);
                    let pokok = customRound(A - bunga);

                    baki -= pokok;
                    if (baki < 0) baki = 0;

                    // koreksi tenor terakhir
                    if (i === tenor - 1) lastPokok = baki;
                    if (i === tenor) pokok = lastPokok;

                    html += `
                <tr style="text-align:center; background:white; border-bottom:1px solid #eee;">
                    <td style="padding:10px 8px; font-size:14px;">${i}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(pokok)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(bunga)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(A)}</td>
                    <td style="padding:10px 8px; font-size:14px;">Rp.${formatRupiah(baki)}</td>
                </tr>
            `;

                    totalPokok += pokok;
                    totalBunga += bunga;
                    totalAngsuran += A;
                }
            }



            // ====================================================
            // TOTAL
            // ====================================================
            html += `
        <tr style="background:#06135c; text-align:center; font-weight:bold; color:white;">
            <td style="padding:12px 8px; font-size:14px;">Total</td>
            <td style="padding:12px 8px; font-size:14px;">Rp.${formatRupiah(totalPokok)}</td>
            <td style="padding:12px 8px; font-size:14px;">Rp.${formatRupiah(totalBunga)}</td>
            <td style="padding:12px 8px; font-size:14px;">Rp.${formatRupiah(totalAngsuran)}</td>
            <td style="padding:12px 8px; font-size:14px;">-</td>
        </tr>
        </table>
    `;

            document.getElementById("hasilSimulasi").innerHTML = html;
            document.getElementById("hasilSimulasiContainer").style.display = "block";
        });



        // RESET FORM
        document.getElementById("btnReset").addEventListener("click", function() {
            document.getElementById("plafon").value = "";
            document.getElementById("tenor").value = "";
            document.getElementById("bunga").value = "";
            document.getElementById("sistem").value = "";

            document.getElementById("hasilSimulasiContainer").style.display = "none";
        });
</script>

@endsection