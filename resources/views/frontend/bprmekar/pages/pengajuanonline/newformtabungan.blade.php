@extends('frontend.bprmekar.layout.main')

@section('content')
    <style>
        /* ─── Design Tokens ─── */
        :root {
            --gold:        #C8922A;
            --gold-light:  #F0C060;
            --gold-bg:     #FDF6E3;
            --dark:        #1A1A1A;
            --mid:         #4A4A4A;
            --muted:       #8A8A8A;
            --border:      #D8C99A;
            --surface:     #FFFFFF;
            --surface-alt: #FAFAF7;
            --red:         #C0392B;
            --radius:      6px;
            --shadow:      0 2px 12px rgba(0,0,0,0.08);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #F2EDE0;
            color: var(--dark);
            min-height: 100vh;
            padding: 24px 16px 60px;
        } */

        /* ─── Header ─── */
        .page-header {
            max-width: 860px;
            margin: 0 auto 32px;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px 28px;
            background: var(--surface);
            border-radius: 10px;
            box-shadow: var(--shadow);
            border-left: 5px solid var(--gold);
        }
        .logo-mark {
            width: 52px; height: 52px;
            background: var(--gold);
            border-radius: 8px;
            display: grid; place-items: center;
            flex-shrink: 0;
            font-size: 22px; font-weight: 900;
            color: white; letter-spacing: -1px;
        }
        .page-header h1 {
            font-size: 13px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .page-header h2 {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-top: 2px;
        }

        /* ─── Form wrapper ─── */
        .form-wrapper {
            max-width: 860px;
            margin: 0 auto;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* ─── Accordion Section ─── */
        .section {
            background: var(--surface);
            border-radius: 10px;
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .section-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 22px;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            gap: 14px;
            transition: background 0.18s;
        }
        .section-header:hover { background: var(--gold-bg); }

        .section-header.open { background: var(--gold); }
        .section-header.open .section-title,
        .section-header.open .section-num { color: #fff; }
        .section-header.open .chevron { color: #fff; transform: rotate(180deg); }
        .section-header.open .section-badge { background: rgba(255,255,255,0.25); color: #fff; }

        .section-left {
            display: flex;
            align-items: center;
            gap: 14px;
            flex: 1;
        }
        .section-num {
            font-size: 11px;
            font-weight: 700;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            min-width: 24px;
        }
        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: 0.01em;
        }
        .section-badge {
            font-size: 11px;
            background: var(--gold-bg);
            color: var(--gold);
            padding: 2px 9px;
            border-radius: 20px;
            font-weight: 600;
        }
        .chevron {
            font-size: 18px;
            color: var(--muted);
            transition: transform 0.25s, color 0.18s;
            flex-shrink: 0;
        }

        .section-body {
            display: none;
            padding: 24px 28px 28px;
            background: var(--surface-alt);
            border-top: 1px solid var(--border);
            animation: slideDown 0.2s ease;
        }
        .section-body.open { display: block; }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ─── Field grid ─── */
        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px 24px;
        }
        .field-grid.cols-3 { grid-template-columns: repeat(3, 1fr); }
        .field-grid.cols-1 { grid-template-columns: 1fr; }

        .field { display: flex; flex-direction: column; gap: 6px; }
        .field.span-2 { grid-column: span 2; }
        .field.span-3 { grid-column: span 3; }

        label {
            font-size: 14px;
            font-weight: 600;
            color: var(--mid);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0px;
        }
        label .req { color: var(--red); margin-left: 2px; }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 9px 13px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            color: var(--dark);
            background: var(--surface);
            transition: border-color 0.15s, box-shadow 0.15s;
            font-family: inherit;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(200,146,42,0.15);
        }
        textarea { resize: vertical; min-height: 70px; }

        /* ─── Checkbox group ─── */
        .form-check {
            padding-left: 0px;
        }

        .check-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 18px;
            margin-top: 4px;
        }
        .check-item {
            display: flex;
            align-items: center;
            gap: 7px;
            cursor: pointer;
            font-size: 12px;
            color: var(--mid);
        }
        .check-item input[type="checkbox"],
        .check-item input[type="radio"] {
            width: 16px; 
            height: 16px;
            accent-color: var(--gold);
            cursor: pointer;
        }

        /* ─── Rekening number boxes ─── */
        .rekening-boxes {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }
        .rekening-boxes input {
            width: 58px;
            text-align: center;
            letter-spacing: 2px;
            font-weight: 700;
            padding: 9px 8px;
        }
        .rekening-sep { color: var(--muted); font-size: 18px; font-weight: 300; }

        /* ─── Divider label ─── */
        .subsection-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--gold);
            border-bottom: 1.5px solid var(--border);
            padding-bottom: 6px;
            margin: 22px 0 16px;
            grid-column: 1 / -1;
        }

        /* ─── Hint text ─── */
        .hint {
            font-size: 11.5px;
            color: var(--muted);
            margin-top: 2px;
        }

        /* ─── Submit ─── */
        .form-footer {
            max-width: 860px;
            margin: 20px auto 0;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }
        .btn {
            padding: 12px 32px;
            border: none;
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.15s, transform 0.1s;
            letter-spacing: 0.03em;
        }
        .btn:hover { opacity: 0.88; }
        .btn:active { transform: scale(0.98); }
        .btn-outline {
            background: var(--surface);
            color: var(--gold);
            border: 2px solid var(--gold);
        }
        .btn-primary {
            background: var(--gold);
            color: #fff;
        }

       .rekening-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            width: fit-content;   /* ← ini kuncinya, supaya tidak stretch */
            flex-wrap: nowrap;    /* ← jangan wrap */
        }

        .rek-group {
            display: flex;
            gap: 4px;
            flex-shrink: 0;       /* ← jangan menyusut */
        }

        .rek-box {
            width: 38px !important;   /* ← override apapun dari grid */
            height: 38px;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            padding: 0;
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            background: var(--surface);
            color: var(--dark);
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .rek-box:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(200,146,42,0.15);
        }

        .rek-sep {
            color: var(--muted);
            font-size: 20px;
            font-weight: 300;
            line-height: 1;
            flex-shrink: 0;
        }

        .forminput {
            height: 40px;
        }


        /* ─── Responsive ─── */
        @media (max-width: 600px) {
            .field-grid { grid-template-columns: 1fr; }
            .field-grid.cols-3 { grid-template-columns: 1fr; }
            .field.span-2, .field.span-3 { grid-column: span 1; }
            .page-header h2 { font-size: 16px; }
            .section-body { padding: 18px 16px 22px; }
        }
    </style>
