@extends('frontend.bprsms.layout.main')


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

        .bullet-list {
            list-style: disc !important;
            padding-left: 18px !important;
        }

        /* ============ SIMULASI DEPOSITO ============ */
        .simulasi-outer {
            width: 83%;
            margin: 50px auto;
            background: #ff5a1e;
            padding: 35px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
        }

        .simulasi-inner {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .simulasi-left {
            width: 55%;
            color: white;
        }

        .simulasi-left h3 {
            font-weight: 600;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            color: white;
        }

        .simulasi-left h3 img {
            width: 50px;
            margin-right: 10px;
        }

        .simulasi-left label {
            font-size: 14px;
        }

        .simulasi-field {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 30px;
            padding: 12px 20px;
            margin-bottom: 18px;
        }

        .simulasi-field input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
        }

        .simulasi-field .prefix {
            color: #19178e;
            font-weight: bold;
            margin-right: 10px;
        }

        .simulasi-select-wrap {
            background: white;
            border-radius: 30px;
            margin-bottom: 30px;
        }

        .simulasi-select-wrap select {
            width: 100%;
            padding: 12px 20px;
            border-radius: 30px;
            border: none;
            outline: none;
            font-size: 14px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: white url('data:image/svg+xml;utf8,<svg fill="%23f71827" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 20px center;
        }

        .simulasi-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .simulasi-buttons button {
            border: none;
            font-size: 14px;
            padding: 12px;
            border-radius: 30px;
        }

        #btnReset {
            width: 40%;
            background: #e10000;
            color: white;
        }

        #btnHitung {
            width: 55%;
            background: white;
            color: #000;
            font-weight: bold;
        }

        .simulasi-right {
            width: 45%;
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
            margin-bottom: 20px;
            text-align: center;
        }

        .hasil-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            gap: 12px;
        }

        .hasil-col {
            width: 48%;
        }

        .hasil-col h5 {
            color: #333;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .hasil-col p {
            font-size: 15px;
            font-weight: bold;
            color: #333;
        }

        .hasil-syarat {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .hasil-syarat small {
            color: #666;
        }

        .hasil-syarat ul {
            font-size: 12px;
            color: #666;
            padding-left: 20px;
            margin-top: 5px;
        }

        /* ============ RESPONSIVE (MOBILE) ============ */
        @media (max-width: 768px) {
            .simulasi-outer {
                width: 92%;
                padding: 20px;
                margin-top: 25px;
                margin-bottom: 25px;
            }

            .simulasi-inner {
                flex-direction: column;
            }

            .simulasi-field input {
        line-height: 1.2;
        padding: 0;
        margin: 0;
        height: auto;
    }

    .simulasi-select-wrap select {
        padding: 8px 16px;
        font-size: 14px;
    }

            /* gambar tampil di atas, stretch full width, tidak terpotong */
            .simulasi-right {
                order: 1;
                width: 100%;
                margin-bottom: 20px;
            }

            .simulasi-right img {
                width: 100%;
                height: auto;
                object-fit: contain;
            }

            /* form tampil di bawah gambar */
            .simulasi-left {
                order: 2;
                width: 100%;
            }

            /* tombol center & mengikuti lebar form */
            .simulasi-buttons {
                justify-content: center;
                gap: 12px;
            }

            .simulasi-buttons button {
                width: 50%;
            }

            /* hasil simulasi ditumpuk 1 kolom biar jelas */
            .hasil-box {
                padding: 14px;
            }

            .hasil-row {
                flex-direction: column;
                gap: 12px;
                margin-bottom: 8px;
            }

            .hasil-col {
                width: 100%;
            }
        }

        @media (max-width: 400px) {
            .simulasi-buttons {
                flex-direction: column;
                align-items: center;
            }

            .simulasi-buttons button {
                width: 100%;
            }

            .hasil-col h5 {
                font-size: 14px;
            }

            .hasil-col p {
                font-size: 14px;
            }
        }
    </style>

    <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Simuasi Deposito</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Produk</a></li>
                        <li>Simuasi Deposito</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="simulasi-outer">

        <div class="simulasi-inner">

            <div class="simulasi-left">

                <h3>
                    <img src="frontend/bprkotamagelang/assets/img/produk/iconsimulasi.png">
                    Simulasi Deposito
                </h3>

                <label>Plafon</label>
                <div class="simulasi-field">
                    <span class="prefix">Rp.</span>
                    <input type="text" id="plafon" placeholder="Ketik disini">
                </div>

                <label>Jangka Waktu</label>
                <div class="simulasi-select-wrap">
                    <select name="bunga" id="bunga">
                        <option value="">Pilih Produk</option>

                        @foreach ($deposito as $item)
                            <option value="{{ $item->tenor . '-' . $item->bunga }}"
                                data-image="{{ url('/recfil?display=true&rf=' . $item->image) }}">

                                {{ $item->nama }} | Suku Bunga = {{ $item->bunga }}%

                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="simulasi-buttons">
                    <button id="btnReset">Reset</button>
                    <button id="btnHitung">Hitung</button>
                </div>

            </div>

            <div class="simulasi-right">
                <img id="gambarProduk" src="frontend/bprkotamagelang/assets/img/simulasi/depo.png">
            </div>

        </div>

        <div id="hasilSimulasiContainer">
            <div class="hasil-box">
                <h4>Hasil Simulasi Deposito</h4>

                <div class="hasil-row">
                    <div class="hasil-col">
                        <h5>Bunga + Saldo Deposito</h5>
                        <p id="saldoKalehBunga">Rp 0</p>
                    </div>
                    <div class="hasil-col">
                        <h5>Saldo Tanpa Bunga</h5>
                        <p id="saldo">Rp 0</p>
                    </div>
                </div>

                <div class="hasil-row">
                    <div class="hasil-col">
                        <h5>Bunga Per Bulan</h5>
                        <p id="hasilBunga">Rp 0</p>
                    </div>
                    <div class="hasil-col">
                        <h5>Total Setoran</h5>
                        <p id="totalSetoran">Rp 0</p>
                    </div>
                </div>

                <div class="hasil-syarat">
                    <small>Syarat dan Ketentuan</small>
                    <ul class="bullet-list">
                        <li>Belum Termasuk Pajak Bunga dan Biaya Admin</li>
                        <li>Suku bunga dapat berubah sewaktu-waktu mengikuti ketentuan yang berlaku</li>
                        <li>Simulasi ini merupakan ilustrasi perhitungan dari system
                            <strong>{{ env('APP_NAME', 'Bank') }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

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

            let plafon = parseFloat(document.getElementById("plafon").value.replace(/\D/g, ''));
            let type = document.getElementById("bunga").value;

            if (!type || type === "") {
                alert("Harap pilih jangka waktu.");
                return;
            }

            if (!plafon || plafon <= 0) {
                alert("Harap masukkan plafon.");
                return;
            }

            let split = type.split('-');
            let bulan = parseFloat(split[0]); // tenor (tidak dipakai di rumus lama)
            let bunga = parseFloat(split[1]);

            // 🔥 RUMUS SAMA PERSIS DENGAN KODE LAMA
            let hasil = plafon * (bunga / 100) / 12;

            let saldoDenganBunga = plafon + hasil;

            document.getElementById("saldoKalehBunga").innerText = formatRupiah(saldoDenganBunga);
            document.getElementById("saldo").innerText = formatRupiah(plafon);
            document.getElementById("hasilBunga").innerText = formatRupiah(hasil);
            document.getElementById("totalSetoran").innerText = formatRupiah(plafon);

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
@endsection