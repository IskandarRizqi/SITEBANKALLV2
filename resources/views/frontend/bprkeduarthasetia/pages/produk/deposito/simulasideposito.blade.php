@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')

<style>
.common-hero {
  background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center; 
  background-size: cover; /* default untuk desktop */
  background-position: center;
  color: #fff;
  padding: 40px 0;
  position: relative;
  margin-top: 70px; /* jarak dari navbar */
  text-align: center; /* teks ke tengah */
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
    background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center; 
    background-size: cover;   /* gambar diperbesar biar penuh */
    min-height: 180px;        /* tinggi hero agar kelihatan besar */
    display: flex;
    align-items: center;      /* teks di tengah vertikal */
    justify-content: center;  /* teks di tengah horizontal */
    padding: 0;               /* hilangkan padding default */
  }

  .common-hero h1,
  .common-hero h2,
  .common-hero .title { 
    font-size: 20px;   /* sesuaikan ukuran teks agar pas di mobile */
    font-weight: bold;
    color: #000;       /* atau putih jika kontras dengan background */
  }
}
</style>

<body class="body tg-heading-subheading animation-style3">


  <!--=====progress END=======-->

        <div class="paginacontainer"> 

        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </div>

        </div> 



   
     
        <!--=====HERO AREA START=======-->

        <div class="common-hero">
          <div class="container">
            <div class="row align-items-center text-center">
              <div class="col-lg-8 m-auto">
                <div class="main-heading">
                  <h1 style="font-size: 35px; color: #fff;">SIMULASI DEPOSITO</h1>
                    <span class="span"> <a href="index.html">Simulasi</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Simulasi Deposito
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
                        <img src="frontend/bprtaruna/assets/img/produk/iconsimulasi.png"
                            style="width:50px; margin-right:10px;">
                        Simulasi Deposito
                    </h3>


                    <label style="font-size:14px; color: #fff">Plafon</label>
                    <div
                        style="display:flex; align-items:center; background:white; border-radius:30px;
                        padding:8px 20px; margin-bottom:18px;">
                        <span style="color:#0a1c92; font-weight:bold; margin-right:10px;">Rp.</span>

                        <input type="text" id="plafon" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">
                    </div>


                    <label style="font-size:14px;color: #fff">Jangka Waktu</label>

                    <div style="background:white; border-radius:30px; padding:0; margin-bottom:30px;">

                        <select name="bunga" id="bunga"
                            style="width:100%; padding:8px 20px; border-radius:30px;
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
                            style="width:40%; padding:7px; border-radius:40px; background: #06135c;
                                border:none; color:white; font-size:18px; font-weight:500; cursor:pointer;">
                            Reset
                        </button>

                        <button id="btnHitung"
                            style="width:55%; padding:7px; border-radius:40px; background:#efefef;
                                border:none; color: #06135c; font-weight:500; font-size:18px; cursor:pointer;">
                            Hitung
                        </button>

                    </div>

                </div>


                <div class="simulasi-right" style="width:45%; display:flex; align-items:center; justify-content:center;"
                    class="simulasi-right">
                    <img id="gambarProduk" src="frontend/bprdatagita/img/produk/simulasideposito.png"
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