</head>
<body>

<div class="form-wrapper mt-5 mb-5">
    <form method="POST" action="{{ route('pembukaanrekening.simpan') }}">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
        @csrf

        {{-- ══════════════════════════════════════════
             SECTION 1 — INFORMASI UMUM
        ══════════════════════════════════════════ --}}
        <div class="section" id="section-1">
            <button type="button" class="section-header open" onclick="toggleSection('section-1')">
                <div class="section-left">
                    <span class="section-num">01</span>
                    <span class="section-title">Informasi Umum</span>
                    <span class="section-badge">Wajib</span>
                </div>
                <span class="chevron">&#8964;</span>
            </button>
            <div class="section-body open">
                <div class="field-grid">
                    <div class="field">
                        <label>Nama Cabang / Kode Cabang <span class="req">*</span></label>
                        <input class="forminput" type="text" name="nama_cabang" placeholder="Mis. Cabang Utama / KCP-001" required>
                    </div>
                    <div class="field">
                        <label>Tanggal <span class="req">*</span></label>
                        <input class="forminput" type="date" name="tanggal" value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="field span-2 mt-3">
                        <label>Jenis Rekening <span class="req">*</span></label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_rekening" value="tunggal" id="radioDefault1">
                                <label class="check-item" for="radioDefault1"> Tunggal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_rekening" value="gabungan_qq" id="radioDefault2">
                                <label class="check-item" for="radioDefault2"> Gabungan "QQ"</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_rekening" value="gabungan_or" id="radioDefault3">
                                <label class="check-item" for="radioDefault3"> Gabungan "OR"</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_rekening" value="gabungan_and" id="radioDefault4"> 
                                <label class="check-item" for="radioDefault4"> Gabungan "AND"</label>
                            </div>  
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_rekening" value="lainnya" id="radioDefault5">
                                <label class="check-item" for="radioDefault5"> Lainnya</label>
                            </div>
                        </div>
                    </div>

                    <div class="field span-2 mt-3">
                        <label>Hubungan Antar Nasabah Rekening</label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan" value="orang_tua_anak" id="radioDefault6">
                                <label class="check-item" for="radioDefault6"> Orang Tua / Anak</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan" value="suami_istri" id="radioDefault7">
                                <label class="check-item" for="radioDefault7"> Suami / Istri</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan" value="penerima_kuasa" id="radioDefault8">
                                <label class="check-item" for="radioDefault8"> Penerima / Pemberi Kuasa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan" value="lainnya" id="radioDefault9">
                                <label class="check-item" for="radioDefault9"> Lainnya</label>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="field span-2">
                        <label>Gabungan</label>
                        <input type="text" name="gabungan" placeholder="Isi bila jenis rekening gabungan">
                    </div> -->

                    <div class="field span-2">
                        <label>Nomor Rekening</label>
                        <div class="rekening-wrapper">
                            <div class="rek-group" id="group-1">
                                <input type="text" class="rek-box" name="rek_a[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_a[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_a[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            </div>
                            <span class="rek-sep">—</span>
                            <div class="rek-group" id="group-2">
                                <input type="text" class="rek-box" name="rek_b[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_b[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_b[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            </div>
                            <span class="rek-sep">—</span>
                            <div class="rek-group" id="group-3">
                                <input type="text" class="rek-box" name="rek_c[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_c[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_c[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_c[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_c[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                                <input type="text" class="rek-box" name="rek_c[]" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            </div>
                        </div>
                    </div>

                    <div class="field span-2 mt-3">
                        <label>Tujuan Pembukaan Rekening <span class="req">*</span></label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" value="investasi" id="radioDefault10">
                                <label class="check-item" for="radioDefault10"> Investasi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" value="bisnis" id="radioDefault11">
                                <label class="check-item" for="radioDefault11"> Bisnis</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" value="lainnya" id="radioDefault12">
                                <label class="check-item" for="radioDefault12"> Lainnya</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
             SECTION 2 — DATA NASABAH
        ══════════════════════════════════════════ --}}
        <div class="section" id="section-2">
            <button type="button" class="section-header" onclick="toggleSection('section-2')">
                <div class="section-left">
                    <span class="section-num">02</span>
                    <span class="section-title">Data Nasabah</span>
                    <span class="section-badge">Wajib</span>
                </div>
                <span class="chevron">&#8964;</span>
            </button>
            <div class="section-body">
                <div class="field cols-12">
                    <div class="field">
                        <label>No. CIF</label>
                        <input class="forminput" type="text" name="no_cif" placeholder="Masukkan nomor CIF">
                        <!-- <span class="hint">Customer Information File</span> -->
                    </div>

                    <div class="subsection-label">Identitas Diri</div>

                    <div class="field span-3">
                        <label>Nama Lengkap <span class="req">*</span></label>
                        <input class="forminput" type="text" name="nama_lengkap" placeholder="Sesuai KTP">
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="field span-3">
                                <label>Alamat Sesuai KTP <span class="req">*</span></label>
                                <input class="forminput" type="text" name="alamat_ktp" placeholder="Jalan, nomor, RT/RW">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field">
                                <label>RT / RW</label>
                                <input class="forminput" type="text" name="rt_rw" placeholder="000 / 000">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="field">
                                <label>Kelurahan</label>
                                <input class="forminput" type="text" name="kelurahan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field">
                                <label>Kecamatan</label>
                                <input class="forminput" type="text" name="kecamatan">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="field">
                                <label>Negara</label>
                                <input class="forminput" type="text" name="negara" value="Indonesia">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="field">
                                <label>Provinsi</label>
                                <input class="forminput" type="text" name="provinsi">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="field">
                                <label>Kode Pos</label>
                                <input class="forminput" type="text" name="kode_pos" maxlength="5" placeholder="00000">
                            </div>
                        </div>
                    </div>

                    <div class="field mt-3">
                        <label>NPWP</label>
                        <input class="forminput" type="text" name="npwp" placeholder="XX.XXX.XXX.X-XXX.XXX">
                    </div>
                        

                    <div class="subsection-label">Rekening di BPR Mekar Nugraha</div>

                    <div class="field span-3">
                        <label>Apakah sudah memiliki rekening di BPR Mekar Nugraha? <span class="req">*</span></label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sudah_rekening" value="ya" id="radioDefault13">
                                <label class="check-item" for="radioDefault13"> Ya, No. Rekening</label>
                                <input class="forminput" class="rek_lama" type="number" name="no_rekening_existing" style="width:180px" placeholder="Nomor rekening lama">
                            </div>
                        </div>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sudah_rekening" value="tidak" id="radioDefault14">
                                <label class="check-item" for="radioDefault14"> Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="field span-3 mt-3">
                        <label>Dalam hal ini bertindak untuk <span class="req">*</span></label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk" value="diri_sendiri" id="radioDefault15">
                                <label class="check-item" for="radioDefault15"> Diri Sendiri</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk" value="wakil" id="radioDefault16">
                                <label class="check-item" for="radioDefault16"> Wakil dari Pihak Lain / Beneficial Owner</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk" value="wali_alamat" id="radioDefault17">
                                <label class="check-item" for="radioDefault17"> Wali Alamat</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk" value="lainnya" id="radioDefault18">
                                <label class="check-item" for="radioDefault18"> Lainnya</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
             SECTION 3 — DATA NASABAH KE-2 (GABUNGAN)
        ══════════════════════════════════════════ --}}
        <div class="section" id="section-3">
            <button type="button" class="section-header" onclick="toggleSection('section-3')">
                <div class="section-left">
                    <span class="section-num">03</span>
                    <span class="section-title">Identitas Pemegang Rekening Ke-2</span>
                    <span class="section-badge">Rekening Gabungan</span>
                </div>
                <span class="chevron">&#8964;</span>
            </button>
            <div class="section-body">
                <!-- <p style="font-size:13px;color:var(--muted);margin-bottom:18px;">Isi bagian ini hanya untuk rekening gabungan (berdua).</p> -->
                <div class="field cols-12">
                    <div class="field">
                        <label>No. CIF</label>
                        <input class="forminput" type="text" name="no_cif_2" placeholder="Diisi petugas bank">
                    </div>

                    <div class="subsection-label">Identitas Diri Pemegang Ke-2</div>

                    <div class="field span-3">
                        <label>Nama Lengkap</label>
                        <input class="forminput" type="text" name="nama_lengkap_2" placeholder="Sesuai KTP">
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="field span-3">
                                <label>Alamat Sesuai KTP</label>
                                <input class="forminput" type="text" name="alamat_ktp_2" placeholder="Jalan, nomor, RT/RW">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field">
                                <label>RT / RW</label>
                                <input class="forminput" type="text" name="rt_rw_2" placeholder="000 / 000">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="field">
                                <label>Kelurahan</label>
                                <input class="forminput" type="text" name="kelurahan_2">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field">
                                <label>Kecamatan</label>
                                <input class="forminput" type="text" name="kecamatan_2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="field">
                                <label>Negara</label>
                                <input class="forminput" type="text" name="negara_2" value="Indonesia">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="field">
                                <label>Provinsi</label>
                                <input class="forminput" type="text" name="provinsi_2">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="field">
                                <label>Kode Pos</label>
                                <input class="forminput" type="text" name="kode_pos_2" maxlength="5" placeholder="00000">
                            </div>
                        </div>
                    </div>

                    <div class="field mt-3">
                        <label>NPWP</label>
                        <input class="forminput" type="text" name="npwp_2" placeholder="XX.XXX.XXX.X-XXX.XXX">
                    </div>

                    <div class="field span-3 mt-3">
                        <label>Apakah sudah memiliki rekening di BPR Mekar Nugraha?</label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sudah_rekening_2" value="ya" id="radioDefault19">
                                <label class="check-item" for="radioDefault19"> Ya, No. Rekening</label>
                                <input class="forminput" type="text" name="no_rekening_existing_2" style="width:180px" placeholder="Nomor rekening lama">
                            </div>
                        </div>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sudah_rekening_2" value="tidak" id="radioDefault20">
                                <label class="check-item" for="radioDefault20"> Tidak</label>  
                            </div>
                        </div>
                    </div>

                    <div class="field span-3 mt-3">
                        <label>Dalam hal ini bertindak untuk</label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk_2" value="diri_sendiri" id="radioDefault21">
                                <label class="check-item" for="radioDefault21"> Diri Sendiri</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk_2" value="wakil" id="radioDefault22">
                                <label class="check-item" for="radioDefault22"> Wakil dari Pihak Lain / Beneficial Owner</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk_2" value="wali_alamat" id="radioDefault23">
                                <label class="check-item" for="radioDefault23"> Wali Alamat</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bertindak_untuk_2" value="lainnya" id="radioDefault24">
                                <label class="check-item" for="radioDefault24"> Lainnya</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
             SECTION 4 — DATA REKENING TABUNGAN
        ══════════════════════════════════════════ --}}
        <div class="section" id="section-4">
            <button type="button" class="section-header" onclick="toggleSection('section-4')">
                <div class="section-left">
                    <span class="section-num">04</span>
                    <span class="section-title">Data Rekening Tabungan</span>
                    <span class="section-badge">Tabungan</span>
                </div>
                <span class="chevron">&#8964;</span>
            </button>
            <div class="section-body">
                <div class="field-grid cols-1">
                    <div class="field">
                        <label>Jenis Tabungan <span class="req">*</span></label>
                        <div class="check-group">
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="mekar" id="radioDefault25">
                                    <label class="check-item" for="radioDefault25"> Tabungan Mekar</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="taraku" id="radioDefault26">
                                    <label class="check-item" for="radioDefault26"> Tabungan TARAKu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="nugraha" id="radioDefault27">
                                    <label class="check-item" for="radioDefault27"> Tabungan Nugraha</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="rejeki" id="radioDefault28">
                                    <label class="check-item" for="radioDefault28"> Tabungan Rejeki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="kurban" id="radioDefault29">
                                    <label class="check-item" for="radioDefault29"> Tabungan Kurban</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="cinta_fitri" id="radioDefault30">
                                    <label class="check-item" for="radioDefault30"> Tabungan Cinta Fitri</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="pendidikan" id="radioDefault31">
                                    <label class="check-item" for="radioDefault31"> Tabungan Pendidikan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="simpel" id="radioDefault32">
                                    <label class="check-item" for="radioDefault32"> Tabungan Simpel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="bungah" id="radioDefault33">
                                    <label class="check-item" for="radioDefault33"> Tabungan Bungah</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_tabungan" value="mekar_premio" id="radioDefault34">
                                    <label class="check-item" for="radioDefault34"> Tabungan Mekar Premio</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
             SECTION 5 — DATA REKENING DEPOSITO
        ══════════════════════════════════════════ --}}
        <div class="section" id="section-5">
            <button type="button" class="section-header" onclick="toggleSection('section-5')">
                <div class="section-left">
                    <span class="section-num">05</span>
                    <span class="section-title">Data Rekening Deposito</span>
                    <span class="section-badge">Deposito</span>
                </div>
                <span class="chevron">&#8964;</span>
            </button>
            <div class="section-body">
                <div class="field cols-12">
                    <div class="field">
                        <label>Nominal Deposito (Rp) <span class="req">*</span></label>
                        <input class="forminput" type="number" name="nominal_deposito" placeholder="0" min="0">
                    </div>
                    <div class="field mt-3">
                        <label>Terbilang</label>
                        <input class="forminput" type="text" name="terbilang" placeholder="Otomatis / isi manual">
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="field">
                                <label>Jangka Waktu (Bulan) <span class="req">*</span></label>
                                <input class="forminput" type="number" name="jangka_waktu" placeholder="Mis. 12" min="1">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field">
                                <label>Suku Bunga (% per Tahun)</label>
                                <input class="forminput" type="number" name="suku_bunga" step="0.01" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="field mt-3">
                        <label>Perpanjangan</label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="perpanjangan" value="otomatis" id="radioDefault35">
                                <label class="check-item" for="radioDefault35"> Otomatis</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="perpanjangan" value="non_otomatis" id="radioDefault36">
                                <label class="check-item" for="radioDefault36"> Non Otomatis</label>
                            </div>
                        </div>
                    </div>

                    <div class="field mt-3">
                        <label>Pembayaran Bunga</label>
                        <div class="check-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pembayaran_bunga" value="tunai" id="radioDefault37">
                                <label class="check-item" for="radioDefault37"> Tunai</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pembayaran_bunga" value="transfer" id="radioDefault38">
                                <label class="check-item" for="radioDefault38"> Transfer ke Rekening</label>
                            </div>
                        </div>
                    </div>

                    <div class="field mt-3">
                        <label>Atas Nama</label>
                        <input class="forminput" type="text" name="atas_nama">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="field">
                                <label>No. Rekening Tujuan</label>
                                <input class="forminput" type="number" name="no_rek_tujuan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field">
                                <label>Nama Bank Tujuan</label>
                                <input class="forminput" type="text" name="nama_bank">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
             SECTION 6 — FASILITAS AUTO DEBET
        ══════════════════════════════════════════ --}}
        <div class="section" id="section-6">
            <button type="button" class="section-header" onclick="toggleSection('section-6')">
                <div class="section-left">
                    <span class="section-num">06</span>
                    <span class="section-title">Fasilitas Auto Debet</span>
                    <span class="section-badge">Opsional</span>
                </div>
                <span class="chevron">&#8964;</span>
            </button>
            <div class="section-body">
                <p style="font-size:13px;color:var(--mid);margin-bottom:18px;line-height:1.6;">
                    Saya selaku pemegang rekening, memberi kuasa kepada BPR Mekar Nugraha untuk mendebet rekening tersebut di atas, guna pembayaran:
                </p>
                <div class="field-grid">
                    <div class="field">
                        <label>Angsuran Kredit</label>
                        <input class="forminput" type="text" name="angsuran_kredit" placeholder="Nomor / keterangan kredit">
                    </div>
                    <div class="field">
                        <label>Lainnya</label>
                        <input class="forminput" type="text" name="auto_debet_lainnya" placeholder="Keterangan lain">
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit buttons ─── --}}
        <div class="form-footer">
            <button type="reset" class="btn btn-outline">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Formulir</button>
        </div>
    </form>

