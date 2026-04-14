@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: BANNER -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            REKRUITMEN
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
                                            <form action="/salamprofit/rekruitmen" method="get">
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
                                                        <th>Type</th>
                                                        <th>Title</th>
                                                        <th>Tanggal Posting</th>
                                                        <th>Tanggal Berakhir</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rekruitmen as $k => $v)
                                                        <tr>
                                                            <td>{{ $k + 1 }}</td>
                                                            <td>
                                                                @if ($v->tipe_pekerjaan == 1)
                                                                    Full-time
                                                                @elseif ($v->tipe_pekerjaan == 2)
                                                                    Part-time
                                                                @elseif ($v->tipe_pekerjaan == 3)
                                                                    Kontrak
                                                                @else
                                                                    Lainnya
                                                                @endif
                                                            </td>
                                                            <td>{{ $v->judul }}</td>
                                                            <td>{{ Carbon\Carbon::parse($v->tampil_start)->format('d-m-Y') }}
                                                            </td>
                                                            <td>{{ Carbon\Carbon::parse($v->tampil_end)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                <button data-id="{{ $v->id }}"
                                                                    data-title="{{ $v->judul }}"
                                                                    data-type="{{ $v->tipe_pekerjaan }}"
                                                                    data-limit="{{ $v->gaji_min }}"
                                                                    data-max="{{ $v->gaji_max }}"
                                                                    data-lok="{{ $v->lokasi }}"
                                                                    data-start="{{ \Carbon\Carbon::parse($v->tanggal_posting)->format('Y-m-d') }}"
                                                                    data-end="{{ \Carbon\Carbon::parse($v->tanggal_berakhir)->format('Y-m-d') }}"
                                                                    data-content="{{ $v->deskripsi }}"
                                                                    data-gambar="{{ $v->gambar }}"
                                                                    onclick="openinputmodal($(this))" type="button"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i data-lucide="edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="confirmdelete('/salamprofit/rekruitmen/{{ $v->id }}')">
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
    <form action="/salamprofit/rekruitmen" method="post">
        <div id="modalInputRekruitment" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Rekruitmen</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <input id="hdnId" name="id" type="hidden" class="form-control">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtTitle" class="form-label">Judul</label>
                            <input id="txtTitle" name="judul" type="text" class="form-control">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtType" class="form-label">Type Pekerjaan</label>
                            <select id="txtType" name="tipe_pekerjaan" class="form-control">
                                <option value=""></option>
                                <option value="1">Full-time</option>
                                <option value="2">Part-time</option>
                                <option value="3">Kontrak</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtLimit" class="form-label">Gaji Min</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input id="txtLimit" name="gaji_min" type="number" class="form-control"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtmax" class="form-label">Gaji Max</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input id="txtmax" name="gaji_max" type="number" class="form-control"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtlok" class="form-label">Lokasi</label>
                            <input id="txtlok" name="lokasi" type="text" class="form-control">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="detStart" class="form-label">Mulai</label>
                            <input id="detStart" type="date" name="tanggal_posting" class="form-control"
                                data-single-mode="true">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="detEnd" class="form-label">Berakhir</label>
                            <input id="detEnd" type="date" name="tanggal_berakhir" class="form-control"
                                data-single-mode="true">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="gambar" class="form-label">Gambar <span>(wajib isi bila ingin
                                    merubah)</span></label>
                            <input id="gambar" type="file" accept="image/*" class="form-control"
                                dat-showpreview="true">
                        </div>
                        <div class="col-span-12">
                            <hr>
                        </div>
                        <div class="col-span-12 mb-8">
                            <div id="quilldefaulteditor"></div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="button" class="btn btn-primary w-20" onclick="savedata()">Simpan</button>
                    </div> <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
    </form>
    <!-- END: Modal Input -->

    <script>
        var quilldefaulteditor;
        var inputmodal;
        $(document).ready(function() {
            inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputRekruitment"));
            // $('#slcTag').select2();
        });

        function openinputmodal(t) {
            $('#hdnId').val('');
            $('#txtTitle').val('');
            $('#txtType').val('');
            $('#txtLimit').val('');
            $('#txtmax').val('');
            $('#txtlok').val('');
            $('#detStart').val('');
            $('#detEnd').val('');
            quilldefaulteditor.setContents([]);

            if (t) {
                $('#hdnId').val(t.data('id'));
                $('#txtTitle').val(t.data('title'));
                $('#txtType').val(t.data('type'));
                $('#txtLimit').val(t.data('limit'));
                $('#txtmax').val(t.data('max'));
                $('#txtlok').val(t.data('lok'));
                $('#detStart').val(t.data('start'));
                $('#detEnd').val(t.data('end'));
                var contentHtml = t.attr('data-content');
                quilldefaulteditor.clipboard.dangerouslyPasteHTML(contentHtml);
                if (t.data('gambar') != '') {
                    if ($('img.showpreviewfile_0').length == 0) {
                        $('#gambar').parent().append('<img src="/recfil?rf=' + t.data('gambar') +
                            '" class="showpreviewfile_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                    } else {
                        $('img.showpreviewfile_0').attr('src', '/recfil?rf=' + t.data('gambar'));
                    }
                }
            }


            inputmodal.show();
        }

        function savedata() {
            var id = $('#hdnId').val();
            var titl = $('#txtTitle').val();
            var type = $('#txtType').val();
            var lim = $('#txtLimit').val();
            var max = $('#txtmax').val();
            var lok = $('#txtlok').val();
            var str = $('#detStart').val();
            var end = $('#detEnd').val();
            var gambar = document.getElementById('gambar').files[0];

            var cntn = quilldefaulteditor.getSemanticHTML();

            var data = new FormData();

            data.append('id', id);
            data.append('judul', titl);
            data.append('tipe_pekerjaan', type);
            data.append('gaji_min', lim);
            data.append('gaji_max', max);
            data.append('lokasi', lok);
            data.append('tanggal_posting', str);
            data.append('tanggal_berakhir', end);
            data.append('deskripsi', cntn);
            data.append('gambar', gambar);

            $.ajax({
                url: '/salamprofit/rekruitmen',
                data: data,
                headers: {
                    'X-CSRF-Token': csrf_token
                },
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(data) {
                    if (data.success) {
                        Toastify({
                            text: data.msg,
                            className: "success",
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                        inputmodal.hide();
                        location.reload();
                    } else {
                        Toastify({
                            text: data.msg,
                            className: "info",
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }
                },
                error: function(xhr) {
                    if (xhr.status == 401) {
                        alert(xhr.responseText);
                    }
                }
            });
        }

        function deldata(id) {
            if (confirm('Hapus Data?')) {
                $.ajax({
                    type: "DELETE",
                    url: "/salamprofit/rekruitmen/" + id,
                    headers: {
                        'X-CSRF-Token': csrf_token
                    },
                    success: function(data) {
                        alert('Berhasil Hapus Data')
                        location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status == 401) {
                            alert(xhr.responseText);
                        } else {
                            alert(xhr.status);
                        }
                    }
                });
            }
        }
    </script>
@endsection
