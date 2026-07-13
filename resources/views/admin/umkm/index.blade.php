@extends('layouts.admin')
@section('content')
<style></style>
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        UMKM
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                {{-- BEGIN: DATACARD --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 intro-y">
                        <div class="report-box">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="image" class="report-box__icon text-primary"></i>
                                    <div class="ml-auto">
                                        <button class="btn btn-sm btn-primary" type="button"
                                            onclick="openinputmodal(null)">
                                            <i data-lucide="plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-2">
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/profile" method="get">
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
                                    <div class="col-span-12">
                                        <table id="datatabledefault">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Lokasi Maps</th>
                                                    <th>No.WA</th>
                                                    <th>Discount</th>
                                                    <th>Layanan</th>
                                                    <th>Thumbnail</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($umkm as $k => $v)
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>{{ $v->lokasi }}</td>
                                                    <td>{{ $v->no_telp }}</td>
                                                    <td>{{ $v->nilai_discount }}</td>
                                                    <td>
                                                        @if ($v->layanan)
                                                        @foreach (json_decode($v->layanan) as $t)
                                                        <span
                                                            class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium mr-1">
                                                            {{ $t }}
                                                        </span>
                                                        @endforeach
                                                        @endif
                                                    </td>



                                                    <td>
                                                        {{-- <a class="btn btn-secondary btn-sm"
                                                            href="/recfil?display=true&rf={{ urlencode($v->gambar) }}"
                                                            target="_blank">
                                                            <i data-lucide="monitor"></i>
                                                        </a> --}}
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="/recfil?display=true&rf={{ urlencode($v->thumbnail) }}"
                                                            target="_blank">
                                                            {{-- <i data-lucide="smartphone"></i> --}}
                                                            <i data-lucide="monitor"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button onclick='openinputmodal(@json($v))' type="button"
                                                            class="btn btn-sm btn-warning">
                                                            <i data-lucide="edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/data-umkm/{{ $v->id }}')">
                                                            <i data-lucide="trash"></i>
                                                        </button>
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
                {{-- END: DATACARD --}}
            </div>
            <!-- END: BANNER -->
        </div>
    </div>
</div>

<!-- BEGIN: Modal Input -->
<div id="modalInputBanner" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="/salamprofit/data-umkm" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">UMKM</h2>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input type="text" name="id" id="hdnId" hidden>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtTitle" class="form-label">Judul</label>
                        <input id="txtTitle" name="title" type="text" class="form-control">
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtLokasi" class="form-label">Lokasi Maps</label>
                        <input id="txtLokasi" name="lokasi" type="text" class="form-control"
                            value="{{ old('lokasi') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtNotelp" class="form-label">No WA</label>
                        <input id="txtNotelp" name="no_telp" type="number" class="form-control"
                            value="{{ old('no_telp') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtAlamat" class="form-label">Alamat</label>
                        <textarea id="txtAlamat" name="alamat" type="text"
                            class="form-control">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label class="form-label"> Discount</label>
                        <input id="discountValue" name="nilai_discount" type="text" class="form-control" min="0"
                            step="0.01">
                    </div>

                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtNotelp" class="form-label">Rating ⭐</label>
                        <input id="txtRating" name="rating" type="text" class="form-control"
                            value="{{ old('no_telp') }}">
                    </div>


                    <div class="col-span-12 sm:col-span-6">
                        <label class="form-label">Layanan</label>

                        <div class="grid grid-cols-3 gap-3">

                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="layanan[]" value="Shopeefood" class="form-check-input">
                                <span class="ml-2">Shopeefood</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="layanan[]" value="Grab" class="form-check-input">
                                <span class="ml-2">Grab</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="layanan[]" value="Gojek" class="form-check-input">
                                <span class="ml-2">Gojek</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="layanan[]" value="Maxim" class="form-check-input">
                                <span class="ml-2">Maxim</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="layanan[]" value="Lainnya" class="form-check-input">
                                <span class="ml-2">Lainnya</span>
                            </label>

                        </div>
                    </div>


                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtType" class="form-label">Pilihan Terbaik</label>
                        <select id="txtType" name="type_pilihan" class="form-control">
                            <option value="">Pilih</option>
                            <option value="0">Rekomendasi</option>
                            <option value="1">Terlaris</option>
                            <option value="2">Top Rating</option>

                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="jam_buka" class="form-label">Jam Buka</label>
                        <input id="jam_buka" name="jam_buka" type="time" class="form-control"
                            value="{{ old('jam_buka') }}">
                    </div>

                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="jam_tutup" class="form-label">Jam Tutup</label>
                        <input id="jam_tutup" name="jam_tutup" type="time" class="form-control"
                            value="{{ old('jam_tutup') }}">
                    </div>


                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtwebsite" class="form-label">Website</label>
                        <input id="txtwebsite" name="website" type="text" class="form-control"
                            value="{{ old('website') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label class="form-label">Sosial Media</label>
                        <button type="button" onclick="tambahSosmed()"
                            class="mt-2 ml-2 px-3 py-1 bg-primary text-white rounded">
                            +
                        </button>

                        <div id="sosmed-container">

                            <!-- Row pertama -->
                            <div class="grid grid-cols-12 gap-2 sosmed-row mb-2">

                                <!-- Icon -->
                                <div class="col-span-3">
                                    <input type="file" name="sosmed_icon[]" class="form-control" accept="image/*">
                                </div>

                                <!-- Nama -->
                                <div class="col-span-4">
                                    <input type="text" name="sosmed_nama[]" class="form-control"
                                        placeholder="Nama (ex: Instagram)">
                                </div>

                                <!-- Link -->
                                <div class="col-span-4">
                                    <input type="url" name="sosmed_link[]" class="form-control"
                                        placeholder="https://instagram.com/username">
                                </div>

                                <!-- Tombol hapus -->
                                <div class="col-span-1 flex items-center">
                                    <button type="button" onclick="hapusSosmed(this)" class="text-red-500 font-bold">
                                        ×
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="fileThumbnail" class="form-label">Thumbnail</label>
                        <input id="fileThumbnail" accept="image/*" type="file" name="thumbnail" class="form-control"
                            dat-showpreview="true">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="fileGambar" class="form-label">Gambar (maks 5 file)</label>
                        <input id="fileGambar" accept="image/*" type="file" name="gambar[]" class="form-control"
                            multiple>
                        <div id="fileList" style="margin-top: 10px;"></div>
                    </div>

                    <div class="col-span-12">
                        <hr>
                    </div>
                    <div class="col-span-12 mb-8">
                        <div id="quilldefaulteditor"></div>
                    </div>
                    <textarea name="deskripsi" id="deskripsi" hidden></textarea>

                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <span data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</span>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>
<!-- END: Modal Input -->

<script>
    var inputmodal;
        const fileInput = document.getElementById('fileGambar');
        const fileList = document.getElementById('fileList');
        let allFiles = new DataTransfer();
        let oldImages = [];
        let deletedOldImages = [];

        $(document).ready(function() {

            inputmodal = tailwind.Modal.getOrCreateInstance(
                document.querySelector("#modalInputBanner")
            );

            // ===== QUILL AUTO SAVE =====
            $('#quilldefaulteditor').on('blur keyup paste input', function() {
                $('#deskripsi').val($('.ql-editor').html());
            });

            $('form').on('submit', function() {
                $('#deskripsi').val($('.ql-editor').html());
            });

            // ===== FILE INPUT LIMIT 5 =====
            fileInput.addEventListener('change', function(e) {

                for (let file of e.target.files) {

                    // Maksimal 5 gambar, dihitung dari gambar lama + gambar baru
                    if ((oldImages.length + allFiles.files.length) >= 5) break;

                    allFiles.items.add(file);
                }

                fileInput.files = allFiles.files;

                renderFileList();
            });

        });

        // ===============================
        // ESCAPE VALUE UNTUK INPUT HIDDEN
        // ===============================
        function escapeHtml(value) {
            return String(value ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        // ===============================
        // RENDER FILE LIST
        // ===============================
        function renderFileList() {

            fileList.innerHTML = '';

            // ===== TAMPILKAN GAMBAR LAMA =====
            oldImages.forEach((g, index) => {

                const oldItem = document.createElement('div');

                oldItem.style.position = 'relative';
                oldItem.style.width = '100px';
                oldItem.style.height = '100px';
                oldItem.style.display = 'inline-block';
                oldItem.style.marginRight = '8px';
                oldItem.style.marginTop = '8px';
                oldItem.className = 'old-image-box';

                oldItem.innerHTML = `
                    <img src="/recfil?rf=${encodeURIComponent(g)}"
                        style="
                            width:100%;
                            height:100%;
                            object-fit:cover;
                            border:1px solid #ddd;
                            border-radius:6px;
                        ">

                    <button type="button"
                        onclick="hapusGambarLama(this, ${index})"
                        style="
                            position:absolute;
                            top:-6px;
                            right:-6px;
                            background:red;
                            color:white;
                            border:none;
                            width:20px;
                            height:20px;
                            border-radius:50%;
                            cursor:pointer;
                            font-size:12px;
                        ">
                        ×
                    </button>

                    <input type="hidden" name="gambar_lama[]" value="${escapeHtml(g)}">
                `;

                fileList.appendChild(oldItem);
            });

            // ===== TAMPILKAN FILE BARU =====
            Array.from(allFiles.files).forEach((file, i) => {

                const item = document.createElement('div');

                item.style.display = 'flex';
                item.style.alignItems = 'center';
                item.style.justifyContent = 'space-between';
                item.style.padding = '6px 10px';
                item.style.marginTop = '8px';
                item.style.marginBottom = '4px';
                item.style.border = '1px solid #eee';
                item.style.borderRadius = '6px';
                item.style.background = '#fafafa';

                item.innerHTML = `
                    <span style="font-size:13px;">
                        ${i + 1}. ${escapeHtml(file.name)}
                    </span>

                    <button type="button"
                        onclick="hapusFileBaru(${i})"
                        style="
                            background:red;
                            color:white;
                            border:none;
                            border-radius:4px;
                            padding:2px 8px;
                            cursor:pointer;
                            font-size:12px;
                        ">
                        Hapus
                    </button>
                `;

                fileList.appendChild(item);
            });

            // Tetap kirim daftar gambar lama yang telah dihapus ke backend
            deletedOldImages.forEach((path) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'gambar_hapus[]';
                input.value = path;
                fileList.appendChild(input);
            });

            if ((oldImages.length + allFiles.files.length) >= 5) {

                const warning = document.createElement('div');

                warning.style.color = 'red';
                warning.style.fontSize = '12px';
                warning.style.marginTop = '5px';

                warning.textContent = 'Maksimal 5 file.';

                fileList.appendChild(warning);
            }
        }

        // ===============================
        // HAPUS FILE BARU
        // ===============================
        function hapusFileBaru(index) {

            const newDataTransfer = new DataTransfer();

            Array.from(allFiles.files).forEach((file, i) => {
                if (i !== index) {
                    newDataTransfer.items.add(file);
                }
            });

            allFiles = newDataTransfer;
            fileInput.files = allFiles.files;

            renderFileList();
        }

        // ===============================
        // HAPUS GAMBAR LAMA
        // ===============================
        function hapusGambarLama(button, index) {

            const path = oldImages[index];

            if (typeof path === 'undefined') return;

            oldImages.splice(index, 1);

            if (!deletedOldImages.includes(path)) {
                deletedOldImages.push(path);
            }

            renderFileList();
        }

        // ===============================
        // OPEN MODAL (CREATE + EDIT)
        // ===============================
        function openinputmodal(t = null) {

            inputmodal.show();

            let container = document.getElementById('sosmed-container');
            container.innerHTML = '';

            // ===== RESET FORM =====
            $('#hdnId').val('');
            $('#txtTitle').val('');
            $('#txtLokasi').val('');
            $('#txtNotelp').val('');
            $('#txtAlamat').val('');
            $('#txtType').val('');
            $('#discountValue').val('');
            $('#txtRating').val('');
            $('#jam_buka').val('');
            $('#jam_tutup').val('');
            $('#txtwebsite').val('');
            $('#fileGambar').val('');
            $('#fileThumbnail').val('');
            $('#fileList').html('');

            allFiles = new DataTransfer();
            oldImages = [];
            deletedOldImages = [];
            fileInput.files = allFiles.files;
            renderFileList();

            $('input[name="layanan[]"]').prop('checked', false);

            quilldefaulteditor.root.innerHTML = '';
            $('#deskripsi').val('');

            $('.preview-gambar').remove();
            $('.preview-thumbnail').remove();

            // ===== JIKA CREATE MODE =====
            if (!t) {
                tambahSosmed();
                return;
            }

            // ===============================
            // SET DATA EDIT
            // ===============================
            $('#hdnId').val(t.id ?? '');
            $('#txtTitle').val(t.title ?? '');
            $('#txtLokasi').val(t.lokasi ?? '');
            $('#txtNotelp').val(t.no_telp ?? '');
            $('#txtAlamat').val(t.alamat ?? '');
            $('#txtType').val(t.type_pilihan ?? '');
            $('#discountValue').val(t.nilai_discount ?? '');
            $('#txtRating').val(t.rating ?? '');
            $('#jam_buka').val(t.jam_buka ?? '');
            $('#jam_tutup').val(t.jam_tutup ?? '');
            $('#txtwebsite').val(t.website ?? '');

            // ===== LAYANAN =====
            if (t.layanan) {

                let layanan = [];

                if (typeof t.layanan === 'string') {
                    try {
                        layanan = JSON.parse(t.layanan);
                    } catch (e) {
                        layanan = [];
                    }
                } else {
                    layanan = t.layanan;
                }

                layanan.forEach(function(val) {
                    $('input[name="layanan[]"][value="' + val + '"]')
                        .prop('checked', true);
                });
            }

            // ===== DESKRIPSI =====
            if (t.deskripsi) {
                quilldefaulteditor.root.innerHTML = t.deskripsi;
                $('#deskripsi').val(t.deskripsi);
            }

            // =========================
            // LOAD SOSMED DARI JSON
            // =========================
            if (t.sosmed) {

                let sosmed = [];

                if (typeof t.sosmed === 'string') {
                    try {
                        sosmed = JSON.parse(t.sosmed);
                    } catch (e) {
                        sosmed = [];
                    }
                } else {
                    sosmed = t.sosmed;
                }

                if (sosmed.length > 0) {

                    sosmed.forEach(function(s, index) {

                        let html = `
                <div class="grid grid-cols-12 gap-2 sosmed-row mb-2">

                    <!-- ICON -->
                    <div class="col-span-3">

                        ${s.icon ? `
                                            <img src="/recfil?rf=${encodeURIComponent(s.icon)}"
                                                style="width:40px;height:40px;object-fit:cover;margin-bottom:5px;">
                                        ` : ''}

                        <input type="file" name="sosmed_icon[]" class="form-control" accept="image/*">

                        <input type="hidden" name="sosmed_icon_lama[]" value="${s.icon ?? ''}">
                    </div>

                    <!-- NAMA -->
                    <div class="col-span-4">
                        <input type="text"
                            name="sosmed_nama[]"
                            class="form-control"
                            value="${s.nama ?? ''}">
                    </div>

                    <!-- LINK -->
                    <div class="col-span-4">
                        <input type="url"
                            name="sosmed_link[]"
                            class="form-control"
                            value="${s.link ?? ''}">
                    </div>

                    <!-- HAPUS -->
                    <div class="col-span-1 flex items-center">
                        <button type="button"
                            onclick="hapusSosmed(this)"
                            class="text-red-500 font-bold">
                            ×
                        </button>
                    </div>

                </div>
                `;

                        container.insertAdjacentHTML('beforeend', html);

                    });

                } else {

                    tambahSosmed();

                }

            } else {

                tambahSosmed();

            }

            // ===== PREVIEW GAMBAR =====
            if (t.gambar) {

                let gambars = [];

                if (typeof t.gambar === 'string') {
                    try {
                        gambars = JSON.parse(t.gambar);
                    } catch (e) {
                        gambars = [];
                    }
                } else {
                    gambars = t.gambar;
                }

                oldImages = Array.isArray(gambars) ? gambars : [];
                renderFileList();
            }

            // ===== PREVIEW THUMBNAIL =====
            if (t.thumbnail) {

                $('#fileThumbnail').parent().append(`
                <img src="/recfil?rf=${encodeURIComponent(t.thumbnail)}"
                    class="preview-thumbnail mt-2"
                    style="width:120px;height:120px;object-fit:cover;">
            `);
            }
        }
</script>

<script>
    const discountType = document.getElementById('discountType');

        if (discountType) {
            discountType.addEventListener('change', function() {
                const valueInput = document.getElementById('discountValue');
                if (this.value === 'free_shipping') {
                    valueInput.style.display = 'none';
                } else {
                    valueInput.style.display = 'block';
                }
            });
        }
</script>
<script>
    function tambahSosmed() {

            let container = document.getElementById('sosmed-container');

            let html = `
                <div class="grid grid-cols-12 gap-2 sosmed-row mb-2">

                    <div class="col-span-3">
                        <input type="file" name="sosmed_icon[]" class="form-control" accept="image/*">
                    </div>

                    <div class="col-span-4">
                        <input type="text" name="sosmed_nama[]" class="form-control"
                            placeholder="Nama (ex: Instagram)">
                    </div>

                    <div class="col-span-4">
                        <input type="url" name="sosmed_link[]" class="form-control"
                            placeholder="Link Sosmed">
                    </div>

                    <div class="col-span-1 flex items-center">
                        <button type="button" onclick="hapusSosmed(this)" class="text-red-500 font-bold">
                            ×
                        </button>
                    </div>

                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }

        function hapusSosmed(button) {
            button.closest('.sosmed-row').remove();
        }
</script>
@endsection