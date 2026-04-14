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
                                                        <th>No.Telp</th>
                                                        <th>Discount</th>
                                                        <th>Layanan</th>
                                                        <th>Gambar | Thumbnail</th>
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
                                                                <a class="btn btn-secondary btn-sm"
                                                                    href="/recfil?display=true&rf={{ urlencode($v->gambar) }}"
                                                                    target="_blank">
                                                                    <i data-lucide="monitor"></i>
                                                                </a>
                                                                <a class="btn btn-secondary btn-sm"
                                                                    href="/recfil?display=true&rf={{ urlencode($v->thumbnail) }}"
                                                                    target="_blank">
                                                                    <i data-lucide="smartphone"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button
                                                                    onclick='openinputmodal(@json($v))'
                                                                    type="button" class="btn btn-sm btn-warning">
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
                            <label for="txtNotelp" class="form-label">No Telepon</label>
                            <input id="txtNotelp" name="no_telp" type="number" class="form-control"
                                value="{{ old('no_telp') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-6 input-form">
                            <label for="txtAlamat" class="form-label">Alamat</label>
                            <textarea id="txtAlamat" name="alamat" type="text" class="form-control">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label"> Discount</label>
                            <input id="discountValue" name="nilai_discount" type="text" class="form-control"
                                min="0" step="0.01">
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
                            <label for="txtWebsite" class="form-label">Website</label>
                            <input id="txtWebsite" name="website" type="text" class="form-control"
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
                                        <input type="file" name="sosmed_icon[]" class="form-control"
                                            accept="image/*">
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
                                        <button type="button" onclick="hapusSosmed(this)"
                                            class="text-red-500 font-bold">
                                            ×
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- ... bagian thumbnail tetap seperti biasa ... -->
                        <div class="col-span-12 sm:col-span-6">
                            <label for="fileThumbnail" class="form-label">Thumbnail</label>
                            <input id="fileThumbnail" accept="image/*" type="file" name="thumbnail"
                                class="form-control">
                            <div id="thumbnail-preview-container" class="mt-2"></div>
                        </div>
                        <!-- ... di dalam modal body ... -->
                        <div class="col-span-12 sm:col-span-6">
                            <label for="fileGambar" class="form-label">Gambar (maks 5 file)</label>
                            <input type="hidden" name="removed_images" id="removedImages" value="">
                            <input id="fileGambar" accept="image/*" type="file" name="gambar[]" class="form-control"
                                multiple>

                            <!-- Daftar file BARU yang dipilih -->
                            <div id="fileList" style="margin-top: 10px;"></div>

                            <!-- Container untuk gambar LAMA yang sudah ada -->
                            <div id="existing-images-container" class="flex gap-2 mt-2 overflow-x-auto"></div>
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
        let quilldefaulteditor; // Asumsi ini sudah ada di script lain

        $(document).ready(function() {
            inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputBanner"));

            // Inisialisasi Quill Editor (pastikan ini ada dan sesuai)
            quilldefaulteditor = new Quill('#quilldefaulteditor', {
                theme: 'snow'
            });

            // Auto-save deskripsi ke textarea
            quilldefaulteditor.on('text-change', function() {
                $('#deskripsi').val(quilldefaulteditor.root.innerHTML);
            });

            // Event listener untuk file input
            fileInput.addEventListener('change', function(e) {
                for (let file of e.target.files) {
                    if (allFiles.files.length >= 5) break;
                    allFiles.items.add(file);
                }
                fileInput.files = allFiles.files;
                renderFileList();
            });
        });

        // ===============================
        // FUNGSI UNTUK MENAMPILKAN DAFTAR FILE SECARA HORIZONTAL
        // ===============================
        function renderFileList() {
            fileList.innerHTML = '';
            fileList.style.display = 'flex';
            fileList.style.flexWrap = 'wrap';
            fileList.style.gap = '8px';

            Array.from(allFiles.files).forEach((file) => {
                const item = document.createElement('div');
                item.className = 'bg-gray-100 px-3 py-1 rounded-full text-xs text-gray-700';
                item.textContent = file.name;
                fileList.appendChild(item);
            });

            if (allFiles.files.length >= 5) {
                const warning = document.createElement('div');
                warning.className = 'col-span-12 text-red-500 text-xs mt-1';
                warning.textContent = 'Maksimal 5 file.';
                fileList.appendChild(warning);
            }
        }

        // ===============================
        // FUNGSI UNTUK MENAMBAHKAN/HAPUS BARIS SOSMED
        // ===============================
        function tambahSosmed() {
            const container = document.getElementById('sosmed-container');
            const html = `
            <div class="grid grid-cols-12 gap-2 sosmed-row mb-2">
                <div class="col-span-3">
                    <input type="file" name="sosmed_icon[]" class="form-control" accept="image/*">
                </div>
                <div class="col-span-4">
                    <input type="text" name="sosmed_nama[]" class="form-control" placeholder="Nama (ex: Instagram)">
                </div>
                <div class="col-span-4">
                    <input type="url" name="sosmed_link[]" class="form-control" placeholder="Link Sosmed">
                </div>
                <div class="col-span-1 flex items-center">
                    <button type="button" onclick="hapusSosmed(this)" class="text-red-500 font-bold text-lg">×</button>
                </div>
            </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        function hapusSosmed(button) {
            button.closest('.sosmed-row').remove();
        }

        // ===============================
        // FUNGSI UNTUK MENGHAPUS PREVIEW GAMBAR
        // ===============================
        function removeImagePreview(filename, buttonElement) {
            $(buttonElement).closest('.preview-gambar-wrapper').remove();

            // Tambahkan nama file ke input tersembunyi
            let currentRemoved = $('#removedImages').val();
            let removedArray = currentRemoved ? JSON.parse(currentRemoved) : [];
            removedArray.push(filename);
            $('#removedImages').val(JSON.stringify(removedArray));
        }

        // ===============================
        // FUNGSI UTAMA UNTUK MEMBUKA MODAL (CREATE & EDIT)
        // ===============================
        function openinputmodal(t = null) {
            inputmodal.show();

            // Reset form
            $('form')[0].reset();
            $('#hdnId').val('');
            $('#removedImages').val(''); // Reset gambar yang dihapus
            $('#existing-images-container').html(''); // Hapus preview gambar lama
            $('#sosmed-container').html(''); // Hapus baris sosmed lama

            // Reset file input dan daftar file
            allFiles = new DataTransfer();
            fileInput.files = allFiles.files;
            renderFileList();

            // Reset Quill dan checkbox layanan
            quilldefaulteditor.root.innerHTML = '';
            $('input[name="layanan[]"]').prop('checked', false);

            // Jika mode edit
            if (t) {
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
                $('#txtWebsite').val(t.website ?? '');

                // Populate Layanan
                if (t.layanan) {
                    const layananArray = typeof t.layanan === 'string' ? JSON.parse(t.layanan) : t.layanan;
                    layananArray.forEach(val => {
                        $(`input[name="layanan[]"][value="${val}"]`).prop('checked', true);
                    });
                }

                // Populate Deskripsi
                if (t.deskripsi) {
                    quilldefaulteditor.root.innerHTML = t.deskripsi;
                }

                // Populate Sosmed
                if (t.sosmed) {
                    const sosmedData = typeof t.sosmed === 'string' ? JSON.parse(t.sosmed) : t.sosmed;
                    sosmedData.forEach(item => {
                        const rowHtml = `
                        <div class="grid grid-cols-12 gap-2 sosmed-row mb-2">
                            <div class="col-span-3">
                                <input type="file" name="sosmed_icon[]" class="form-control" accept="image/*">
                                <img src="/recfil?display=true&rf=${encodeURIComponent(item.icon)}" class="mt-1" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                            </div>
                            <div class="col-span-4">
                                <input type="text" name="sosmed_nama[]" class="form-control" value="${item.nama}">
                            </div>
                            <div class="col-span-4">
                                <input type="url" name="sosmed_link[]" class="form-control" value="${item.link}">
                            </div>
                            <div class="col-span-1 flex items-center">
                                <button type="button" onclick="hapusSosmed(this)" class="text-red-500 font-bold text-lg">×</button>
                            </div>
                        </div>`;
                        $('#sosmed-container').append(rowHtml);
                    });
                } else {
                    // Tambahkan satu baris kosong jika tidak ada data
                    tambahSosmed();
                }

                // Populate Gambar dengan tombol hapus
                if (t.gambar) {
                    const gambars = typeof t.gambar === 'string' ? JSON.parse(t.gambar) : t.gambar;
                    const container = $('#existing-images-container');
                    gambars.forEach(g => {
                        const wrapper = `
                        <div class="preview-gambar-wrapper relative inline-block">
                            <img src="/recfil?display=true&rf=${encodeURIComponent(g)}" class="preview-gambar" style="width:100px;height:100px;object-fit:cover; border-radius: 8px; border: 2px solid #e5e7eb;">
                            <button type="button" onclick="removeImagePreview('${g}', this)" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 text-center leading-6 text-lg" style="transform: translate(50%, -50%);">×</button>
                        </div>`;
                        container.append(wrapper);
                    });
                }
            } else {
                // Jika mode tambah, pastikan ada satu baris sosmed
                tambahSosmed();
            }
        }
    </script>
    <script>
        document.getElementById('discountType').addEventListener('change', function() {
            const valueInput = document.getElementById('discountValue');
            if (this.value === 'free_shipping') {
                valueInput.style.display = 'none';
            } else {
                valueInput.style.display = 'block';
            }
        });
    </script>
    <script>
        const fileInput = document.getElementById('fileGambar');
        const list = document.getElementById('fileList');

        let allFiles = new DataTransfer();

        fileInput.addEventListener('change', function(e) {

            for (let file of e.target.files) {

                if (allFiles.files.length >= 5) break;

                allFiles.items.add(file);
            }

            fileInput.files = allFiles.files;

            renderList();
        });

        function renderList() {

            list.innerHTML = '';

            Array.from(allFiles.files).forEach((file, i) => {

                const item = document.createElement('div');
                item.style.padding = '5px 0';
                item.style.borderBottom = '1px solid #eee';
                item.textContent = `${i + 1}. ${file.name}`;

                list.appendChild(item);
            });

            if (allFiles.files.length >= 5) {
                const warning = document.createElement('div');
                warning.style.color = 'red';
                warning.style.fontSize = '12px';
                warning.textContent = 'Maksimal 5 file.';
                list.appendChild(warning);
            }
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
