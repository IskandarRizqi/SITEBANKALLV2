@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card {
            border: none;
            overflow: hidden;
        }

        .card img {
            height: auto;
            object-fit: cover;
            width: 100%;
            display: block;
        }

        .product-card {
            position: relative;
            transition: transform 0.45s cubic-bezier(.4, 0, .2, 1);
        }

        /* shadow layer */
        .product-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 12px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18);
            opacity: 0;
            transition: opacity 0.45s ease;
            z-index: -1;
        }

        .product-card:hover {
            transform: translateY(-14px);
        }

        .product-card:hover::after {
            opacity: 1;
        }

        /* Image smooth zoom */
        .product-card img {
            transition: transform 0.6s ease;
        }

        .product-card:hover img {
            transform: scale(1.08);
        }


        .footer-custom {
            background-color: #113ADC;
            font-size: 14px;
        }

        .footer-custom a {
            font-size: 18px;
            transition: color 0.3s;
        }

        .footer-custom a:hover {
            color: #ffcc00;
        }

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .carousel-item {
            transition: opacity 0s !important;
        }

        @media (max-width: 768px) {
            .produk-container {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .produk-img {
                width: 100% !important;
            }
        }

        @media (max-width: 768px) {

            /* CAROSEL */

            #carouselExampleControls {
                margin-top: 100px;
            }

            #carouselExampleControls .carousel-item img {
                width: 100%;
                height: auto;
                object-fit: cover;
                background: #fff;
            }

            #carouselExampleControls .carousel-control-prev,
            #carouselExampleControls .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
            }

            /* SIMULASI */
            .simulasi-wrapper {
                flex-direction: column !important;
            }

            .simulasi-left {
                width: 100% !important;
                padding-right: 0 !important;
            }

            .simulasi-right {
                width: 100% !important;
                margin-top: 25px;
                justify-content: center !important;
            }

            .simulasi-right img {
                width: 100% !important;
                max-width: 350px;
            }

            #hasilSimulasi {
                overflow-x: auto !important;
                display: block;
                width: 100%;
            }

            #hasilSimulasi table {
                min-width: 700px;
            }

            #officeInfo {
                flex-direction: column !important;
                gap: 20px;
            }

            /* KANTOR */
            #officeInfo>div {
                width: 100% !important;
                display: flex !important;
                align-items: flex-start !important;
            }

            #officeType {
                font-size: 14px !important;
                padding: 10px 16px !important;
                background-position: right 12px center !important;
            }


            #officeInfo div div {
                font-size: 14px !important;
            }

            .responsive-office-container {
                padding: 20px !important;
            }
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 80px;

        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 30px 30px;
        }

        @media (max-width: 768px) {


            #carouselExampleControls {
                margin-top: 100px;

            }

            #carouselExampleControls .carousel-item img {
                width: 100%;
                height: auto;

                object-fit: cover;
                background: #fff;

            }


            #carouselExampleControls .carousel-control-prev,
            #carouselExampleControls .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
            }
        }
    </style>


    <body class="body tg-heading-subheading animation-style3">

        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

            @php
                use Carbon\Carbon;
                $today = Carbon::today();
                $activeSet = false;
            @endphp

            <div class="carousel-inner">
                @foreach ($baner as $item)
                    @php
                        $start = $item->tampil_start ? Carbon::parse($item->tampil_start) : null;
                        $end = $item->tampil_end ? Carbon::parse($item->tampil_end) : null;

                        // kondisi tanggal tampil
                        $isDateValid = (!$start || $today->gte($start)) && (!$end || $today->lte($end));
                    @endphp

                    @if ($item->type == 0 && $isDateValid && !empty($item->url))
                        <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                            <img src="/recfil?display=true&rf={{ $item->url }}" class="d-block w-100" alt="Slide"
                                loading="eager" decoding="async">
                        </div>
                        @php $activeSet = true; @endphp
                    @endif
                @endforeach
            </div>


            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


        <div class="container-fluid my-4 produk-container" style="padding-left:70px; padding-right:70px;">
            <div class="row" style="margin-top:70px;">

                <!-- Card 1 -->
                <div class="col-4 col-md-4 mb-4" data-aos="fade-up">
                    <div class="card h-100 product-card" style="border:none;">
                        <a href="tabungan">
                            <img src="frontend/bprrudo/assets/img/produk/tabungan/thumbtab.png" class="img-fluid produk-img"
                                style="border-radius:12px; width:100%; display:block;">
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-4 col-md-4 mb-4" data-aos="fade-up">
                    <div class="card h-100 product-card" style="border:none;">
                        <a href="deposito">
                            <img src="frontend/bprrudo/assets/img/produk/deposito/thumbdep.png" class="img-fluid produk-img"
                                style="border-radius:12px; width:100%; display:block;">
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-4 col-md-4 mb-4" data-aos="fade-up">
                    <div class="card h-100 product-card" style="border:none;">
                        <a href="kredit">
                            <img src="frontend/bprrudo/assets/img/produk/kredit/thumkredit.png" class="img-fluid produk-img"
                                style="border-radius:12px; width:100%; display:block;">
                        </a>
                    </div>
                </div>

            </div>
        </div>



        <div>
            <div class="card h-100 w-100" style="border:none; margin-top:20px;">
                <img src="frontend/bprrudo/assets/img/produk/rate deposito.png" alt="Gambar Tambahan"
                    style="border-radius:10px; width:90%; margin:auto; display:block;">
            </div>
        </div>


        <div style="width:90%; margin:auto; background:#9c2b33; padding:35px; border-radius:15px; margin-top:60px; display:flex; flex-direction:column;"
            class="simulasi-wrapper">

            <div class="simulasi-wrapper" style="display:flex;">

                <div class="simulasi-left" style="width:55%; color:white; padding-right:20px;" class="simulasi-left">

                    <h3 style="font-weight:600; margin-bottom:25px; display:flex; align-items:center;">
                        <img src="frontend/bprrudo/assets/img/produk/iconsimulasi.png"
                            style="width:50px; margin-right:10px;">
                        Simulasi Pinjaman
                    </h3>


                    <label style="font-size:14px;">Plafon Pembiayaan</label>
                    <div
                        style="display:flex; align-items:center; background:white; border-radius:30px;
                padding:12px 20px; margin-bottom:18px;">
                        <span style="color:#9c2b33; font-weight:bold; margin-right:10px;">Rp.</span>

                        <input type="text" id="plafon" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">
                    </div>

                    <label style="font-size:14px;">Lama Angsuran</label>
                    <div
                        style="display:flex; align-items:center; background:white; border-radius:30px;
                padding:12px 20px; margin-bottom:18px;">

                        <input type="text" id="tenor" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">

                        <span style="color:#9c2b33; font-weight:bold; margin-left:10px;">Bulan</span>
                    </div>

                    <label style="font-size:14px;">Bunga</label>
                    <div
                        style="display:flex; align-items:center; background:white; border-radius:30px;
                padding:12px 20px; margin-bottom:18px;">

                        <input type="text" id="bunga" placeholder="Ketik disini"
                            style="border:none; outline:none; width:100%; font-size:14px;">

                        <span style="color:#9c2b33; font-weight:bold; white-space:nowrap; margin-left:10px;">
                            % / Tahun
                        </span>
                    </div>

                    <label style="font-size:14px;">Sistem Angsuran</label>
                    <div style="background:white; border-radius:30px; padding:0; margin-bottom:30px;">

                        <select id="sistem"
                            style="width:100%; padding:12px 20px; border-radius:30px;
                        border:none; outline:none; font-size:14px;
                        appearance:none; -webkit-appearance:none; -moz-appearance:none;
                        background:white url('data:image/svg+xml;utf8,<svg fill=\'%239c2b33\' height=\'18\' viewBox=\'0 0 24 24\' width=\'18\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>') 
                        no-repeat right 20px center;">
                            <option value="">Pilih</option>
                            <option value="flat">Flat</option>
                            <option value="anuitas">Anuitas</option>
                        </select>

                    </div>


                    <div style="display:flex; justify-content:space-between; margin-top:5px; margin-bottom:20px;"
                        class="simulasi-buttons">

                        <button id="btnReset"
                            style="width:40%; padding:12px; border-radius:30px; background:#c24a51;
                        border:none; color:white; font-size:14px;">
                            Reset
                        </button>

                        <button id="btnHitung"
                            style="width:55%; padding:12px; border-radius:30px; background:white;
                        border:none; color:#9c2b33; font-weight:bold; font-size:14px;">
                            Hitung
                        </button>

                    </div>

                </div>


                <div class="simulasi-right" style="width:45%; display:flex; align-items:center; justify-content:center;"
                    class="simulasi-right">
                    <img src="frontend/bprrudo/assets/img/produk/simulasi.png" style="width:95%; border-radius:10px;">
                </div>

            </div>


            <div id="hasilSimulasiContainer" style="width:100%; margin-top:30px; display:none;">
                <div style="background:white; border-radius:10px; padding:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
                    <h4 style="color:#9c2b33; margin-bottom:15px; text-align:center;">Hasil Simulasi Pinjaman</h4>
                    <div id="hasilSimulasi" style="width:100%;"></div>
                </div>
            </div>

        </div>



        <div style="width:100%; background:linear-gradient(90deg, #dc6d4e, #e88a6d); padding:40px 0; margin-top: 60px;">

            <div
                style="
      width:90%;
      margin:auto;
      border:2px solid #ffffff;
      border-radius:22px;
      padding:20px 25px;
      color:#ffffff;
      box-sizing:border-box;
  ">

                <!-- TITLE -->
                <h3 style="margin-bottom:15px; font-size:20px; font-weight:600;">
                    Jaringan Kantor
                </h3>

                <!-- DROPDOWN -->
                <select id="officeType"
                    style="width:100%; padding:10px 18px; border-radius:30px; border:2px solid #ffffff; background:transparent;
                    color:#ffffff; margin-bottom:20px; font-size:15px; appearance:none;
                    background-image:url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' fill=\'white\' viewBox=\'0 0 16 16\'><path d=\'M3 5l5 5 5-5H3z\'/></svg>'); background-repeat:no-repeat; outline:none; 
                    background-position:right 20px center; ">

                    {{-- @foreach ($kantor as $i => $k)
                        <option value="{{ $i }}" style="color:#000;">
                            {{ $k->kantor }}
                        </option>
                    @endforeach --}}
                    @forelse ($kantor as $i => $k)
                        <option value="{{ $i }}" style="color:#000;">
                            {{ $k->kantor }}
                        </option>
                    @empty
                        <option value="" disabled selected style="color:#000;">
                            Data Kantor belum tersedia
                        </option>
                    @endforelse


                </select>

                <!-- 3 INFO -->
                <div id="officeInfo"
                    style="width:100%; display:flex; justify-content:space-between; align-items:flex-start; text-align:left; padding:10px 0;">

                    <!-- TELEPON -->
                    <div style="width:33%; display:flex; align-items:flex-start;">
                        <img src="{{ asset('frontend/bprrudo/assets/img/icons/telp.png') }}"
                            style="width:28px; margin-right:10px; margin-top:2px;">
                        <div>
                            <div style="font-size:14px; font-weight:600;">No. Telepon</div>
                            <div id="phoneNumber" style="margin-top:4px; font-size:13px;">-</div>
                        </div>
                    </div>

                    <!-- WHATSAPP -->
                    <div style="width:33%; display:flex; align-items:flex-start;">
                        <img src="{{ asset('frontend/bprrudo/assets/img/icons/wa.png') }}"
                            style="width:28px; margin-right:10px; margin-top:2px;">
                        <div>
                            <div style="font-size:14px; font-weight:600;">WhatsApp</div>
                            <div id="whatsappNumber" style="margin-top:4px; font-size:13px;">0895412301818</div>
                        </div>
                    </div>

                    <!-- ALAMAT -->
                    <div style="width:33%; display:flex; align-items:flex-start;">
                        <img src="{{ asset('frontend/bprrudo/assets/img/icons/maps.png') }}"
                            style="width:28px; margin-right:10px; margin-top:2px;">
                        <div>
                            <div style="font-size:14px; font-weight:600;">Alamat</div>
                            <div id="address" style="margin-top:4px; font-size:13px;">-</div>
                        </div>
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
            <tr style="background:#9c2b33; color:white; text-align:center;">
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
        <tr style="background:#e86c55; text-align:center; font-weight:bold; color:white;">
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





    <script>
        const kantorData = @json($kantor);

        const selectEl = document.getElementById('officeType');
        const phoneEl = document.getElementById('phoneNumber');
        // const waEl = document.getElementById('whatsappNumber');
        const addressEl = document.getElementById('address');

        function renderOffice(index) {
            const data = kantorData[index];
            if (!data) return;

            phoneEl.innerText = data.no_telp ?? '-';
            // waEl.innerText = data.no_telp ?? '-';
            addressEl.innerText = data.alamat ?? '-';
        }

        // load awal
        renderOffice(selectEl.value);

        // ketika dropdown berubah
        selectEl.addEventListener('change', function() {
            renderOffice(this.value);
        });
    </script>
@endsection
