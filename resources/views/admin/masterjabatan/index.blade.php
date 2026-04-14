@extends('layouts.admin')

@section('content')
<style>
    .modal-dialog {
        max-width: 40% !important;
        width: 40% !important;
    }
</style>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Master Jabatan
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
                                        <form action="/salamprofit/master-produk-pinjaman" method="get">
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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key => $v)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{ $v->nama }}</td>
                                                    <td>
                                                        <span class="btn btn-sm btn-warning"><i data-lucide="edit"
                                                                onclick="openinputmodal({{$v}})"></i></span>
                                                        <span class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/master-jabatan/{{$v->id}}')"><i
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
<div id="modalInputMasterJabatan" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="/salamprofit/master-jabatan" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="txtId" id="txtId" hidden>
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Master Jabatan</h2>
                </div>

                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="txtnama" class="form-label">Nama</label>
                        <input id="txtnama" name="nama" type="text" class="form-control">
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
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputMasterJabatan"));
    });
    function openinputmodal(t) {
        inputmodal.show();
        $('#txtId').val(null);
        $('.showpreviewfile_0_0').remove();
        $('.showpreviewfile_1_0').remove();
        if (t) {
            $('#txtId').val(t.id);
            $('#txtnama').val(t.nama);
         
        }
    }
</script>
@endsection