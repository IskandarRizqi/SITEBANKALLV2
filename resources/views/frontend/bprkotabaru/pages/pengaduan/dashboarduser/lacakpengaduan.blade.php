@extends('frontend.inc_fe.main')

@section('content')

    <!-- STYLE -->
    <style>
        .step-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: white;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 13px;
            transition: 0.2s;
        }

        .step-label {
            margin-top: 6px;
            font-size: 12px;
            color: white;
            text-align: center;
            white-space: nowrap;
        }

        .box {
            background: white;
            border-radius: 10px;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #4361ee;
            border-color: #4361ee;
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #3651de;
            border-color: #3651de;
        }

        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        }

        .nav-tabs .nav-link {
            margin-bottom: -1px;
            background: none;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            padding: 0.75rem 1.25rem;
            color: #495057;
        }

        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            font-weight: 500;
        }

        .process-step {
            position: relative;
            padding: 1rem 0;
            text-align: center;
        }

        .process-step::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -50%;
            width: 100%;
            height: 2px;
            background-color: #e9ecef;
            z-index: 1;
        }

        .process-step:last-child::after {
            display: none;
        }

        .process-step.active .step-circle {
            background-color: #4361ee;
            color: white;
        }

        .process-step.active .step-label {
            color: #4361ee;
            font-weight: 500;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: ##10B981;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .step-label {
            font-size: 12px;
            color: white;
            white-space: normal;
            text-align: center;
        }

        /* MOBILE RESPONSIVE */
        @media(max-width: 600px) {
            #complaintDetailContainer .step-label {
                font-size: 10px !important;
            }

            #complaintDetailContainer .step-circle {
                width: 32px !important;
                height: 32px !important;
                font-size: 12px !important;
            }
        }

        @media(max-width:600px) {
            #complaintDetailContainer .col-span-6 {
                grid-column: span 12 !important;
            }
        }
    </style>

    <div class="content">
        <div class="intro-y mt-10 flex items-center gap-3">
            <button onclick="history.back()" class="p-1 hover:bg-gray-200 rounded-full transition">
                <i data-lucide="arrow-left" class="w-7 h-7"></i>
            </button>

            <h2 class="text-3xl font-semibold">PENGADUAN</h2>
        </div>


        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- CARD 1 -->
            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="/cek-saldo">
                    <div class="box p-5 zoom-in cursor-pointer">

                        <div class="flex justify-center mb-4" style="font-size: 30px;">
                            {{ $pengaduan_count }}
                        </div>

                        <div class="text-center font-semibold text-lg">
                            Jumlah Aduan
                        </div>
                    </div>
                </a>
            </div>

            <!-- CARD 2 -->
            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <div class="box p-5 zoom-in cursor-pointer" onclick="window.location.href=''">

                    <div class="flex justify-center mb-4 " style="font-size: 30px;">
                        {{ $pengaduan_proses }}
                    </div>

                    <div class="text-center font-semibold text-lg">
                        Pengaduan Proses
                    </div>
                </div>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <div class="box p-5 zoom-in cursor-pointer" onclick="window.location.href=''">

                    <div class="flex justify-center mb-4" style="font-size: 30px;">
                        {{ $pengaduan_tolak }}
                    </div>

                    <div class="text-center font-semibold text-lg">
                        Pengaduan di Tolak
                    </div>
                </div>
            </div>
        </div>


        <br>
        <br>
        <!-- WRAPPER RESPONSIVE -->
        <div style="width:100%; overflow-x:auto; margin-top:20px;">

            <table id="pengaduanTable" style="width:100%; border-collapse: collapse; min-width:650px;">
                @php
                    $showWaktuSelesai = $pengaduan->whereNotNull('s_w_selesai')->count() > 0;
                @endphp

                <thead>
                    <tr style="background-color: #1f2937; color: white; text-align: left;">
                        <th style="padding: 12px 16px; font-weight: 500; border: 1px solid #192235; white-space: nowrap;">No
                        </th>
                        <th style="padding: 12px 16px; font-weight: 500; border: 1px solid #192235; white-space: nowrap;">
                            No.Registrasi</th>
                        <th style="padding: 12px 16px; font-weight: 500; border: 1px solid #192235; white-space: nowrap;">
                            Jenis Pengaduan</th>
                        <th style="padding: 12px 16px; font-weight: 500; border: 1px solid #192235; white-space: nowrap;">
                            Waktu Pengaduan</th>
                        <th style="padding: 12px 16px; font-weight: 500; border: 1px solid #192235; white-space: nowrap;">
                            Status</th>
                        @if ($showWaktuSelesai)
                            <th
                                style="padding: 12px 16px; font-weight: 500; border: 1px solid #374151; white-space: nowrap;">
                                Waktu Selesai</th>
                        @endif
                        <th
                            style="padding: 12px 16px; font-weight: 500; border: 1px solid #374151; text-align:center; white-space: nowrap;">
                            Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pengaduan as $key => $item)
                        <tr style="background-color: #fff;">
                            <td style="padding:12px 16px; border:1px solid #e5e7eb; text-align:center;">
                                {{ $key + 1 }}
                            </td>
                            <td style="padding:12px 16px; border:1px solid #e5e7eb;">
                                {{ $item->no_registrasi }}
                            </td>
                            <td style="padding:12px 16px; border:1px solid #e5e7eb;">
                                {{ $item->jenis_aduan == 1 ? 'Pelanggaran' : ($item->jenis_aduan == 2 ? 'Layanan / Produk' : '-') }}
                            </td>

                            <td style="padding:12px 16px; border:1px solid #e5e7eb;">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}
                            </td>

                            @php
                                $statusText = [
                                    0 => 'Pending',
                                    1 => 'Proses',
                                    2 => 'Selesai',
                                    3 => 'Gugur',
                                ];

                                $statusColor = [
                                    0 => 'background-color:#111827; color:white;', // hitam
                                    1 => 'background-color:#FBBF24; color:black;', // kuning
                                    2 => 'background-color:#10B981; color:white;', // hijau
                                    3 => 'background-color:#EF4444; color:white;', // merah
                                ];

                                $text = $statusText[$item->status] ?? null;
                            @endphp

                            <td style="padding:12px 16px; border:1px solid #e5e7eb;">
                                @if ($text)
                                    <span
                                        style="padding:6px 12px; border-radius:6px; font-weight:600; {{ $statusColor[$item->status] }}">
                                        {{ $text }}
                                    </span>
                                @endif
                            </td>
                            @if ($showWaktuSelesai)
                                <td style="padding:12px 16px; border:1px solid #e5e7eb;">
                                    @if ($item->s_w_selesai)
                                        {{ \Carbon\Carbon::parse($item->s_w_selesai)->format('d-m-Y H:i') }}
                                    @else
                                        -
                                    @endif
                                </td>
                            @endif



                            <td style="padding:12px 16px; border:1px solid #e5e7eb; text-align:center;">
                                <button onclick="showDetail({{ $item->id }})"
                                    style="
                                        background:#D9FF43;
                                        color:#000;
                                        border:none;
                                        padding:8px 16px;
                                        border-radius:6px;
                                        font-size:14px;
                                        cursor:pointer;
                                        white-space: nowrap;
                                        display:inline-block;
                                    ">
                                    Lacak Pengaduan
                                </button>
                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:20px;">Belum ada pengaduan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>



        <div id="complaintDetailContainer" class="detail-box" style="display: none;">

            <!-- TIMELINE PROSES -->
            <div class="intro-y mt-10" style="margin-top: 40px;">
                <h2 class="text-center font-semibold mb-4" style="font-size: 20px">
                    Proses Pengaduan
                </h2>

                <div class="w-full"
                    style="
                        background-color:#192235;
                        border-radius:40px;
                        padding:20px 20px;
                        overflow-x:auto;
                        white-space:nowrap;
                    ">

                    <div class="flex items-center justify-between relative"
                        style="
                            min-width:650px;
                            display:flex;
                            align-items:center;
                            justify-content:space-between;
                        ">

                        <!-- Garis Tengah -->
                        <div
                            style="
                            position:absolute;
                            top:50%;
                            left:0;
                            width:100%;
                            border-top:1px solid rgba(255,255,255,0.3);
                        ">
                        </div>



                        <!-- Step Items -->
                        <div class="flex flex-col items-center z-10 flex-1 cursor-pointer" style="min-width:90px;"
                            onclick="openStep(1)">
                            <div id="stepCircle1" class="step-circle">1</div>
                            <span class="step-label">Cek Data</span>
                        </div>


                        <div class="flex flex-col items-center z-10 flex-1 cursor-pointer" style="min-width:90px;"
                            onclick="openStep(2)">
                            <div id="stepCircle2" class="step-circle">2</div>
                            <span class="step-label">Validasi Data</span>
                        </div>

                        <div class="flex flex-col items-center z-10 flex-1 cursor-pointer" style="min-width:90px;"
                            onclick="openStep(3)">
                            <div id="stepCircle3" class="step-circle">3</div>
                            <span class="step-label">Penanganan</span>
                        </div>

                        <div class="flex flex-col items-center z-10 flex-1 cursor-pointer" style="min-width:90px;"
                            onclick="openStep(4)">
                            <div id="stepCircle4" class="step-circle">4</div>
                            <span class="step-label">Penyelesaian</span>
                        </div>

                        <div class="flex flex-col items-center z-10 flex-1 cursor-pointer" style="min-width:90px;"
                            onclick="openStep(5)">
                            <div id="stepCircle5" class="step-circle">5</div>
                            <span class="step-label">Selesai</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- KONTEN -->
            <div class="mt-6">

                <div id="stepContent1" class="box p-5 hidden">

                    {{-- NOTIF 1 → cek data berhasil --}}
                    @if ($lastPengaduan->step_data == 2)
                        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Data berhasil diverifikasi. Lanjut ke tahap berikutnya.</span>
                        </div>
                    @endif


                    {{-- NOTIF 2 → data belum lengkap --}}
                    @if (!empty($pengaduan->p_data1) && $pengaduan->step_data != 2)
                        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                            </svg>
                            <span>Silahkan lengkapi data terlebih dahulu sebelum melanjutkan.</span>
                        </div>
                    @endif


                    <h3 class="font-semibold text-lg mb-2">Tahap 1: Cek Data</h3>
                    <p>Pengecekan kelengkapan data dan dokumen pendukung.</p>
                </div>



                <!-- STEP 2-5 (tetap sama) -->
                <div id="stepContent2" class="box p-5 hidden">
                    @if ($lastPengaduan->step_data == 3)
                        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Data berhasil divalidasi. Lanjut ke tahap berikutnya.</span>
                        </div>
                    @endif
                </div>

                <div id="stepContent3" class="box p-5 hidden">
                    <h3 class="font-semibold text-lg mb-2">Tahap 3: Penanganan</h3>
                    <p>Admin melakukan proses investigasi.</p>
                </div>

                <div id="stepContent4" class="box p-5 hidden">
                    <h3 class="font-semibold text-lg mb-2">Tahap 4: Penyelesaian</h3>
                    <p>Menunggu konfirmasi akhir.</p>
                </div>

                <div id="stepContent5" class="box p-5 hidden">
                    <h3 class="font-semibold text-lg mb-2">Tahap 5: Selesai</h3>
                    <p>Pengaduan Selesai.</p>
                </div>

            </div>
            <br>

        </div>
        
    </div>
    </div>

    <script>
        // Fungsi untuk memperbarui tampilan timeline secara keseluruhan
        function updateTimeline(currentStep) {
            // Pastikan currentStep adalah angka dan berada dalam rentang 1-5
            currentStep = parseInt(currentStep) || 0;

            for (let i = 1; i <= 5; i++) {
                let circle = document.getElementById("stepCircle" + i);

                // Reset/default semua lingkaran (warna default dari CSS)
                circle.style.background = "#10B981";
                circle.style.color = "#000";

                // Ubah warna untuk step yang sudah dilewati/aktif (<= currentStep)
                if (i <= currentStep) {
                    circle.style.background = "#4361ee"; // Warna biru/utama untuk progres
                    circle.style.color = "white";
                }
            }
        }


        let maxStepReached = 1; // Global untuk menyimpan step terakhir dari DB

        function showDetail(id) {
            const detailContainer = document.getElementById("complaintDetailContainer");

            // Toggle display
            if (detailContainer.style.display === 'block') {
                // Jika sudah terbuka → tutup saja
                detailContainer.style.display = 'none';
                return;
            }

            // Jika tertutup → buka
            detailContainer.style.display = 'block';
            detailContainer.scrollIntoView({
                behavior: 'smooth'
            });

            // Tampilkan loading sementara
            for (let i = 1; i <= 5; i++) {
                const stepEl = document.getElementById("stepContent" + i);
                stepEl.innerHTML = `<p>Sedang memuat data...</p>`;
                stepEl.classList.add("hidden");
            }

            fetch(`/pengaduan/detail-lacak-pengaduan/${id}`)
                .then(res => {
                    if (!res.ok) throw new Error('HTTP Status ' + res.status);
                    return res.json();
                })
                .then(res_data => {
                    if (res_data.status === true) {
                        const data = res_data.data;
                        maxStepReached = parseInt(data.step_data) || 1;

                        const stepTitles = ['Cek Data', 'Validasi Data', 'Penanganan', 'Penyelesaian', 'Selesai'];
                        const stepDescs = [
                            'Pengecekan kelengkapan data dan Bukti pendukung.',
                            'Admin Sedang melakukan validasi data dan dokumen pendukung.',
                            'Admin Sedang melakukan proses investigasi.',
                            'Menunggu konfirmasi Penyelesaian Kedua Belah pihak.',
                            'Pengaduan selesai.'
                        ];

                        // Update lingkaran step & klik
                        for (let i = 1; i <= 5; i++) {
                            const circle = document.getElementById("stepCircle" + i);
                            if (i <= maxStepReached) {
                                // Step yang sudah tercapai → hijau
                                circle.style.background = "#10B981";
                                circle.style.color = "#fff";
                                circle.style.cursor = "pointer";
                                circle.onclick = () => openStep(i);
                            } else {
                                // Step belum tercapai → biru
                                circle.style.background = "#3b82f6";
                                circle.style.color = "#fff";
                                circle.style.cursor = "default";
                                circle.onclick = null;
                            }
                        }

                        // Update konten setiap step
                        for (let i = 1; i <= 5; i++) {
                            let notif = '';
                            if (i === 1) {
                                if (maxStepReached >= 2) {
                                    notif = `<div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Data berhasil diverifikasi. Lanjut ke tahap berikutnya.</span>
                                     </div>`;
                                } else if (data.p_data1) {

                                    notif = `
                                        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center">

                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                                </svg>
                                                <span>Data Anda kurang lengkap, lengkapi data anda maksimal 10 hari.</span>
                                            </div>

                                            <button id="btn-lengkapi"
                                                class="ml-auto px-4 py-2 rounded font-semibold"
                                                style="
                                                    background:red !important;
                                                    color:white !important;
                                                    border:2px solid #9b1c1c !important;
                                                    opacity:1 !important;
                                                    display:inline-block !important;
                                                    visibility:visible !important;
                                                    z-index:99 !important;
                                                ">
                                                Lengkapi Data
                                            </button>

                                        </div>`;
                                        



                                } else if (data.p_data2) {
                                    notif = `<div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                        </svg>
                                        <span>Data Anda kurang lengkap , bisa dilengkapi terlebih dahulu</span>
                                     </div>`;

                                } else {
                                    notif = `<div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                        </svg>
                                        <span>Data sedang dalam proses Cek Data oleh Admin.</span>
                                     </div>`;
                                }
                            }

                            if (i === 2) {
                                if (maxStepReached >= 3) {
                                    notif = `<div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Data berhasil divalidasi dan dilanjutkan ke proses penanganan.</span>
                                     </div>`;
                                } else if (maxStepReached === 2) {
                                    notif = `<div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                        </svg>
                                        <span>Data sedang dalam proses validasi oleh Admin.</span>
                                     </div>`;
                                }
                            }

                            if (i === 3) {
                                if (maxStepReached >= 4) {
                                    notif = `<div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Proses penanganan selesai dan dilanjutkan ke tahap penyelesaian.</span>
                                    </div>`;
                                } else if (maxStepReached === 3) {
                                    notif = `<div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                        </svg>
                                        <span>Admin sedang melakukan proses investigasi / penanganan.</span>
                                    </div>`;
                                }
                            }

                            if (i === 4) {
                                if (maxStepReached >= 5) {
                                    notif = `<div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Proses penyelesaian selesai. Menunggu finalisasi.</span>
                                    </div>`;
                                } else if (maxStepReached === 4) {
                                    notif = `<div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                        </svg>
                                        <span>Menunggu konfirmasi penyelesaian dari kedua belah pihak.</span>
                                    </div>`;
                                }
                            }

                            if (i === 5) {
                                if (maxStepReached === 5) {
                                    notif = `<div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Pengaduan telah selesai dan ditutup.</span>
                                    </div>`;
                                }
                            }






                            document.getElementById('stepContent' + i).innerHTML = `
                        <div class="box p-5">
                            <h3 class="font-semibold text-lg mb-2">Tahap ${i}: ${stepTitles[i-1]}</h3>
                            <p>${stepDescs[i-1]}</p>
                            ${notif}
                        </div>
                    `;
                        }

                        // Buka step terakhir
                        openStep(maxStepReached);

                    } else {
                        document.getElementById('stepContent1').innerHTML =
                            `<p style="color:red;">${res_data.message ?? 'Data pengaduan tidak ditemukan.'}</p>`;
                    }
                })
                .catch(error => {
                    document.getElementById('stepContent1').innerHTML = `
                <div class="box p-5" style="border:1px solid red;">
                    <h3 class="font-semibold text-lg mb-2" style="color:red;">Terjadi Kesalahan</h3>
                    <p>Gagal memuat data pengaduan.</p>
                    <small>Detail Teknis: ${error.message}</small>
                </div>`;
                    console.error('AJAX/Fetch Error:', error);
                });
        }


        // Override openStep agar hanya bisa buka step <= maxStepReached
        function openStep(step) {
            step = parseInt(step) || 1;
            if (step > maxStepReached) return; // Tidak bisa buka step belum tercapai

            for (let i = 1; i <= 5; i++) {
                document.getElementById("stepContent" + i).classList.add("hidden");
            }

            document.getElementById("stepContent" + step).classList.remove("hidden");
        }



        // Panggil fungsi openStep(1) saat halaman dimuat untuk menampilkan konten Step 1 secara default.
        // openStep(1); // Tidak perlu dipanggil di luar saat ini karena akan dipanggil di showDetail
    </script>

    <script>
        document.addEventListener('click', function(e) {
            if (e.target && e.target.id === "btn-lengkapi") {

                let formHTML = `
            <div class="p-4 border border-gray-300 rounded-lg bg-white shadow">

                <h3 class="text-lg font-semibold mb-3">Form Kelengkapan Data</h3>

                <label class="block mb-2 text-sm font-medium">Uraian Tambahan</label>
                <textarea class="w-full border border-gray-300 rounded p-2 mb-3" rows="3"
                          placeholder="Tambahkan uraian tambahan..."></textarea>

                <label class="block mb-2 text-sm font-medium">Upload Bukti Tambahan</label>
                <input type="file" class="w-full border border-gray-300 rounded p-2 mb-3" />

                <button class="mt-3 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Kirim Perbaikan Data
                </button>
 
            </div>
        `;

                let container = document.getElementById("form-lengkapi-container");
                container.innerHTML = formHTML;
                container.classList.remove("hidden");
            }
        });
    </script>


@endsection
