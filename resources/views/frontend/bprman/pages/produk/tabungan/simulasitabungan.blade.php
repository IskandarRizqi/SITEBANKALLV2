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

        /* ===================== FORM ELEMENTS (seragam) ===================== */
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

        .input-box input {
            border: none;
            outline: none;
            width: 100%;
            height: 100%;
            font-size: 14px;
            font-family: inherit;
            background: transparent;
            color: #333;
        }

        .input-prefix {
            color: #0a1c92;
            font-weight: bold;
            margin-right: 10px;
        }

        .simulasi-buttons {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 5px;
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

        /* ===================== CUSTOM DROPDOWN (Pilih Produk) ===================== */
        .select-wrapper {
            position: relative;
            cursor: pointer;
            justify-content: space-between;
            user-select: none;
        }

        .select-wrapper .real-select {
            display: none;
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
            max-height: 240px;
            overflow-y: auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
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

        .hasil-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .hasil-col {
            width: 48%;
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

            .hasil-col {
                width: 100%;
            }
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">
        <h2 class="judullap">Simulasi Tabungan</h2>

        <div class="simulasi-outer">
            <div class="simulasi-inner">

                <div class="simulasi-left">
                    <h3 class="simulasi-title">
                        <img src="frontend/bprdatagita/img/produk/iconsimulasi.png">
                        Simulasi Tabungan
                    </h3>

                    <label class="form-label">Setoran Rata - rata</label>
                    <div class="input-box">
                        <span class="input-prefix">Rp.</span>
                        <input type="text" id="plafon" placeholder="Ketik disini">
                    </div>

                    <label class="form-label">Pilih Produk</label>
                    <div class="input-box select-wrapper" id="produkWrapper">
                        <span class="select-display is-placeholder" id="produkLabel">Pilih Produk</span>
                        <span class="select-arrow">&#9662;</span>

                        {{-- select asli TIDAK diubah sama sekali, cuma disembunyikan secara visual --}}
                        <select name="bunga" id="bunga" class="real-select">
                            <option value="">Pilih Produk</option>

                            @if (isset($tabungan))
                                @foreach ($tabungan as $item)
                                    <option value="{{ $item->bunga . '-' . $item->min }}"
                                        data-image="{{ url('/recfil?display=true&rf=' . $item->image) }}">
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            @endif
                        </select>

                        <div class="select-options" id="produkOptions"></div>
                    </div>

                    <div class="simulasi-buttons">
                        <button id="btnReset" class="btn-reset">Reset</button>
                        <button id="btnHitung" class="btn-hitung">Hitung</button>
                    </div>
                </div>

                <div class="simulasi-right">
                    <img id="gambarProduk" src="frontend/bprman/assets/images/produk/simulasitabungan.png">
                </div>

            </div>

            <div id="hasilSimulasiContainer">
                <div class="hasil-box">
                    <h4 style="color:#000; margin-bottom:20px; text-align:center;">Hasil Simulasi Tabungan</h4>

                    <div class="hasil-row">
                        <div class="hasil-col">
                            <h5 style="color:#333; margin-bottom:5px; font-size:16px;">Bunga + Saldo Tabungan</h5>
                            <p id="saldoKalehBunga" style="font-size: 15px; font-weight: bold; color:#000;">Rp 0</p>
                        </div>
                        <div class="hasil-col">
                            <h5 style="color:#333; margin-bottom:5px; font-size:16px;">Saldo Tanpa Bunga</h5>
                            <p id="saldo" style="font-size: 15px; font-weight: bold; color:#333;">Rp 0</p>
                        </div>
                    </div>

                    <div class="hasil-row" style="margin-bottom:0;">
                        <div class="hasil-col">
                            <!-- PERUBAHAN: Label diubah menjadi "Bunga Per Bulan" -->
                            <h5 style="color:#333; margin-bottom:5px; font-size:16px;">Bunga Per Bulan</h5>
                            <p id="hasilBunga" style="font-size: 15px; font-weight: bold; color:#333;">Rp 0</p>
                        </div>
                        <div class="hasil-col">
                            <h5 style="color:#333; margin-bottom:5px; font-size:16px;">Total Setoran</h5>
                            <p id="totalSetoran" style="font-size: 15px; font-weight: bold; color:#333;">Rp 0</p>
                        </div>
                    </div>

                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #eee;">
                        <small style="color:#666;">Syarat dan Ketentuan</small>
                        <ul class="bullet-list" style="font-size: 12px; color:#666; padding-left: 20px; margin-top: 5px;">
                            <li>Belum Termasuk Pajak Bunga dan Biaya Admin</li>
                            <li>Suku bunga dapat berubah sewaktu-waktu mengikuti ketentuan yang berlaku</li>
                            <!-- PERUBAHAN: Teks syarat & ketentuan disesuaikan -->
                            <li>Simulasi Tabungan Untuk Periode Satu Bulan</li>
                            <li>Simulasi ini merupakan ilustrasi perhitungan dari system
                                <strong>{{ env('APP_NAME', 'Bank') }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </body>

    {{-- ===================== SCRIPT PERHITUNGAN (TIDAK DIUBAH) ===================== --}}
    <script>
        // FORMAT RUPIAH
        function formatRupiah(num) {
            num = parseFloat(num);
            if (isNaN(num)) return "Rp 0";
            return num.toLocaleString("id-ID", {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        }

        document.getElementById("btnHitung").addEventListener("click", function() {

            let plafon = parseInt(document.getElementById("plafon").value.replace(/\D/g, ''));
            let bungaString = document.getElementById("bunga").value;

            if (!plafon || plafon <= 0) {
                alert("Harap masukkan setoran rata-rata.");
                return;
            }

            if (!bungaString || bungaString === "") {
                alert("Harap pilih produk.");
                return;
            }

            let js = bungaString.split('-');
            let bungaPersen = parseFloat(js[0]);
            let minimalSetoran = parseFloat(js[1]);

            // TOTAL SALDO DASAR
            let saldoDasar = parseFloat(plafon) + parseFloat(minimalSetoran);

            // 🔥 RUMUS SAMA PERSIS DENGAN KODE LAMA
            let hasilBunga = saldoDasar * (bungaPersen / 100);

            let saldoDenganBunga = saldoDasar + hasilBunga;

            document.getElementById("saldoKalehBunga").innerText = formatRupiah(saldoDenganBunga);
            document.getElementById("saldo").innerText = formatRupiah(saldoDasar);
            document.getElementById("hasilBunga").innerText = formatRupiah(hasilBunga);
            document.getElementById("totalSetoran").innerText = formatRupiah(saldoDasar);

            document.getElementById("hasilSimulasiContainer").style.display = "block";
        });


        // RESET FORM
        document.getElementById("btnReset").addEventListener("click", function() {
            document.getElementById("plafon").value = "";
            document.getElementById("bunga").value = "";
            document.getElementById("hasilSimulasiContainer").style.display = "none";
        });

        function formatRupiah(angka) {
            return "Rp " + angka.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    </script>
    <script>
        document.getElementById("bunga").addEventListener("change", function() {

            let selectedOption = this.options[this.selectedIndex];
            let imagePath = selectedOption.getAttribute("data-image");

            if (imagePath) {
                document.getElementById("gambarProduk").src = imagePath;
            }
        });
    </script>

    {{-- ===================== SCRIPT BARU: UI DROPDOWN CUSTOM ===================== --}}
    {{-- Script ini hanya mengurus tampilan dropdown, sama sekali tidak menyentuh logic perhitungan di atas --}}
    <script>
        (function() {
            const realSelect = document.getElementById('bunga');
            const wrapper = document.getElementById('produkWrapper');
            const label = document.getElementById('produkLabel');
            const optionsBox = document.getElementById('produkOptions');

            function buildOptions() {
                optionsBox.innerHTML = '';

                Array.from(realSelect.options).forEach(function(opt) {
                    if (opt.value === '') return; // skip placeholder "Pilih Produk"

                    const div = document.createElement('div');
                    div.className = 'select-option';
                    div.textContent = opt.textContent.trim();
                    div.dataset.value = opt.value;

                    div.addEventListener('click', function(e) {
                        e.stopPropagation();

                        realSelect.value = opt.value;
                        label.textContent = opt.textContent.trim();
                        label.classList.remove('is-placeholder');

                        optionsBox.querySelectorAll('.select-option').forEach(function(o) {
                            o.classList.remove('selected');
                        });
                        div.classList.add('selected');

                        wrapper.classList.remove('open');

                        // trigger listener "change" yang sudah ada (ganti gambar produk)
                        // TANPA mengubah script perhitungan di atas
                        realSelect.dispatchEvent(new Event('change'));
                    });

                    optionsBox.appendChild(div);
                });
            }

            buildOptions();

            wrapper.addEventListener('click', function() {
                wrapper.classList.toggle('open');
            });

            document.addEventListener('click', function(e) {
                if (!wrapper.contains(e.target)) {
                    wrapper.classList.remove('open');
                }
            });

            // sinkronkan tampilan dropdown custom saat tombol reset diklik
            // (listener tambahan, tidak menimpa listener reset yang sudah ada)
            document.getElementById('btnReset').addEventListener('click', function() {
                label.textContent = 'Pilih Produk';
                label.classList.add('is-placeholder');
                optionsBox.querySelectorAll('.select-option').forEach(function(o) {
                    o.classList.remove('selected');
                });
            });
        })();
    </script>
@endsection