@extends('layouts.admin')

@section('content')
    <style>
        /* CSS Styling tetap dipertahankan */
        .modal-dialog {
            max-width: 40% !important;
            width: 70% !important;
        }

        /* Memastikan custom Swal tidak bentrok */
        .swal2-confirm-custom {
            background-color: #28a745 !important;
            color: white !important;
            padding: 10px 25px !important;
            border-radius: 6px !important;
            font-size: 14px !important;
            margin-right: 10px;
        }

        .swal2-cancel-custom {
            background-color: #dc3545 !important;
            color: white !important;
            padding: 10px 25px !important;
            border-radius: 6px !important;
            font-size: 14px !important;
        }

        .swal2-container {
            z-index: 10000 !important;
            /* Nilai yang sangat tinggi untuk memastikan di atas modal */
        }


        /* --- Styling Timeline Tabs (Progress Bar Look) --- */

        .nav-timeline {
            border-bottom: none;
            /* Hilangkan garis bawah tab default */
            display: flex;
            justify-content: space-between;
            /* Meratakan item secara horizontal */
            flex-wrap: nowrap;
            /* Mencegah wrap */
        }

        .nav-timeline .nav-item {
            flex-grow: 1;
            /* Membuat lebar sama */
            text-align: center;
            position: relative;
        }

        /* Garis penghubung antar langkah */
        .nav-timeline .nav-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -50%;
            /* Membuat garis terbentang di antara item */
            width: 100%;
            height: 3px;
            background-color: #dee2e6;
            /* Warna abu-abu default */
            z-index: 1;
            transform: translateY(-50%);
        }

        .nav-timeline .nav-link {
            /* Style Dasar Tombol */
            background-color: #f8f9fa;
            /* Latar abu-abu terang */
            color: #6c757d;
            /* Teks abu-abu gelap */
            border: 1px solid #dee2e6;
            border-radius: 20px;
            /* Bentuk pil/rounded */
            padding: 8px 15px;
            margin: 0 5px;
            /* Sedikit jarak antar tombol */
            z-index: 2;
            /* Pastikan tombol di atas garis */
            position: relative;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
        }

        /* Nomor Langkah (Step Number) */
        .nav-timeline .nav-link .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #adb5bd;
            /* Abu-abu untuk langkah belum aktif */
            color: white;
            font-size: 12px;
            margin-right: 8px;
            transition: all 0.3s ease;
        }

        /* Status: COMPLETED (Langkah yang sudah dilewati) */
        .nav-timeline .nav-link.completed {
            background-color: #e9ecef;
            /* Sedikit lebih gelap dari default */
            color: #28a745;
            /* Teks hijau */
            border-color: #28a745;
            cursor: pointer;
        }

        .nav-timeline .nav-link.completed .step-number {
            background-color: #70a728;
            /* Nomor langkah menjadi hijau */
        }

        /* Status: ACTIVE (Langkah yang sedang dikerjakan) */
        .nav-timeline .nav-link.active {
            background-color: #28a745;
            /* Latar belakang hijau penuh */
            color: white;
            border-color: #28a745;
            transform: scale(1.02);
            /* Sedikit efek pop-up */
            box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3);
            cursor: default;
            /* Nonaktifkan pointer pada tab aktif */
        }

        .nav-timeline .nav-link.active .step-number {
            background-color: white;
            /* Nomor langkah menjadi putih */
            color: #28a745;
        }

        /* Memperpanjang garis ke belakang ketika langkah selesai/aktif */
        .nav-timeline .nav-item:has(.nav-link.active)::after,
        .nav-timeline .nav-item:has(.nav-link.completed)::after,
        .nav-timeline .nav-item:has(.nav-link.active)::before {
            background-color: #28a745;
            /* Garis menjadi hijau */
        }


        .nav-timeline .nav-item:not(:last-child):has(.nav-link.completed)::after {
            background-color: #28a745;
        }
    </style>

    <div class="grid grid-cols-12 gap-6">
        {{-- ... (Konten Datatable di sini, tidak berubah) ... --}}
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">
                    {{-- ... (Header, Filter, dan Tabel Data) ... --}}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 intro-y">
                            <div class="report-box">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="image" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="grid grid-cols-12 gap-6 mt-2">
                                        <div class="col-span-12">
                                            <hr>
                                        </div>
                                        <div class="col-span-12 lg:col-span-6">
                                            <form action="/salamprofit/data-jenis-pengaduan" method="get">
                                                <div class="input-group">
                                                    <input type="date" name="str" class="form-control"
                                                        value="{{ $date_start }}" data-single-mode="true">
                                                    <div class="input-group-text">-</div>
                                                    <input type="date" name="end" class="form-control"
                                                        value="{{ $date_end }}" data-single-mode="true">
                                                </div>
                                                <button class="btn btn-primary w-full mt-2" type="submit">Cari</button>
                                            </form>
                                        </div>
                                        {{-- ... (Tabel Data Pengaduan) ... --}}
                                        <div class="col-span-12">
                                            <table id="datatabledefault">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No.Registrasi</th>
                                                        <th>Jenis Pengaduan</th>
                                                        <th>Sub Pengaduan</th>
                                                        <th>Nama yang dilaporkan</th>
                                                        {{-- <th>Kerugian</th> --}}
                                                        {{-- <th>Uraian</th> --}}
                                                        <th>Status</th>
                                                        @if ($p_jangkawaktudata)
                                                            <th>Perpanjangan Kelengkapan Data</th>
                                                        @endif
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengaduan as $key => $v)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $v->no_registrasi }}</td>
                                                            <td>{{ $v->jenis->nama ?? '-' }}</td>
                                                            <td>{{ $v->sub_aduan }}</td>
                                                            <td>{{ $v->nama }}</td>
                                                            {{-- <td>{{ $v->rugi }}</td> --}}
                                                            {{-- <td>{{ $v->uraian }}</td> --}}
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

                                                                $text = $statusText[$v->status] ?? null;
                                                            @endphp

                                                            <td>
                                                                @if ($text)
                                                                    <span
                                                                        style="padding:6px 12px; border-radius:6px; font-weight:600; {{ $statusColor[$v->status] }}">
                                                                        {{ $text }}
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            @if ($p_jangkawaktudata)
                                                                <td>
                                                                    @php
                                                                        // 🚨 LOGIKA BARU DI BLADE
                                                                        $latestDueDate = null;

                                                                        // Cek p_data2 dulu (yang terbaru)
                                                                        if ($v->p_data2) {
                                                                            $latestDueDate = $v->p_data2;
                                                                        }
                                                                        // Jika p_data2 kosong, gunakan p_data1
                                                                        elseif ($v->p_data1) {
                                                                            $latestDueDate = $v->p_data1;
                                                                        }
                                                                    @endphp

                                                                    @if ($latestDueDate)
                                                                        {{-- Gunakan tanggal terbaru untuk countdown --}}
                                                                        <span class="countdown"
                                                                            data-start="{{ $latestDueDate }}"></span>
                                                                    @else
                                                                        <span class="text-muted">-</span>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                            {{-- <td>
                                                                <button class="btn btn-sm btn-info" onclick="lihattimeline({{ $v->id }})">
                                                                    <i data-lucide="eye"></i>
                                                                </button>
                                                                @if ($v->status != 3)
                                                                <button class="btn btn-sm btn-warning" onclick="toggleSetting({{ $v->id }})">
                                                                    <i data-lucide="settings"></i>
                                                                </button>
                                                                <div id="setting-options-{{ $v->id }}"
                                                                    style="display:none; margin-top:10px; background:#fff; border-radius:10px; padding:12px; box-shadow:0 2px 8px rgba(0,0,0,0.12); max-width:180px;">
                                                        
                                                                
                                                                    <button class="btn btn-danger btn-sm w-100" onclick="setGugur({{ $v->id }})">
                                                                        Gugur
                                                                    </button>
                                                
                                                                </div>
                                                                @endif
                                                            </td> --}}
                                                            <td style="display: flex; gap: 8px; align-items: center;">
                                                                <button class="btn btn-sm btn-warning"
                                                                    onclick="lihattimeline({{ $v->id }})">
                                                                    <i data-lucide="eye"></i>
                                                                </button>

                                                                @if ($v->status != 3)
                                                                    <button type="button" class="btn btn-sm btn-danger"
                                                                        onclick="setGugur({{ $v->id }})">
                                                                         <i data-lucide="x-circle"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-span-12">
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL DETAIL PENGADUAN --}}
    <div id="modalDetailPengaduan" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl "style="max-width: 90% !important;">
            <div class="modal-content shadow-lg border-0">

                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title flex items-center">
                        <i class="bi bi-person-bounding-box me-2"></i> Timeline Pengaduan Nasabah
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">

                    <ul class="nav nav-timeline mb-4" id="timelineTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active completed" id="step1-tab" data-tab-id="#step1"
                                onclick="switchTab('#step1')" type="button" role="tab" disabled>
                                <span class="step-number">1</span> Cek Data
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="step2-tab" data-tab-id="#step2" onclick="switchTab('#step2')"
                                type="button" role="tab" disabled>
                                <span class="step-number">2</span> Validasi
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="step3-tab" data-tab-id="#step3" onclick="switchTab('#step3')"
                                type="button" role="tab" disabled>
                                <span class="step-number">3</span> Proses Penanganan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="step4-tab" data-tab-id="#step4" onclick="switchTab('#step4')"
                                type="button" role="tab" disabled>
                                <span class="step-number">4</span> Penyelesaian
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="step5-tab" data-tab-id="#step4" onclick="switchTab('#step5')"
                                type="button" role="tab" disabled>
                                <span class="step-number">5</span> Selesai
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="timelineTabsContent">

                        {{-- TAB 1: CEKDATA --}}
                        <div class="tab-pane fade show active" id="step1" role="tabpanel" data-current-step="1">
                            {{-- ... (Isi Tabel Identitas dan Detail) ... --}}
                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Identitas Pelapor</h5>
                            <table class="table table-sm table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Pelapor</th>
                                        <td id="detail_nama"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Nomor HP</th>
                                        <td id="detail_hp"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Email</th>
                                        <td id="detail_email"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Alamat Pelapor</th>
                                        <td id="detail_alamat"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Tanggal Registrasi</th>
                                        <td id="detail_regis"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Detail Pengaduan</h5>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Jenis Aduan</th>
                                        <td id="detail_jenis"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Sub Aduan</th>
                                        <td id="detail_sub"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Kategori</th>
                                        <td id="detail_kategori"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Nama Terlapor</th>
                                        <td id="detail_terlapor"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Jabatan</th>
                                        <td id="detail_jabatan"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Lokasi</th>
                                        <td id="detail_lokasi"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Kerugian</th>
                                        <td id="detail_rugi"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Jenis Produk/Layanan</th>
                                        <td id="detail_produk"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Waktu Kejadian</th>
                                        <td id="detail_waktu"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Tuntutan</th>
                                        <td id="detail_tuntutan"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Deskripsi Pengaduan</th>
                                        <td id="detail_uraian"></td>
                                    </tr>
                                </tbody>
                            </table>


                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Dokumen Pendukung</h5>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Gambar</th>
                                        <td id="detail_bukti1"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Video / Rekaman</th>
                                        <td id="detail_bukti2"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-4" style="text-align: right">


                                <button class="btn btn-warning mr-2" onclick="perpanjngandata1()" id="btnLengkapiData">
                                    <i class="bi bi-clock-history"></i> Lengkapi Data
                                </button>


                                <button class="btn btn-primary mr-2"
                                    onclick="confirmSimpanData('#step2', 1, 'save-and-next')">
                                    <i class="bi bi-floppy"></i> Simpan & Lanjutkan
                                </button>



                            </div>
                        </div>

                        {{-- TAB 2: VALIDASI --}}
                        <div class="tab-pane fade" id="step2" role="tabpanel" data-current-step="2">
                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Identitas Pelapor</h5>
                            <table class="table table-sm table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Pelapor</th>
                                        <td id="detail_nama_2"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Nomor HP</th>
                                        <td id="detail_hp_2"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Email</th>
                                        <td id="detail_email_2"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Alamat Pelapor</th>
                                        <td id="detail_alamat_2"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Tanggal Registrasi</th>
                                        <td id="detail_regis_2"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <form id="formValidasi" enctype="multipart/form-data">
                                @csrf

                                <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Validasi Data</h5>
                                <table class="table table-sm table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%;">Jenis Konfirmasi</th>
                                            <td>
                                                <select name="v_jenis_konfir" id="input_jenis_konfirmasi"
                                                    class="form-control" required>
                                                    <option value="">-- Pilih Jenis Konfirmasi --</option>
                                                    <option value="Telepon/WA">Telepon/Wa</option>
                                                    <option value="Email">Email</option>
                                                    <option value="Pertemuan Langsung">Pertemuan Langsung</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Waktu Konfirmasi</th>
                                            <td>
                                                <input type="datetime-local" name="v_waktu_konfir"
                                                    id="input_waktu_konfirmasi" class="form-control" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Keterangan</th>
                                            <td>
                                                <textarea name="v_uraian_konfir" id="input_keterangan_validasi" class="form-control" rows="3"
                                                    placeholder="Masukkan detail keterangan validasi..."></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Bukti Konfirmasi</th>
                                            <td>
                                                <input type="file" name="v_bukti_konfir" id="bukti_konfirmasi"
                                                    class="form-control"
                                                    accept=".mp3,.mp4,.pdf,.png,.jpg,.jpeg,.doc,.docx">
                                                <small class="text-muted">Maks. 10MB.</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>



                            <div class="d-flex justify-content-end mt-4" style="text-align: right">


                                {{-- <button class="btn btn-secondary" onclick="switchTab('#step1')">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </button> --}}

                                <button class="btn btn-primary mr-2"
                                    onclick="SimpanDataValidasi('#step3', 2, 'save-and-next')">
                                    <i class="bi bi-floppy"></i> Simpan
                                </button>



                            </div>
                        </div>

                        {{-- TAB 3: PENANGANAN --}}
                        <div class="tab-pane fade" id="step3" role="tabpanel" data-current-step="3">
                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Identitas Pelapor</h5>
                            <table class="table table-sm table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Pelapor</th>
                                        <td id="detail_nama_3"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Nomor HP</th>
                                        <td id="detail_hp_3"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Email</th>
                                        <td id="detail_email_3"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Alamat Pelapor</th>
                                        <td id="detail_alamat_3"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Tanggal Registrasi</th>
                                        <td id="detail_regis_3"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Validasi Data</h5>
                            <table class="table table-sm table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Jenis Konfirmasi</th>
                                        <td id="v_jenis_konfir"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Waktu Konfirmasi</th>
                                        <td id="v_waktu_konfir"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Keterangan</th>
                                        <td id="v_uraian_konfir"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Bukti Konfirmasi</th>
                                        <td id="v_bukti_konfir"></td>
                                    </tr>
                                </tbody>
                            </table>



                            {{-- <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Proses Penanganan</h5> --}}
                            {{-- @foreach ($proses_penanganan as $item)
                                @if (count($item->proses_penanganan_decode) > 0)
                                    @foreach ($item->proses_penanganan_decode as $proses)
                                        <table class="table table-sm table-bordered mb-4">
                                            <tbody>
                                                <tr>
                                                    <th style="width:30%;">Waktu Proses</th>
                                                    <td>{{ \Carbon\Carbon::parse($proses['waktu'])->format('d/m/Y H:i') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Proses Sampai</th>
                                                    <td>{{ $proses['deskripsi'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else
                                    <p class="text-muted">Belum ada proses penanganan.</p>
                                @endif
                            @endforeach --}}


                            <div class="d-flex justify-content-end mb-3">
                                <button type="button" class="btn btn-sm" id="addProcessRow"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <i class="bi bi-plus-circle"></i> Tambah Proses (+)
                                </button>

                            </div>

                            <form id="formPenangananProses">
                                @csrf
                                <div id="processContainer">

                                    <table class="table table-sm table-bordered process-table mb-4">
                                        <tbody>
                                            <tr>
                                                <th style="width: 30%;">Waktu Proses (Tanggal & Jam)</th>
                                                <td>

                                                    <input type="datetime-local" name="waktu_proses[]"
                                                        class="form-control waktu_proses" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Proses Sampai</th>
                                                <td>

                                                    <textarea name="deskripsi_proses[]" class="form-control deskripsi_proses" rows="3" required></textarea>
                                                </td>
                                            </tr>

                                            <tr class="remove-row-btn-container" style="display:none;">
                                                <td colspan="2" class="text-right">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-process-row">
                                                        <i class="bi bi-trash"></i> Hapus Proses Ini
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>


                            <div class="text-left mb-10">
                                <button type="button" class="btn btn-primary btn-sm" onclick="SimpanSemuaProses()">
                                    <i class="bi bi-save"></i> Simpan Proses
                                </button>
                            </div>


                            <div class="d-flex justify-content-end mt-4" style="text-align: right">

                                {{-- <button class="btn btn-secondary" onclick="switchTab('#step2')">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </button> --}}
                                <button class="btn btn-warning mr-2" onclick="PerpanjanganWaktuPenanganan()">
                                    <i class="bi bi-clock-history"></i> Perpanjangan Waktu
                                </button>


                                <button class="btn btn-primary mr-2"
                                    onclick="SimpanSelesaiPenanganan('#step4', 3, 'save-and-next')">
                                    <i class="bi bi-floppy"></i> Lanjutkan
                                </button>



                            </div>
                        </div>

                        {{-- TAB 4: PENYELESAIAN --}}
                        <div class="tab-pane fade" id="step4" role="tabpanel" data-current-step="4">
                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Detail Pengaduan</h5>
                            <table class="table table-sm table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Pelapor</th>
                                        <td id="detail_nama_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Nomor HP</th>
                                        <td id="detail_hp_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Email</th>
                                        <td id="detail_email_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Alamat Pelapor</th>
                                        <td id="detail_alamat_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Tanggal Registrasi</th>
                                        <td id="detail_regis_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Jenis Aduan</th>
                                        <td id="detail_jenis_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Sub Aduan</th>
                                        <td id="detail_sub_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Kategori</th>
                                        <td id="detail_kategori_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Pihak/Nama Terlapor</th>
                                        <td id="detail_terlapor_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Jabatan</th>
                                        <td id="detail_jabatan_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Lokasi</th>
                                        <td id="detail_lokasi_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Kerugian</th>
                                        <td id="detail_rugi_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Jenis Produk/Layanan</th>
                                        <td id="detail_produk_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Waktu Kejadian</th>
                                        <td id="detail_waktu_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Tuntutan</th>
                                        <td id="detail_tuntutan_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Deskripsi Pengaduan</th>
                                        <td id="detail_uraian_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Gambar</th>
                                        <td id="detail_bukti1_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Video / Rekaman</th>
                                        <td id="detail_bukti2_4"></td>
                                    </tr>

                                </tbody>
                            </table>

                            <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Validasi Data</h5>
                            <table class="table table-sm table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Jenis Konfirmasi</th>
                                        <td id="v_jenis_konfir_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Waktu Konfirmasi</th>
                                        <td id="v_waktu_konfir_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Keterangan</th>
                                        <td id="v_uraian_konfir_4"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Bukti Konfirmasi</th>
                                        <td id="v_bukti_konfir_4"></td>
                                    </tr>
                                </tbody>
                            </table>



                            {{-- <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Proses Penanganan</h5>
                            @foreach ($pengaduan as $item)
                                @if (!empty($item->p_proses_penanganan_decode) && count($item->p_proses_penanganan_decode) > 0)
                                    @foreach ($item->p_proses_penanganan_decode as $proses)
                                        <table class="table table-sm table-bordered mb-4">
                                            <tbody>
                                                <tr>
                                                    <th style="width:30%;">Waktu Proses</th>
                                                    <td>{{ \Carbon\Carbon::parse($proses['waktu'])->format('d/m/Y H:i') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Proses Sampai</th>
                                                    <td>{{ $proses['deskripsi'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else
                                    <p class="text-muted">Tidak ada proses penanganan.</p>
                                @endif
                            @endforeach --}}
                            <form id="formPenyelesaian" enctype="multipart/form-data">
                                @csrf

                                <h5 class="font-semibold text-base mb-3 p-2 bg-gray-100 rounded-md">Penyelesaian</h5>
                                <table class="table table-sm table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%;">Waktu Selesai </th>
                                            <td>

                                                <input type="datetime-local" name="s_w_selesai"
                                                    id="input_waktu_konfirmasi" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th style="width: 30%;">Keterangan Kesepakatan</th>
                                            <td>
                                                <textarea name="s_ket_selesai" id="input_keterangan_validasi" class="form-control" rows="3"
                                                    placeholder="Masukkan detail keterangan Kesepakatan..."></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>




                            <div class="d-flex justify-content-end mt-4" style="text-align: right">


                                {{-- <button class="btn btn-secondary" onclick="switchTab('#step3')">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </button> --}}


                                <button class="btn btn-primary mr-2"
                                    onclick="SimpanDatapPenyelesaian('#step5', 4, 'save-and-next')">
                                    <i class="bi bi-floppy"></i> Simpan
                                </button>



                            </div>
                        </div>

                        <div class="tab-pane fade" id="step5" role="tabpanel" data-current-step="5">

                            <div class="text-center p-5">

                                <i class="bi bi-check-circle-fill text-success" style="font-size: 80px;"></i>

                                <h3 class="mt-3 font-bold">Penyelesaian Pengaduan Berhasil!</h3>

                                <p class="text-muted mt-2">
                                    Semua proses penanganan telah selesai dan data sudah diarsipkan.
                                </p>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                {{-- <button class="btn btn-secondary" onclick="switchTab('#step4')">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </button> --}}

                                {{-- <button type="button" class="btn btn-primary ml-2" onclick="closeModalPengaduan()">
                                    <i class="bi bi-x-circle"></i> TUTUP
                                </button> --}}

                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Deklarasi variabel modal
        let detailModal;

        function toggleSetting(id) {
            let box = document.getElementById('setting-options-' + id);
            box.style.display = (box.style.display === 'none') ? 'block' : 'none';
        }

        // ---------- INISIALISASI WAJIB ----------
        document.addEventListener("DOMContentLoaded", function() {
            const modalElement = document.querySelector("#modalDetailPengaduan");
            if (typeof tailwind !== 'undefined' && modalElement) {
                detailModal = tailwind.Modal.getOrCreateInstance(modalElement);
            } else {
                console.error("Tailwind Modal library not found or modal element missing.");
            }

            startCountdown();
        });
        // ----------------------------------------


        // 1. FUNGSI UTAMA: MERENDER TOMBOL NAVIGASI (Di dalam Tab dan di Footer)
        function renderNavigationButtons(currentStep) {
            const nextStep = currentStep + 1;
            const prevStep = currentStep - 1;
            const isLastStep = currentStep === 4;

            let prevButton = '';
            let nextButton = '';

            // Tombol Kembali (Muncul di step 2, 3, 4)
            if (currentStep > 1) {
                prevButton = `
                <button class="btn btn-secondary btn-back" data-target="#step${prevStep}">
                    <i class="bi bi-arrow-left"></i> Kembali
                </button>
            `;
            }

            // Tombol Simpan/Selesai
            let nextTabId = isLastStep ? 'null' : `#step${nextStep}`;
            let buttonLabel = isLastStep ? 'Selesai & Tutup' : 'Simpan & Lanjutkan';
            let buttonClass = isLastStep ? 'btn-success' : 'btn-primary';

            nextButton = `
            <button class="btn ${buttonClass} btn-save-next" data-next-tab="${nextTabId}" data-current-step="${currentStep}">
                ${buttonLabel} <i class="bi bi-arrow-right"></i>
            </button>
        `;

            // --- 1. RENDER DI DALAM TAB (Konten) ---
            // Bersihkan dan isi placeholder tombol di tab yang aktif
            const tabButtonsContainer = $(`.tab-pane.active .tab-nav-buttons`);
            tabButtonsContainer.empty();

            if (currentStep > 1) {
                // Jika ada tombol Kembali, gunakan justify-content-between
                tabButtonsContainer.html(`
                <div class="d-flex justify-content-start">${prevButton}</div>
                <div class="d-flex justify-content-end">${nextButton}</div>
            `);
            } else {
                // Jika hanya Simpan (Step 1), gunakan justify-content-end
                tabButtonsContainer.html(`
                <div class="d-flex justify-content-end w-100">${nextButton}</div>
            `);
            }

            // --- 2. RENDER DI FOOTER MODAL ---
            const footer = $('#modalFooterNav');
            footer.empty();

            // Memastikan tombol berdampingan di footer
            footer.html(`
            <div class="d-flex justify-content-start">${prevButton}</div>
            <div class="d-flex justify-content-end">${nextButton}</div>
        `);
        }

        // UNTUK MELANJUTKAN KE TAB NEXT
        function switchTab(targetId) {


            $('.tab-content .tab-pane').removeClass('active show');

            const $target = $(targetId);
            $target.addClass('active show'); // Menampilkan konten tab baru

            $('#timelineTabs button').removeClass('active');
            const $targetButton = $(`#timelineTabs button[data-tab-id="${targetId}"]`);
            $targetButton.addClass('active');

            $('#timelineTabs button').each(function() {
                const currentButton = $(this);
                if (currentButton.is($targetButton)) {

                    return false;
                }
                currentButton.addClass('completed');
            });

            const currentStep = parseInt($target.data('current-step'));

        }




        // FUNGSI UTAMA: DIPANGGIL DARI TOMBOL DATATABLE
        function lihattimeline(id) {
            if (!detailModal) {
                console.error("Modal belum diinisialisasi.");
                return;
            }
            currentPengaduanId = id;

            $.get('/salamprofit/pengaduan/detail/' + id, function(res) {
                // --- PENGISIAN DATA (Sama seperti sebelumnya) ---

                // STEP 1: identitas
                $('#detail_nama').text(res.nama ?? "-");
                $('#detail_hp').text(res.hp ?? "-");
                $('#detail_email').text(res.email ?? "-");
                $('#detail_alamat').text(res.alamat ?? "-");
                $('#detail_regis').text(res.regis ?? "-");
                $('#detail_jenis').text(res.jenis_aduan ?? "-");
                $('#detail_sub').text(res.sub_aduan ?? "-");
                $('#detail_kategori').text(res.kategori ?? "-");
                $('#detail_terlapor').text(res.terlapor ?? "-");
                $('#detail_jabatan').text(res.jabatan ?? "-");
                $('#detail_lokasi').text(res.lokasi ?? "-");
                $('#detail_rugi').text(res.rugi ?? "-");
                $('#detail_produk').text(res.produk ?? "-");
                $('#detail_waktu').text(res.waktu ?? "-");
                $('#detail_tuntutan').text(res.tuntutan ?? "-");
                $('#detail_uraian').text(res.uraian ?? "-");

                let b1 = '';
                if (Array.isArray(res.bukti1)) {
                    res.bukti1.forEach(f => {
                        b1 +=
                            `<img src="/storage/pengaduan/bukti1/${f}" class="img-thumbnail m-1" width="140">`;
                    });
                }
                $('#detail_bukti1').html(b1 || '<span class="text-muted">Tidak ada bukti gambar</span>');


                // STEP 3: bukti 2
                let b2 = '';
                if (Array.isArray(res.bukti2)) {
                    res.bukti2.forEach(f => {
                        b2 += `<a href="/storage/pengaduan/bukti2/${f}" target="_blank">${f}</a>`;
                    });
                }
                $('#detail_bukti2').html(b2 || '<span class="text-muted">Tidak ada bukti video/audio</span>');


                // STEP 2: detail

                $('#detail_nama_2').text(res.nama ?? "-");
                $('#detail_hp_2').text(res.hp ?? "-");
                $('#detail_email_2').text(res.email ?? "-");
                $('#detail_alamat_2').text(res.alamat ?? "-");
                $('#detail_regis_2').text(res.regis ?? "-");
                $('#detail_jenis_2').text(res.jenis_aduan ?? "-");
                $('#detail_sub_2').text(res.sub_aduan ?? "-");
                $('#detail_kategori_2').text(res.kategori ?? "-");
                $('#detail_terlapor_2').text(res.terlapor ?? "-");
                $('#detail_jabatan_2').text(res.jabatan ?? "-");
                $('#detail_lokasi_2').text(res.lokasi ?? "-");
                $('#detail_rugi_2').text(res.rugi ?? "-");
                $('#detail_produk_2').text(res.produk ?? "-");
                $('#detail_waktu_2').text(res.waktu ?? "-");
                $('#detail_tuntutan_2').text(res.tuntutan ?? "-");
                $('#detail_uraian_2').text(res.uraian ?? "-");

                // STEP 3: 
                $('#detail_nama_3').text(res.nama ?? "-");
                $('#detail_hp_3').text(res.hp ?? "-");
                $('#detail_email_3').text(res.email ?? "-");
                $('#detail_alamat_3').text(res.alamat ?? "-");
                $('#detail_regis_3').text(res.regis ?? "-");
                $('#v_jenis_konfir').text(res.v_jenis_konfir ?? "-");
                $('#v_uraian_konfir').text(res.v_uraian_konfir ?? "-");
                $('#v_waktu_konfir').text(res.v_waktu_konfir ?? "-");
                $('#v_bukti_konfir').text(res.v_bukti_konfir ?? "-");


                // STEP 4
                $('#detail_nama_4').text(res.nama ?? "-");
                $('#detail_hp_4').text(res.hp ?? "-");
                $('#detail_email_4').text(res.email ?? "-");
                $('#detail_alamat_4').text(res.alamat ?? "-");
                $('#detail_regis_4').text(res.regis ?? "-");
                $('#detail_jenis_4').text(res.jenis_aduan ?? "-");
                $('#detail_sub_4').text(res.sub_aduan ?? "-");
                $('#detail_kategori_4').text(res.kategori ?? "-");
                $('#detail_terlapor_4').text(res.terlapor ?? "-");
                $('#detail_jabatan_4').text(res.jabatan ?? "-");
                $('#detail_lokasi_4').text(res.lokasi ?? "-");
                $('#detail_rugi_4').text(res.rugi ?? "-");
                $('#detail_produk_4').text(res.produk ?? "-");
                $('#detail_waktu_4').text(res.waktu ?? "-");
                $('#detail_tuntutan_4').text(res.tuntutan ?? "-");
                $('#detail_uraian_4').text(res.uraian ?? "-");

                $('#v_jenis_konfir_4').text(res.v_jenis_konfir ?? "-");
                $('#v_waktu_konfir_4').text(res.v_waktu_konfir ?? "-");
                $('#v_uraian_konfir_4').text(res.v_uraian_konfir ?? "-");
                $('#v_bukti_konfir_4').text(res.v_bukti_konfir ?? "-");
                // Proses Penanganan
                let html = '';
                if (res.p_proses_penanganan && res.p_proses_penanganan.length > 0) {
                    res.p_proses_penanganan.forEach(function(proses) {
                        html += `
                        <table class="table table-sm table-bordered mb-4">
                            <tbody>
                                <tr>
                                    <th style="width:30%;">Waktu Proses</th>
                                    <td>${moment(proses.waktu).format('DD/MM/YYYY HH:mm')}</td>
                                </tr>
                                <tr>
                                    <th>Proses Sampai</th>
                                    <td>${proses.deskripsi}</td>
                                </tr>
                            </tbody>
                        </table>
                    `;
                    });
                } else {
                    html = '<p class="text-muted">Belum ada proses penanganan.</p>';
                }

                $('#v_mulaipenanganan_4').html(html);



                updateButtonState(res.p_data1, res.p_data2);

                const currentStep = parseInt(res.step_data) || 1; // Ambil step dari DB (default 1)

                let targetTabId;
                switch (currentStep) {
                    case 1:
                        targetTabId = '#step1';
                        break;
                    case 2:
                        targetTabId = '#step2';
                        break;
                    case 3:
                        targetTabId = '#step3';
                        break;
                    case 4:
                        targetTabId = '#step4';
                        break;
                    case 5:
                        targetTabId = '#step5';
                        break;
                    default:
                        targetTabId = '#step1';
                }

                // 3. Panggil switchTab dengan tab yang ditentukan dari database
                switchTab(targetTabId);


                // Tampilkan modal
                detailModal.show();
            });
        }


        // LOGIKA COUNTDOWN
        function startCountdown() {
            document.querySelectorAll(".countdown").forEach(function(cell) {

                let start = cell.getAttribute("data-start");


                let existingTimer = cell.timer;
                if (existingTimer) {
                    clearInterval(existingTimer);
                }

                if (!start || start === "0000-00-00 00:00:00") {
                    cell.innerHTML = "<span class='badge bg-secondary'>Tenggat Belum Ditetapkan</span>";
                    return;
                }


                let deadline = new Date(start).getTime();

                let timer = setInterval(function() {

                    let now = new Date().getTime();
                    let sisa = deadline - now;

                    // --- LOGIKA WARNA ---
                    let twoDaysInMs = 2 * 24 * 60 * 60 * 1000;
                    let colorClass = 'text-warning fw-bold'; // Default: Kuning

                    if (sisa <= 0) {

                        cell.innerHTML = "<span class='text-danger fw-bold'>Waktu Habis</span>";
                        clearInterval(timer);
                        return;
                    } else if (sisa <= twoDaysInMs) {
                        // Kurang dari 2 hari: Merah
                        colorClass = 'text-danger fw-bold';
                    }

                    let hari = Math.floor(sisa / (1000 * 60 * 60 * 24));
                    let jam = Math.floor((sisa % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let menit = Math.floor((sisa % (1000 * 60 * 60)) / (1000 * 60));
                    let detik = Math.floor((sisa % (1000 * 60)) / 1000);

                    // TAMPILAN
                    cell.innerHTML = `
                <span class="${colorClass}">
                    ${hari}h ${jam}j ${menit}m ${detik}d
                </span>
            `;
                }, 1000);


                cell.timer = timer;
            });
        }



        // --- EVENT LISTENERS JQUERY BARU ---
        $(document).ready(function() {

            $('#modalDetailPengaduan').on('click', '.btn-save-next', function() {
                const nextTabId = $(this).data('next-tab');
                const currentStep = parseInt($(this).data('current-step'));


                confirmSimpan(nextTabId, currentStep);
            });

            $('#modalDetailPengaduan').on('click', '.btn-back', function() {
                const prevTabId = $(this).data('target');


                switchTab(prevTabId);
            });

            $('#timelineTabs button').on('click', function() {
                const targetId = $(this).attr('data-tab-id');
                switchTab(targetId);
            });

            $('#modalDetailPengaduan').on('hidden.bs.modal', function() {
                switchTab('#step1');
            });
        });
    </script>


    {{-- Tambah Proses Penanganan --}}
    <script>
        const processTemplate = `
        <table class="table table-sm table-bordered process-table mb-4">
            <tbody>
                <tr>
                    <th style="width: 30%;">Waktu Proses (Tanggal & Jam)</th>
                    <td>
                        <input type="datetime-local" name="waktu_proses[]" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th style="width: 30%;">Proses Sampai</th>
                    <td>
                        <textarea name="deskripsi_proses[]" class="form-control" rows="3" placeholder="Masukkan detail keterangan Proses..." required></textarea>
                    </td>
                </tr>
                <tr class="remove-row-btn-container">
                    <td colspan="2" class="text-right">
                        <button type="button" class="btn btn-danger btn-sm remove-process-row">
                            <i class="bi bi-trash"></i> Hapus Proses Ini
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    `;

        function updateRemoveButtons() {
            const processTables = $('#processContainer').find('.process-table');
            if (processTables.length <= 1) {
                processTables.find('.remove-row-btn-container').hide();
            } else {
                processTables.find('.remove-row-btn-container').show();
            }
        }


        // $('#addProcessRow').on('click', function() {

        //     $('#processContainer').append(processTemplate);
        //     updateRemoveButtons();
        // });

        $('#processContainer').on('click', '.remove-process-row', function() {
            if ($('#processContainer').find('.process-table').length > 1) {
                // Hapus tabel proses terdekat
                $(this).closest('.process-table').remove();
                updateRemoveButtons();
            } else {
                alert('Minimal harus ada satu Proses Penanganan.');
            }
        });

        updateRemoveButtons();
    </script>



    {{-- FUNGSI TAB1    (CEKDATA) --}}
    <script>
        let currentPengaduanId = null;

        function confirmSimpanData(nextTabId, currentStep) {

            const id = currentPengaduanId;

            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan. Gagal memproses.", "error");
                return;
            }

            let titleText = (currentStep < 4) ? "Simpan Data dan Lanjutkan?" : "Selesaikan Proses dan Simpan?";
            let confirmText = (currentStep < 4) ? "Ya, Simpan & Lanjutkan" : "Ya, Selesai";

            Swal.fire({
                title: titleText,
                text: "Anda akan menyimpan data di tab ini dan berpindah ke langkah berikutnya. Pastikan data sudah benar.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: confirmText,
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {
                if (result.isConfirmed) {


                    Swal.fire({
                        title: "Sedang diproses...",
                        text: "Memperbarui status...",
                        icon: "info",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch("{{ url('salamprofit/pengaduan/simpan-data') }}/" + id, {

                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            Swal.close();

                            if (res.success) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: res.message,
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                if (currentStep < 4) {
                                    // Pindah ke tab berikutnya (#step2)
                                    switchTab(nextTabId);
                                } else {
                                    // Logika selesai (optional: reload halaman)
                                    location.reload();
                                }

                            } else {
                                Swal.fire("Gagal", res.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.close();
                            console.error('Fetch Error:', error);
                            Swal.fire("Error", "Terjadi kesalahan koneksi atau server.", "error");
                        });

                }
            });
        }


        function perpanjngandata1() {
            const id = currentPengaduanId;
            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan. Gagal memproses.", "error");
                return;
            }

            Swal.fire({
                title: "Konfirmasi Perpanjangan Data 1",
                text: "Anda akan memberikan perpanjangan waktu 10 hari kerja pertama untuk melengkapi data. Lanjutkan?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Perpanjang",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Sedang diproses...",
                        text: "Memperbarui status...",
                        icon: "info",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch("{{ url('salamprofit/pengaduan/perpanjangan-step1') }}/" + id, {
                            // fetch("/pengaduan/perpanjangan-step1/" + id, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            Swal.close();
                            if (res.success) {
                                Swal.fire("Berhasil!", res.message, "success");


                                lihattimeline(id);

                            } else {
                                Swal.fire("Gagal", res.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.close();
                            Swal.fire("Error", "Terjadi kesalahan koneksi atau server.", "error");
                        });
                }
            });
        }

        function perpanjngandata2() {
            const id = currentPengaduanId;
            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan. Gagal memproses.", "error");
                return;
            }

            Swal.fire({
                title: "Konfirmasi Perpanjangan Data 2",
                text: "Anda akan memberikan perpanjangan waktu **terakhir** 10 hari kerja untuk melengkapi data. Lanjutkan?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Perpanjang",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Sedang diproses...",
                        text: "Memperbarui status...",
                        icon: "info",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    fetch("{{ url('salamprofit/pengaduan/perpanjangan-step2') }}/" + id, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            Swal.close();
                            if (res.success) {
                                Swal.fire("Berhasil!", res.message, "success");
                                lihattimeline(id);

                            } else {
                                Swal.fire("Gagal", res.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.close();
                            Swal.fire("Error", "Terjadi kesalahan koneksi atau server.", "error");
                        });
                }
            });
        }

        function updateButtonState(p_data1, p_data2) {
            const $btn = $('#btnLengkapiData');


            if (!$btn.length) return;

            if (!p_data1) {

                $btn.html('<i class="bi bi-clock-history"></i> Lengkapi Data 1').attr('onclick', 'perpanjngandata1()')
                    .show();
                $btn.removeClass('btn-success').addClass('btn-warning');

            } else if (p_data1 && !p_data2) {

                $btn.html('<i class="bi bi-clock-history"></i> Lengkapi Data 2').attr('onclick', 'perpanjngandata2()')
                    .show();
                $btn.removeClass('btn-warning').addClass('btn-warning');

            } else {

                $btn.html('<i class="bi bi-check-circle"></i> Selesai Perpanjangan').attr('onclick', 'void(0)').show();
                $btn.removeClass('btn-warning').addClass('btn-secondary').prop('disabled', true);
            }
        }
    </script>


    {{-- FUNGSI TAB 2 (VALIDASI) --}}
    <script>
        function SimpanDataValidasi(nextTabId, currentStep) {

            const id = currentPengaduanId;
            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan.", "error");
                return;
            }

            Swal.fire({
                title: "Simpan Data?",
                text: "Pastikan data validasi sudah benar.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Simpan",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {

                if (!result.isConfirmed) return;

                Swal.fire({
                    title: "Memproses...",
                    text: "Harap tunggu sebentar",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => Swal.showLoading()
                });


                let formData = new FormData(document.getElementById('formValidasi'));

                fetch("{{ url('salamprofit/pengaduan/simpan-data-validasi') }}/" + id, {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(async response => {
                        const contentType = response.headers.get("content-type") || "";

                        if (!response.ok) {
                            const text = await response.text();
                            console.error("Server Error:", response.status, text);
                            throw new Error("Server error " + response.status);
                        }

                        if (contentType.includes("application/json")) {
                            return response.json();
                        }

                        return {
                            success: false,
                            message: "Unexpected non-JSON response"
                        };
                    })
                    .then(data => {
                        Swal.close();

                        if (data.success) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: data.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });

                            switchTab(nextTabId);
                        } else {
                            Swal.fire("Gagal", data.message, "error");
                        }
                    })
                    .catch(err => {
                        Swal.close();
                        console.error("FETCH ERROR:", err);
                        Swal.fire("Error", err.message, "error");
                    });
            });
        }
    </script>
    <script>
        // ➕ Tambah baris proses (HANYA 1 row per klik)
        document.getElementById("addProcessRow").addEventListener("click", () => {

            let html = `
        <table class="table table-sm table-bordered process-table mb-4">
            <tbody>

                <tr>
                    <th style="width:30%;">Waktu Proses</th>
                    <td>
                        <input type="datetime-local" name="waktu_proses[]" class="form-control waktu_proses" required>
                    </td>
                </tr>

                <tr>
                    <th>Proses Sampai</th>
                    <td>
                        <textarea name="deskripsi_proses[]" class="form-control deskripsi_proses" rows="3" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-right">
                        <button type="button" class="btn btn-danger btn-sm remove-process-row">
                            <i class="bi bi-trash"></i> Hapus Proses Ini
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    `;

            document.getElementById("processContainer")
                .insertAdjacentHTML("beforeend", html);
        });

        // 🗑 Hapus baris proses
        document.addEventListener("click", function(e) {
            if (e.target.closest(".remove-process-row")) {
                e.target.closest(".process-table").remove();
            }
        });


        // 💾 SIMPAN SEMUA PROSES
        function SimpanSemuaProses() {

            let id = currentPengaduanId;

            let waktuList = document.querySelectorAll(".waktu_proses");
            let deskripsiList = document.querySelectorAll(".deskripsi_proses");

            let proses = [];

            for (let i = 0; i < waktuList.length; i++) {
                proses.push({
                    waktu: waktuList[i].value,
                    deskripsi: deskripsiList[i].value
                });
            }

            // 🔥 kirim JSON langsung
            fetch("{{ url('salamprofit/pengaduan/simpan-proses-penanganan') }}/" + id, {

                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        proses: proses
                    })
                })
                .then(r => r.json())
                .then(r => {
                    if (r.success) {
                        Swal.fire("Berhasil", r.message, "success");
                    } else {
                        Swal.fire("Gagal", r.message, "error");
                    }
                });

        }


        function PerpanjanganWaktuPenanganan() {
            const id = currentPengaduanId;
            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan. Gagal memproses.", "error");
                return;
            }

            Swal.fire({
                title: "Konfirmasi Perpanjangan Waktu Proses",
                text: "Anda akan menambahkan 10 hari kerja pada waktu proses ini. Lanjutkan?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Perpanjang",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Sedang diproses...",
                        text: "Memperbarui waktu proses...",
                        icon: "info",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch("{{ url('salamprofit/pengaduan/perpanjangan-waktu-proses') }}/" + id, {

                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            Swal.close();
                            if (res.success) {
                                Swal.fire("Berhasil!", res.message, "success");
                                // Optional: refresh timeline / data proses
                                lihattimeline(id);
                            } else {
                                Swal.fire("Gagal", res.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.close();
                            Swal.fire("Error", "Terjadi kesalahan koneksi atau server.", "error");
                        });
                }
            });
        }


        function SimpanSelesaiPenanganan(nextTabId, currentStep) {

            const id = currentPengaduanId;

            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan. Gagal memproses.", "error");
                return;
            }

            let titleText = (currentStep < 4) ? "Simpan Data dan Lanjutkan?" : "Selesaikan Proses dan Simpan?";
            let confirmText = (currentStep < 4) ? "Ya, Simpan & Lanjutkan" : "Ya, Selesai";

            Swal.fire({
                title: titleText,
                text: "Anda akan menyimpan data di tab ini dan berpindah ke langkah berikutnya. Pastikan data sudah benar.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: confirmText,
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {
                if (result.isConfirmed) {


                    Swal.fire({
                        title: "Sedang diproses...",
                        text: "Memperbarui status...",
                        icon: "info",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch("{{ url('salamprofit/pengaduan/SimpanSelesaiPenanganan') }}/" + id, {

                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            Swal.close();

                            if (res.success) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: res.message,
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                if (currentStep < 4) {
                                    // Pindah ke tab berikutnya (#step2)
                                    switchTab(nextTabId);
                                } else {
                                    // Logika selesai (optional: reload halaman)
                                    location.reload();
                                }

                            } else {
                                Swal.fire("Gagal", res.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.close();
                            console.error('Fetch Error:', error);
                            Swal.fire("Error", "Terjadi kesalahan koneksi atau server.", "error");
                        });

                }
            });
        }
    </script>

    {{-- STEP 4 (PENYELESAIAN) --}}
    <script>
        function SimpanDatapPenyelesaian(nextTabId, currentStep) {

            const id = currentPengaduanId;
            if (!id) {
                Swal.fire("Error", "ID Pengaduan tidak ditemukan.", "error");
                return;
            }

            Swal.fire({
                title: "Simpan Data?",
                text: "Pastikan data validasi sudah benar.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Simpan",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal2-confirm-custom",
                    cancelButton: "swal2-cancel-custom"
                }
            }).then((result) => {

                if (!result.isConfirmed) return;

                Swal.fire({
                    title: "Memproses...",
                    text: "Harap tunggu sebentar",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => Swal.showLoading()
                });


                let formData = new FormData(document.getElementById('formPenyelesaian'));

                fetch("{{ url('salamprofit/pengaduan/simpan-data-penyelesaian') }}/" + id, {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(async response => {
                        const contentType = response.headers.get("content-type") || "";

                        if (!response.ok) {
                            const text = await response.text();
                            console.error("Server Error:", response.status, text);
                            throw new Error("Server error " + response.status);
                        }

                        if (contentType.includes("application/json")) {
                            return response.json();
                        }

                        return {
                            success: false,
                            message: "Unexpected non-JSON response"
                        };
                    })
                    .then(data => {
                        Swal.close();

                        if (data.success) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: data.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });

                            switchTab(nextTabId);
                        } else {
                            Swal.fire("Gagal", data.message, "error");
                        }
                    })
                    .catch(err => {
                        Swal.close();
                        console.error("FETCH ERROR:", err);
                        Swal.fire("Error", err.message, "error");
                    });
            });
        }
    </script>

    <script>
        function setGugur(id) {

            Swal.fire({
                title: "Yakin Gugurkan Pengaduan?",
                text: "Pengaduan akan dihentikan dan tidak bisa diproses lagi.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Gugurkan",
                cancelButtonText: "Batal"
            }).then((result) => {

                if (!result.isConfirmed) return;

                Swal.fire({
                    title: "Memproses...",
                    text: "Mohon tunggu",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => Swal.showLoading()
                });
                fetch("{{ url('salamprofit/pengaduan/set-gugur') }}/" + id, {

                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.close();

                        if (data.success) {

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: data.message,
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Jika memakai datatable, reload:
                            if (typeof reloadDataTable === "function") {
                                reloadDataTable();
                            }

                            // Tutup setting menu
                            document.getElementById("setting-options-" + id).style.display = "none";
                        } else {
                            Swal.fire("Gagal", data.message, "error");
                        }
                    })
                    .catch(err => {
                        Swal.close();
                        Swal.fire("Error", "Terjadi kesalahan sistem", "error");
                        console.error(err);
                    });
            });
        }
    </script>
@endsection
