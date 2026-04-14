@extends('frontend.bprsahabattata.layout.main')

@section('content')
    <style>
        /* RESPONSIVE GLOBAL */
        @media (max-width: 768px) {
            .job-wrapper {
                padding: 10px;
            }

            .job-header-title {
                font-size: 20px !important;
            }

            .job-banner img {
                height: 220px !important;
            }

            .job-info-row {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 10px !important;
            }

            .job-columns {
                flex-direction: column !important;
            }

            .img-wrap img {
                width: 100%;
                height: 100%;
                object-fit: fill;
            }

        }

        .event-content {
            max-width: 100%;
            overflow-x: auto;
            word-wrap: break-word;
            line-height: 1.6;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
        }


        .event-content * {
            all: revert;
        }
    </style>
        <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Form Pengajuan Tabungan
            </h4>
        </div>
    </div>

    <div class="job-wrapper" style="max-width:1150px;margin:0px auto 40px;font-family:'Open Sans',sans-serif;color:#333;">

        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;">
            <a href="javascript:history.back()" style="text-decoration:none;color:#1578f1;">
                <i class="bi bi-arrow-left" style="font-size:26px;font-weight:bold;"></i>
            </a>
         
        </div>

        <div class="img-wrap" style="width:100%;border-radius:6px;overflow:hidden;margin-bottom:20px;">
            <img src="{{ asset('frontend/bprtanadoang/img/produk/tabungan/tabungan.png') }}"
                style="width:100%; object-fit:fill; border-radius:6px;">
        </div>

        {{-- @if (session('success'))
            <div
                style="background:#d4edda; color:#155724; padding:14px 18px; border-radius:10px;
                margin-bottom:18px; font-weight:600; box-shadow:0 4px 10px rgba(0,0,0,.08);">
                ✅ {{ session('success') }}
            </div>
        @endif --}}
        <form action="/simpan-data-pengajuan" method="POST">
            @csrf
            <input type="hidden" name="jenis_pengajuan" value="tabungan">
            <div style="background:#fff;border-radius:10px;padding:30px;box-shadow:0 8px 20px rgba(0,0,0,.08);">

                <h5 style="font-weight:700;color:#1578f1;margin-bottom:20px;">Data Nasabah</h5>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Nama Lengkap <span style="color:red">*</label>
                        <input type="text" id="nm_lengkap" name="nm_lengkap"
                            style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;" required>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">No. KTP <span style="color:red">*</label>
                        <input type="text" name="no_ktp" maxlength="16" inputmode="numeric" pattern="[0-9]{16}"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)"
                            style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;" required>
                    </div>


                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">No. Handphone <span style="color:red">*</label>
                        <input type="text" name="no_hp" maxlength="15" inputmode="numeric" required
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15)"
                            style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;">
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Email <span style="color:red">*</label>
                        <input type="email" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                            style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;" required>
                    </div>


                    <div class="col-lg-12 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Alamat Lengkap <span style="color:red">*</label>
                        <textarea rows="3" id="alamat" name="alamat"
                            style="width:100%;border-radius:20px;padding:12px 18px;border:1px solid #ccc;" required></textarea>
                    </div>
                </div>

                <h5 style="font-weight:700;color:#1578f1;margin:25px 0 15px;">Data Pengajuan Tabungan </h5>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Jenis Tabungan <span style="color:red">*</label>
                        <select style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;"
                            id="jns_tab" name="jns_tab" required>
                            <option>-- Pilih Jenis Tabungan --</option>
                            @foreach ($produktabungan as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Setoran Awal <span style="color:red">*</label>
                        <div style="position:relative;">
                            <span
                                style="position:absolute;left:15px;top:50%;transform:translateY(-50%);font-weight:600;color:#555;">Rp</span>

                            <input type="text" name="setor_awal" inputmode="numeric"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                                style="width:100%;border-radius:30px;padding:12px 18px 12px 45px;border:1px solid #ccc;"
                                required>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Sumber Dana <span style="color:red">*</label>
                        <input type="text" id="sumber_dn" name="sumber_dn"
                            style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;" required>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Tujuan Pembukaan Rekening</label>
                        <input type="text" id="tujuan_bk_rek" name="tujuan_bk_rek"
                            style="width:100%;border-radius:30px;padding:12px 18px;border:1px solid #ccc;">
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label style="font-weight:600;margin-bottom:5px;">Catatan Tambahan</label>
                        <textarea rows="3" id="cat_tmbhn" name="cat_tmbhn"
                            style="width:100%;border-radius:20px;padding:12px 18px;border:1px solid #ccc;"></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6 mb-2">
                        <a href="javascript:history.back()"
                            style="display:block;width:100%;padding:10px;text-align:center;border:2px solid #b02a37;border-radius:30px;color:#b02a37;font-weight:600;text-decoration:none;">Batal</a>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <button type="submit"
                            style="width:100%;padding:12px;background:#1578f1;border:none;border-radius:30px;color:#fff;font-weight:600;">Kirim</button>
                    </div>
                </div>

            </div>
        </form>
        @if (session('success'))
            <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"
                        style=" border-radius:18px; padding:30px; border:none; box-shadow:0 15px 40px rgba(0,0,0,.15); ">
                        <div class="text-center">
                            <div
                                style=" width:90px; height:90px; background:#e8f5e9; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; ">
                                <i class="bi bi-check-lg" style="font-size:48px;color:#2e7d32;"></i>
                            </div>

                            <h4 style="font-weight:700;color:#2e7d32;margin-bottom:10px;">
                                Pengajuan Berhasil
                            </h4>

                            <p style="color:#555;font-size:15px;line-height:1.6;margin-bottom:25px;">
                                Terima kasih 🙏
                                <br>
                                Data pengajuan kredit Anda telah berhasil dikirim dan
                                akan segera kami proses.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modalEl = document.getElementById('successModal');
                const modal = new bootstrap.Modal(modalEl);


                modal.show();


                setTimeout(() => {
                    modal.hide();
                }, 5000);

                modalEl.addEventListener('hidden.bs.modal', function() {
                    window.location.href = "/";
                });
            });
        </script>
    @endif
@endsection