</div>

<script>
    function toggleSection(id) {
        const section = document.getElementById(id);
        const header  = section.querySelector('.section-header');
        const body    = section.querySelector('.section-body');

        const isOpen = body.classList.contains('open');

        body.classList.toggle('open', !isOpen);
        header.classList.toggle('open', !isOpen);
    }

    // Auto-format NPWP while typing
    document.querySelectorAll('input[name="npwp"], input[name="npwp_2"]').forEach(el => {
        el.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 15);
            let out = '';
            if (v.length > 0)  out  = v.slice(0, 2);
            if (v.length > 2)  out += '.' + v.slice(2, 5);
            if (v.length > 5)  out += '.' + v.slice(5, 8);
            if (v.length > 8)  out += '.' + v.slice(8, 9);
            if (v.length > 9)  out += '-' + v.slice(9, 12);
            if (v.length > 12) out += '.' + v.slice(12, 15);
            this.value = out;
        });
    });

    // Auto-jump & backspace untuk kotak rekening
    const rekBoxes = Array.from(document.querySelectorAll('.rek-box'));
    rekBoxes.forEach((box, i) => {
        box.addEventListener('input', () => {
            // hanya terima angka
            box.value = box.value.replace(/\D/g, '');
            if (box.value && rekBoxes[i + 1]) rekBoxes[i + 1].focus();
        });
        box.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !box.value && rekBoxes[i - 1]) {
                rekBoxes[i - 1].focus();
            }
        });
        box.addEventListener('paste', (e) => {
            e.preventDefault();
            const digits = (e.clipboardData.getData('text') || '').replace(/\D/g, '');
            digits.split('').forEach((d, j) => {
                if (rekBoxes[i + j]) rekBoxes[i + j].value = d;
            });
            const next = rekBoxes[i + digits.length];
            if (next) next.focus();
        });
    });

    // Reset button — clear semua input
document.querySelector('button[type="reset"]').addEventListener('click', function () {
    // Clear semua input text, number, date, textarea
    document.querySelectorAll('input[type="text"], input[type="number"], input[type="date"], textarea').forEach(el => {
        el.value = '';
    });

    // Uncheck semua radio & checkbox
    document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(el => {
        el.checked = false;
    });

    // Reset semua select ke opsi pertama
    document.querySelectorAll('select').forEach(el => {
        el.selectedIndex = 0;
    });

    // Reset tanggal ke hari ini (karena di blade pakai value="{{ date('Y-m-d') }}")
    const tgl = document.querySelector('input[name="tanggal"]');
    if (tgl) tgl.value = new Date().toISOString().split('T')[0];

    // Reset field negara ke "Indonesia" (karena ada default value)
    document.querySelectorAll('input[name="negara"], input[name="negara_2"]').forEach(el => {
        el.value = 'Indonesia';
    });
});
</script>

</body>

@endsection

