@extends('layouts.admin')

@section('content')

<style>
    .modal-dialog {
        max-width: 90% !important;
        width: 90% !important;
    }
</style>
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        GALLERY
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
                                            onclick="openinputmodal(0)">
                                            <i data-lucide="plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-2">
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/gallery" method="get">
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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 0;
                                                @endphp
                                                @foreach ($data as $k => $v)
                                                @php
                                                $no++;
                                                @endphp
                                                <tr>
                                                    <td>{{ ($no) }}</td>
                                                    <td>{{ $k }}</td>
                                                    <td>
                                                        
                                                        <span class="btn btn-sm btn-warning"><i data-lucide="edit"
                                                                onclick="openinputmodal({{$v}})"></i></span>
                                                        <span class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/gallery/{{$k}}')"><i
                                                                data-lucide="trash"></i></span>
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
            <form action="/salamprofit/gallery" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">GALLERY</h2>
                </div>

                <div class="modal-body">
                    <div class="grid grid-cols-12 gap-4 mb-4">
                        <div class="col-span-12">
                            <label class="form-label">Kategori</label>
                            <input type="text" id="kategori" name="kategori" class="form-control">
                        </div>
                        <div class="col-span-3">
                            <label class="form-label"></label>
                            <input type="number" id="urutan" class="form-control">
                        </div>
                        <div class="col-span-6 flex items-end">
                            <button type="button" onclick="tambahForm()" class="btn btn-primary">
                                Tambah Form
                            </button>
                        </div>
                    </div>

                    <!-- Tabel -->
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody id="galleryTable">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div>
                <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>
<!-- END: Modal Input -->
<!-- BEGIN: Delete -->
<div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <input type="text" id="idmodal" hidden>
                <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Apakah Kamu Yakin???</div>
                    <div class="text-slate-500 mt-2">
                        Data Yang Dihapus tidak bisa kembali

                    </div>
                </div>
                <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button> <button type="button"
                        class="btn btn-danger w-24" onclick="prosesHapus()">Delete</button> </div>
            </div>
        </div>
    </div>
</div> <!-- END: Delete -->
<script>
    var inputmodal;
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputBanner"));
        deletemodalx = tailwind.Modal.getOrCreateInstance(document.querySelector("#delete-modal-preview"));
        // $('#slcTag').select2();
        let urut = 0;
        let rowbtn = null;
    });
    function openinputmodal(t) {
        urut = 0;
        inputmodal.show();
        document.getElementById('galleryTable').innerHTML = '';
        if (t.length > 0) {
            $('#kategori').val(t[0].kategori);
            $('#urutan').val(t.length);
            tambahForm();
            for (let i = 0; i < t.length; i++) {
                $('input[name="id[]"]').eq(i).val(t[i].id);
                $('input[name="title[]"]').eq(i).val(t[i].title);
                $('textarea[name="description[]"]').eq(i).val(t[i].description);
                $('input[name="published_at[]"]').eq(i).val(dayjs(t[i].published_at).format('YYYY-MM-DD'));
                $('input[type="file"]').eq(i).parent().append('<img src="/recfil?rf=' + t[i].image + '" class="showpreviewfile_' + i + ' mt-2" style="width:100%;max-height:130px;max-width:130px;">');

            }
        }
        // $('#filDesktop').parent().append('<img src="/recfil?rf=' + t.thumbnail + '" class="showpreviewfile_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
        
    }

    function tambahForm() {
    const jumlahInput = document.getElementById('urutan');
    let n = parseInt(jumlahInput.value, 10);

    // fallback kalau kosong/invalid
    if (isNaN(n) || n < 1) n = 1;

    for (let i = 0; i < n; i++) {
        tambahSatuRow(i);
        urut++;
    }

    // kembalikan ke 1 supaya klik berikutnya tidak “kaget” menambah banyak baris
    jumlahInput.value = 1;
    
    }

function tambahSatuRow(i) {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="file" name="image[]" accept="image/*" class="form-control" id="filDesktop" onchange="showpreview($(this))" dat-showpreview="true" dat-nourut="`+urut+`"><img class="showpreviewfile_`+urut+` mt-2" style="width:100%;max-height:130px;max-width:130px;"></td>
        <td><input type="text" name="title[]" class="form-control"><input type="text" id="index${urut}" name="id[]" hidden></td>
        <td><textarea name="description[]" class="form-control" >deskripsi</textarea></td>
        <td><input type="date" name="published_at[]" class="form-control"></td>
        <td><span class="btn btn-danger" onclick="hapusRow(this,${urut})">Hapus</span></td>
    `;
    document.getElementById('galleryTable').appendChild(row);
}

function hapusRow(btn,id) {
    let index = $('#index'+id).val();
    rowbtn = btn;
    if (index != '' && index != null) {
        deletemodalx.show();
        $('#idmodal').val(index);
    }else{
        btn.closest('tr').remove();
    }
}
function prosesHapus() {
    console.log($('#idmodal').val());
    
        $.ajax({
            url: '/salamprofit/gallery/' + $('#idmodal').val(),
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    Toastify({
                        text: 'Data berhasil dihapus',
                        className: "success",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        duration: 5000,
                        close: true,
                    }).showToast();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                    // deletemodalx.hide();
                    // rowbtn.closest('tr').remove();
                } else {
                    console.error('Gagal menghapus data');
                }
            },
            error: function (xhr) {
                console.error('Terjadi kesalahan saat menghapus data');
            }
        });
}
function showConfirmationDialog() {
        // Example of a simple custom confirmation dialog using basic JS/HTML
        const confirmDialog = document.createElement('div');
        confirmDialog.innerHTML = `
            <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #ccc; z-index: 1000;">
                <p>Are you absolutely sure you want to perform this action?</p>
                <button id="confirmBtn">Confirm</button>
                <button id="cancelBtn">Cancel</button>
            </div>
        `;
        document.body.appendChild(confirmDialog);

        document.getElementById('confirmBtn').onclick = function() {
            // Perform the action
            Toastify({ text: "Action confirmed!", backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)" }).showToast();
            confirmDialog.remove();
        };

        document.getElementById('cancelBtn').onclick = function() {
            Toastify({ text: "Action cancelled.", backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)" }).showToast();
            confirmDialog.remove();
        };
    }

function showpreview(t) {
    $('.showpreviewfile_' + t.attr('dat-nourut')).attr('src', URL.createObjectURL(t[0].files[0]));
}
</script>
@endsection