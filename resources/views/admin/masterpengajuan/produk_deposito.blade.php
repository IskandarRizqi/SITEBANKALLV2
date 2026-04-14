@extends('layouts.admin')

@section('content')
    <style>
        .modal-dialog {
            max-width: 90% !important;
            width: 70% !important;
        }
    </style>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: BANNER -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Master Pengajuan Deposito
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
                                            <form action="/salamprofit/master-produk-deposito" method="get">
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
                                                        <th>Nama</th>
                                                        <th>Tenor</th>
                                                        <th>Bunga %</th>
                                                        <th>Image</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key => $v)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $v->nama }}</td>
                                                            <td>{{ $v->tenor }}</td>
                                                            <td>{{ $v->bunga }} % Perbulan</td>
                                                            <td>
                                                                <a class="btn btn-secondary btn-sm"
                                                                    href="/recfil?display=true&rf={{ $v->image }}"
                                                                    target="_blank" title="Lihat Thumbnail">
                                                                    <i data-lucide="maximize"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span class="btn btn-sm btn-warning"><i data-lucide="edit"
                                                                        onclick="openinputmodal({{ $v }})"></i></span>
                                                                <span class="btn btn-sm btn-danger"
                                                                    onclick="confirmdelete('/salamprofit/master-produk-deposito/{{ $v->id }}')"><i
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
    <div id="modalInputProduk" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="/salamprofit/master-produk-deposito" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="txtId" id="txtId" hidden>
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Master Pengajuan Deposito</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtnama" class="form-label">Nama</label>
                            <input id="txtnama" name="nama" type="text" class="form-control">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txttenor" class="form-label">Tenor</label>
                            <div class="input-group">
                                <input id="txttenor" name="tenor" type="number" class="form-control" min="1"
                                    step="1">
                                <span class="input-group-text bg-light" style="pointer-events:none;">Bulan</span>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtbunga" class="form-label">Bunga</label>
                            <div class="input-group">
                                <input id="txtbunga" name="bunga" type="number" class="form-control" min="0"
                                    step="0.01">
                                <span class="input-group-text bg-light"
                                    style="pointer-events:none; width:90px; display:flex; justify-content:center;">
                                    % Bulan
                                </span>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="filimage" class="form-label">Gambar</label>
                            <input id="filimage" accept="image/*" type="file" name="image" class="form-control"
                                dat-showpreview="true">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Simpan</button>
                    </div> <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
    <!-- END: Modal Input -->

    <script>
        var inputmodal;
        $(document).ready(function() {
            inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputProduk"));
        });

        function openinputmodal(t) {
            inputmodal.show();
            $('#txtId').val(null);
            $('.showpreviewfile_0_0').remove();
            $('.showpreviewfile_1_0').remove();
            if (t) {
                $('#txtId').val(t.id);
                $('#txtnama').val(t.nama);
                $('#txttenor').val(t.tenor);
                $('#txtbunga').val(t.bunga);
                if (t.image) {
                    if ($('img.showpreviewfile_0').length == 0) {
                        $('#filimage').parent().append('<img src="/recfil?rf=' + t.image +
                            '" class="showpreviewfile_1_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                    } else {
                        $('img.showpreviewfile_0').attr('src', '/recfil?rf=' + t.image);
                    }
                }
            }
        }
    </script>
@endsection
