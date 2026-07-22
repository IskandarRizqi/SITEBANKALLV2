@extends('frontend.bprman.layout.main')


@section('content')
    <style>
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

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }

        .judullap {
        text-align: center;
        margin-bottom: 0px;
        margin-top: 100px;
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">
        <h2 class="judullap">Simulasi Deposito</h2>
        <div style="width:83%; margin:auto;   background: linear-gradient(45deg, #0a1c92, #ffffff); padding:35px; border-radius:15px; margin-top:50px; margin-bottom: 50px; display:flex; flex-direction:column;"
            class="simulasi-wrapper">

            <div class="simulasi-wrapper" style="display:flex;">

                <div class="simulasi-left" style="width:55%; color:white; padding-right:20px;" class="simulasi-left">

                    <h3 style="font-weight:600; margin-bottom:25px; display:flex; align-items:center; color:white;">
                        <img src="frontend/bprtaruna/assets/img/produk/iconsimulasi.png"
                            style="width:50px; margin-right:10px;">
                        Simulasi Deposito
                    </h3>


                    <label style="font-size:14px; color: #fff">Plafon</label>
                    <div
                        style="display:flex; align-items:center; background:white; border-radius:30px;
                        padding:0 20px; margin-bottom:18px;">
                        <span style="color:#0a1c92; font-weight:bold; margin-right:10px;">Rp.</span>

                        <input type="text" id="plafon" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">
                    </div>


                    <label style="font-size:14px;color: #fff">Jangka Waktu</label>

                    <div style="background:white; border-radius:30px; padding:0; margin-bottom:30px;">

                        <select name="bunga" id="bunga"
                            style="width:100%; padding:0 20px; border-radius:30px;
                            border:none; outline:none; font-size:14px;
                            appearance:none; -webkit-appearance:none; -moz-appearance:none;
                            background:white url('data:image/svg+xml;utf8,<svg fill=\'%23f71827\' height=\'18\' viewBox=\'0 0 24 24\' width=\'18\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>') 
                            no-repeat right 20px center;">

                            <option value="">Pilih Produk</option>

                            @foreach ($deposito as $item)
                                <option value="{{ $item->tenor . '-' . $item->bunga }}"
                                    data-image="{{ url('/recfil?display=true&rf=' . $item->image) }}">

                                    {{ $item->nama }} | Suku Bunga = {{ $item->bunga }}%

                                </option>
                            @endforeach


                        </select>

                    </div>


                    <div style="display:flex; justify-content:space-between; gap:20px; margin-top:5px; margin-bottom:20px;  padding:7px 20px;"
                        class="simulasi-buttons">

                        <button id="btnReset"
                            style="width:40%; padding:7px; border-radius:40px; background:#0a1c92;
                                border:none; color:white; font-size:18px; font-weight:500; cursor:pointer;">
                            Reset
                        </button>

                        <button id="btnHitung"
                            style="width:55%; padding:7px; border-radius:40px; background:#efefef;
                                border:none; color:#0a1c92; font-weight:bold; font-size:18px; cursor:pointer;">
                            Hitung
                        </button>

                    </div>

                </div>


                <div class="simulasi-right" style="width:45%; display:flex; align-items:center; justify-content:center;"
                    class="simulasi-right">
                    <img id="gambarProduk" src="frontend/bprman/assets/images/produk/simulasideposito.png"
                        style="width:95%; height: 350px; border-radius:10px; ">

                </div>

            </div>


            <div id="hasilSimulasiContainer" style="width:100%; margin-top:30px; display:none;">
                <div style="background:white; border-radius:10px; padding:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
                    <h4 style="color:#000; margin-bottom:20px; text-align:center;">Hasil Simulasi Deposito</h4>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <div style="width: 48%;">
                            <h5 style="color:#333; margin-bottom:5px;font-size:16px; ">Bunga + Saldo Deposito</h5>
                            <p id="saldoKalehBunga" style="font-size: 15px; font-weight: bold; color:#000;">Rp 0</p>
                        </div>
                        <div style="width: 48%;">
                            <h5 style="color:#333; margin-bottom:5px;font-size:16px;">Saldo Tanpa Bunga</h5>
                            <p id="saldo" style="font-size: 15px; font-weight: bold; color:#333;">Rp 0</p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div style="width: 48%;">
                            <!-- PERUBAHAN: Label diubah menjadi "Bunga Per Bulan" -->
                            <h5 style="color:#333; margin-bottom:5px;font-size:16px;">Bunga Per Bulan</h5>
                            <p id="hasilBunga" style="font-size: 15px; font-weight: bold; color:#333;">Rp 0</p>
                        </div>
                        <div style="width: 48%;">
                            <h5 style="color:#333; margin-bottom:5px;font-size:16px;">Total Setoran</h5>
                            <p id="totalSetoran" style="font-size: 15px; font-weight: bold; color:#333;">Rp 0</p>
                        </div>
                    </div>
                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #eee;">
                        <small style="color:#666;">Syarat dan Ketentuan</small>
                        <ul class="bullet-list" style="font-size: 12px; color:#666; padding-left: 20px; margin-top: 5px;">
                            <li>Belum Termasuk Pajak Bunga dan Biaya Admin</li>
                            <li>Suku bunga dapat berubah sewaktu-waktu mengikuti ketentuan yang berlaku</li>
                            <!-- PERUBAHAN: Teks syarat & ketentuan disesuaikan -->

                            <li>Simulasi ini merupakan ilustrasi perhitungan dari system
                                <strong>{{ env('APP_NAME', 'Bank') }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </body>

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
