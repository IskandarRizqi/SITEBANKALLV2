@extends('frontend.bprapm.layout.main')

@section('content')
    <style>
        .event-content {
            max-width: 100%;
            overflow-x: auto;
            word-wrap: break-word;
            line-height: 1.6;
            text-align: justify;
            font-family: 'Archivo', sans-serif;
        }

        /* ============ SIMULASI KREDIT ============ */
        .simulasi-outer {
            width: 83%;
            margin: 70px auto 50px auto;
            background: #0936ec;
            padding: 26px 30px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            margin-top: 150px;
        }

        .simulasi-outer,
        .simulasi-outer * {
            box-sizing: border-box;
        }

        .simulasi-inner {
            display: flex;
            flex-direction: row;
            align-items: stretch;
            gap: 24px;
        }

        /* Pakai flex-grow, BUKAN width % manual, supaya gap tidak pernah bikin overflow */
        .simulasi-left {
            flex: 1.3 1 0%;
            min-width: 0;
            color: white;
        }

        .simulasi-left h3 {
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            color: white;
        }

        .simulasi-left h3 img {
            width: 42px;
            margin-right: 10px;
        }

        .simulasi-left label {
            font-size: 13px;
            display: block;
            margin-bottom: 6px;
        }

        .simulasi-field {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 30px;
            padding: 10px 18px;
            margin-bottom: 12px;
        }

        .simulasi-field input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
        }

        .simulasi-field .prefix,
        .simulasi-field .suffix {
            color: #f71827;
            font-weight: bold;
            white-space: nowrap;
        }

        .simulasi-field .prefix {
            margin-right: 10px;
        }

        .simulasi-field .suffix {
            margin-left: 10px;
        }

        /* Wrapper select - dikembalikan overflow: hidden karena sekarang isinya
           native <select>, bukan lagi div dari plugin nice-select */
        .simulasi-select-wrap {
            background: white;
            border-radius: 30px;
            overflow: hidden;
            margin-bottom: 18px;
        }

        .simulasi-select-wrap select {
            width: 100%;
            padding: 10px 18px;
            border: none;
            outline: none;
            font-size: 14px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: white url('data:image/svg+xml;utf8,<svg fill="%23f71827" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 18px center;
        }

        .simulasi-buttons {
            display: flex;
            gap: 12px;
            margin-top: 2px;
        }

        .simulasi-buttons button {
            border: none;
            font-size: 14px;
            padding: 12px;
            border-radius: 30px;
        }

        #btnReset {
            flex: 0 0 38%;
            background: #f71827;
            color: white;
        }

        #btnHitung {
            flex: 1;
            background: white;
            color: #f71827;
            font-weight: bold;
        }

        .simulasi-right {
            flex: 1 1 0%;
            min-width: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .simulasi-right img {
            width: 95%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        #hasilSimulasiContainer {
            width: 100%;
            margin-top: 20px;
            display: none;
        }

        .hasil-box {
            background: white;
            border-radius: 10px;
            padding: 18px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hasil-box h4 {
            color: #f71827;
            margin-bottom: 15px;
            text-align: center;
        }

        #hasilSimulasi table {
            width: 100%;
            border-collapse: collapse;
        }

        #hasilSimulasi th,
        #hasilSimulasi td {
            padding: 10px 8px;
            font-size: 14px;
        }

        /* ============ RESPONSIVE (MOBILE) ============ */
        @media (max-width: 768px) {
            .simulasi-outer {
                width: 92%;
                padding: 18px;
                margin-top: 100px;
                margin-bottom: 25px;
            }

            .simulasi-inner {
                flex-direction: column;
                gap: 16px;
            }

            /* gambar tampil di atas, stretch full width, tidak terpotong */
            .simulasi-right {
                order: 1;
                flex: 1 1 auto;
                width: 100%;
            }

            .simulasi-right img {
                width: 100%;
                height: auto;
                object-fit: contain;
            }

            /* form tampil di bawah gambar */
            .simulasi-left {
                order: 2;
                flex: 1 1 auto;
                width: 100%;
            }

            .simulasi-buttons {
                gap: 10px;
            }

            .hasil-box {
                padding: 14px 16px;
            }

            /* tabel hasil simulasi tetap bisa discroll horizontal di layar sempit */
            #hasilSimulasi {
                overflow-x: auto;
            }

            #hasilSimulasi table {
                min-width: 480px;
            }
        }

        @media (max-width: 400px) {
            .simulasi-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            #btnReset {
                flex: 1 1 auto;
            }
        }
    </style>

    <div class="simulasi-outer">

        <div class="simulasi-inner">

            <div class="simulasi-left">

                <h3>
                    <img src="frontend/bprtaruna/assets/img/produk/iconsimulasi.png" alt="icon">
                    Simulasi Kredit
                </h3>

                <label>Plafon Pembiayaan</label>
                <div class="simulasi-field">
                    <span class="prefix">Rp.</span>
                    <input type="text" id="plafon" placeholder="Ketik disini">
                </div>

                <label>Lama Angsuran</label>
                <div class="simulasi-field">
                    <input type="text" id="tenor" placeholder="Ketik disini">
                    <span class="suffix">Bulan</span>
                </div>

                <label>Bunga</label>
                <div class="simulasi-field">
                    <input type="text" id="bunga" placeholder="Ketik disini">
                    <span class="suffix">% / Tahun</span>
                </div>

                <label>Sistem Angsuran</label>
                <div class="simulasi-select-wrap">
                    <select id="sistem" class="no-nice-select">
                        <option value="">Pilih</option>
                        <option value="flat">Flat</option>
                        <option value="anuitas">Anuitas</option>
                    </select>
                </div>

                <div class="simulasi-buttons">
                    <button id="btnReset" type="button">Reset</button>
                    <button id="btnHitung" type="button">Hitung</button>
                </div>

            </div>

            <div class="simulasi-right">
                <img src="frontend/bprapm/assets/images/simulasi/kredit.png" alt="Simulasi Kredit">
            </div>

        </div>

        <div id="hasilSimulasiContainer">
            <div class="hasil-box">
                <h4>Hasil Simulasi Pinjaman</h4>
                <div id="hasilSimulasi" style="width:100%;"></div>
            </div>
        </div>

    </div>

    <script>
        // ============ MATIKAN NICE-SELECT KHUSUS UNTUK SELECT INI ============
        // Kalau layout global otomatis menjalankan $('select').niceSelect(),
        // kita "lepas" khusus elemen #sistem supaya balik jadi <select> native,
        // sehingga CSS custom kita (.simulasi-select-wrap select) berfungsi normal.
        document.addEventListener("DOMContentLoaded", function() {
            if (window.jQuery && typeof $.fn.niceSelect === "function") {
                var $sistem = $('#sistem');
                if ($sistem.hasClass('nice-select') || $sistem.next('.nice-select').length) {
                    $sistem.niceSelect('destroy');
                }
            }
        });

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
        <table>
            <tr style="background:#f71827; color:white; text-align:center;">
                <th>Tenor</th>
                <th>Angsuran Pokok</th>
                <th>Angsuran Bunga</th>
                <th>Total Angsuran</th>
                <th>Baki Debet</th>
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
            <td>-</td>
            <td>Rp.0,00</td>
            <td>Rp.0,00</td>
            <td>Rp.0,00</td>
            <td>Rp.${formatRupiah(plafon)}</td>
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
                    <td>${i}</td>
                    <td>Rp.${formatRupiah(pokok)}</td>
                    <td>Rp.${formatRupiah(bunga)}</td>
                    <td>Rp.${formatRupiah(total)}</td>
                    <td>Rp.${formatRupiah(baki)}</td>
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
                    <td>${i}</td>
                    <td>Rp.${formatRupiah(pokok)}</td>
                    <td>Rp.${formatRupiah(bunga)}</td>
                    <td>Rp.${formatRupiah(A)}</td>
                    <td>Rp.${formatRupiah(baki)}</td>
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
        <tr style="background:#e86c55; text-align:center; font-weight:bold; color:white;">
            <td>Total</td>
            <td>Rp.${formatRupiah(totalPokok)}</td>
            <td>Rp.${formatRupiah(totalBunga)}</td>
            <td>Rp.${formatRupiah(totalAngsuran)}</td>
            <td>-</td>
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