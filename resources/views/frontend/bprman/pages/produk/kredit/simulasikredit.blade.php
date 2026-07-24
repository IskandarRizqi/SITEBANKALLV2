@extends('frontend.bprman.layout.main')

@section('content')
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .event-content {
            max-width: 100%;
            overflow-x: auto;
            word-wrap: break-word;
            line-height: 1.6;
            text-align: justify;
            font-family: 'Archivo', sans-serif;
        }

        .breadcrumb-area {
            margin-top: 90px;
        }

        .judullap {
            text-align: center;
            margin-bottom: 0px;
            margin-top: 120px;
        }

        /* ===================== OUTER WRAPPER ===================== */
        .simulasi-outer {
            width: 83%;
            margin: 50px auto;
            background-color: #ee3624;
            padding: 35px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
        }

        /* ===================== INNER FLEX (form + banner) ===================== */
        .simulasi-inner {
            display: flex;
            gap: 20px;
        }

        .simulasi-left {
            width: 55%;
            color: white;
        }

        .simulasi-right {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .simulasi-right img {
            width: 100%;
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .simulasi-title {
            font-weight: 600;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            color: white;
        }

        .simulasi-title img {
            width: 50px;
            margin-right: 10px;
        }

        /* ===================== FORM ELEMENTS (semua seragam) ===================== */
        .form-label {
            display: block;
            font-size: 14px;
            color: #fff;
            margin-bottom: 6px;
        }

        .input-box {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 30px;
            padding: 0 20px;
            margin-bottom: 18px;
            height: 46px;
        }

        .input-box input,
        .input-box select {
            border: none;
            outline: none;
            width: 100%;
            height: 100%;
            font-size: 14px;
            font-family: inherit;
            background: transparent;
            color: #333;
        }

        /* ===================== CUSTOM DROPDOWN (Sistem Angsuran) ===================== */
        .select-wrapper {
            position: relative;
            cursor: pointer;
            justify-content: space-between;
            user-select: none;
        }

        .select-display {
            font-size: 14px;
            color: #333;
        }

        .select-display.is-placeholder {
            color: #8a8a8a;
        }

        .select-arrow {
            color: #f71827;
            font-size: 12px;
            transition: transform 0.2s ease;
            margin-left: 10px;
        }

        .select-wrapper.open .select-arrow {
            transform: rotate(180deg);
        }

        .select-options {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
            overflow: hidden;
            display: none;
            z-index: 20;
        }

        .select-wrapper.open .select-options {
            display: block;
        }

        .select-option {
            padding: 12px 20px;
            font-size: 14px;
            color: #333;
        }

        .select-option:hover {
            background: #f2f2f2;
        }

        .select-option.selected {
            color: #0a1c92;
            font-weight: 600;
        }

        .input-prefix {
            color: #0a1c92;
            font-weight: bold;
            margin-right: 10px;
        }

        .input-suffix {
            color: #0a1c92;
            font-weight: bold;
            white-space: nowrap;
            margin-left: 10px;
        }

        .simulasi-buttons {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
            margin-bottom: 0;
        }

        .btn-reset,
        .btn-hitung {
            padding: 10px;
            border-radius: 40px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-reset {
            width: 40%;
            background: #0a1c92;
            color: white;
        }

        .btn-hitung {
            width: 55%;
            background: #efefef;
            color: #0a1c92;
        }

        /* ===================== HASIL SIMULASI ===================== */
        #hasilSimulasiContainer {
            width: 100%;
            margin-top: 30px;
            display: none;
        }

        .hasil-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hasil-box h4 {
            color: #000;
            margin-bottom: 15px;
            text-align: center;
        }

        /* kunci utama: tabel bisa discroll ke samping, tidak keluar kotak putih */
        .table-scroll {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-scroll table {
            width: 100%;
            min-width: 560px;
            border-collapse: collapse;
        }

        /* ===================== MOBILE ===================== */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }

            .simulasi-outer {
                width: 92%;
                padding: 20px;
                margin: 30px auto;
            }

            .simulasi-inner {
                flex-direction: column;
            }

            .simulasi-left,
            .simulasi-right {
                width: 100%; 
            }

            /* banner tampil di atas, form di bawah */
            .simulasi-right {
                order: -1;
                margin-bottom: 20px;
            }

            .simulasi-right img {
                height: auto;
            }
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">
        <h2 class="judullap">Simulasi Kredit</h2>

        <div class="simulasi-outer">
            <div class="simulasi-inner">

                <div class="simulasi-left">
                    <h3 class="simulasi-title">
                        <img src="frontend/bprdatagita/img/produk/iconsimulasi.png">
                        Simulasi Kredit
                    </h3>

                    <label class="form-label">Plafon Pembiayaan</label>
                    <div class="input-box">
                        <span class="input-prefix">Rp.</span>
                        <input type="text" id="plafon" placeholder="Ketik disini">
                    </div>

                    <label class="form-label">Lama Angsuran</label>
                    <div class="input-box">
                        <input type="text" id="tenor" placeholder="Ketik disini">
                        <span class="input-suffix">Bulan</span>
                    </div>

                    <label class="form-label">Bunga</label>
                    <div class="input-box">
                        <input type="text" id="bunga" placeholder="Ketik disini">
                        <span class="input-suffix">% / Tahun</span>
                    </div>

                    <label class="form-label">Sistem Angsuran</label>
                    <div class="input-box select-wrapper" id="sistemWrapper">
                        <span class="select-display is-placeholder" id="sistemLabel">Pilih</span>
                        <span class="select-arrow">&#9662;</span>
                        <input type="hidden" id="sistem" value="">

                        <div class="select-options" id="sistemOptions">
                            <div class="select-option" data-value="flat" data-label="Flat">Flat</div>
                            <div class="select-option" data-value="anuitas" data-label="Anuitas">Anuitas</div>
                        </div>
                    </div>

                    <div class="simulasi-buttons">
                        <button id="btnReset" class="btn-reset">Reset</button>
                        <button id="btnHitung" class="btn-hitung">Hitung</button>
                    </div>
                </div>

                <div class="simulasi-right">
                    <img src="frontend/bprman/assets/images/produk/simulasikredit.png">
                </div>

            </div>

            <div id="hasilSimulasiContainer">
                <div class="hasil-box">
                    <h4>Hasil Simulasi Pinjaman</h4>
                    <div class="table-scroll">
                        <div id="hasilSimulasi"></div>
                    </div>
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

        // ===================== CUSTOM DROPDOWN LOGIC =====================
        const sistemWrapper = document.getElementById("sistemWrapper");
        const sistemLabel = document.getElementById("sistemLabel");
        const sistemInput = document.getElementById("sistem");
        const sistemOptions = document.getElementById("sistemOptions");

        sistemWrapper.addEventListener("click", function(e) {
            sistemWrapper.classList.toggle("open");
        });

        sistemOptions.querySelectorAll(".select-option").forEach(function(option) {
            option.addEventListener("click", function(e) {
                e.stopPropagation();

                sistemOptions.querySelectorAll(".select-option").forEach(function(opt) {
                    opt.classList.remove("selected");
                });
                option.classList.add("selected");

                sistemInput.value = option.dataset.value;
                sistemLabel.textContent = option.dataset.label;
                sistemLabel.classList.remove("is-placeholder");

                sistemWrapper.classList.remove("open");
            });
        });

        // tutup dropdown kalau klik di luar area
        document.addEventListener("click", function(e) {
            if (!sistemWrapper.contains(e.target)) {
                sistemWrapper.classList.remove("open");
            }
        });

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
        <table>
            <tr style="background:#000; color:white; text-align:center;">
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
        <tr style="background:#000; text-align:center; font-weight:bold; color:white;">
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

            // reset custom dropdown
            sistemInput.value = "";
            sistemLabel.textContent = "Pilih";
            sistemLabel.classList.add("is-placeholder");
            sistemOptions.querySelectorAll(".select-option").forEach(function(opt) {
                opt.classList.remove("selected");
            });

            document.getElementById("hasilSimulasiContainer").style.display = "none";
        });
    </script>
@endsection