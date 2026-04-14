@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        JARINGAN KANTOR
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
                                    {{-- <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/banner" method="get">
                                            <div class="input-group">
                                                <input type="date" name="str" class="form-control"
                                                    value="{{ $date_start }}" data-single-mode="true">
                                                <div class="input-group-text">-</div>
                                                <input type="date" name="end" class="form-control"
                                                    value="{{ $date_end }}" data-single-mode="true">
                                            </div>
                                            <button class="btn btn-primary w-full mt-2" type="submit">Cari</button>
                                        </form>
                                    </div> --}}
                                    <div class="col-span-12">
                                        <table id="datatabledefault">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kantor</th>
                                                    <th>Lokasi</th>
                                                    <th>Alamat</th>
                                                    <th>Thumbnail</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $v)
                                                <tr>
                                                    <td>{{ ($k + 1) }}</td>
                                                    <td>{{ $v->kantor }}</td>
                                                    <td>
                                                        <a href="https://www.google.com/maps/search/?q={{$v->latitude}},{{$v->longitude}}"
                                                            target="_blank">
                                                            <span class="btn btn-sm btn-info"><i
                                                                    data-lucide="map-pin"></i></span>
                                                        </a>
                                                    </td>
                                                    <td>{{$v->alamat}}</td>
                                                    <td>
                                                        @if($v->thumbnail)
                                                        <a href="/recfil?display=true&rf={{$v->thumbnail}}"
                                                            target="_blank">
                                                            <img src="/recfil?rf={{$v->thumbnail}}" alt=""
                                                                style="max-width:100px;max-height:100px;">
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-sm btn-warning"><i data-lucide="edit"
                                                                onclick="openinputmodal({{$v}})"></i></span>
                                                        <span class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/jaringan-kantor/{{$v->id}}')"><i
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
        <form action="/salamprofit/jaringan-kantor" method="post" enctype="multipart/form-data" class="">
            @csrf
            <input type="text" name="id" id="txtId" hidden>
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">JARINGAN KANTOR</h2>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtNama" class="form-label">Kantor</label>
                        <input id="txtNama" name="kantor" type="text" class="form-control" value="{{old('kantor')}}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtNotelp" class="form-label">No Telepon</label>
                        <input id="txtNotelp" name="no_telp" type="text" class="form-control"
                            value="{{old('no_telp')}}">
                    </div>
                    <div class="col-span-12 sm:col-span-3 input-form">
                        <label for="txtLatitude" class="form-label">Latitude</label>
                        <input id="txtLatitude" name="latitude" type="text" class="form-control"
                            value="{{old('latitude')}}">
                    </div>
                    <div class="col-span-12 sm:col-span-3 input-form">
                        <label for="txtLongitude" class="form-label">Longitude</label>
                        <input id="txtLongitude" name="longitude" type="text" class="form-control"
                            value="{{old('longitude')}}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="txtAlamat" class="form-label">Alamat</label>
                        <textarea id="txtAlamat" name="alamat" type="text"
                            class="form-control">{{old('alamat')}}</textarea>
                    </div>

                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="filDesktop" class="form-label">Thumbnail</label>
                        <input id="filDesktop" accept="image/*" type="file" name="thumbnail" class="form-control"
                            dat-showpreview="true">
                    </div>

                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <span data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</span>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                    {{-- <button type="button" class="btn btn-primary w-20" onclick="savedata()">Simpan</button> --}}
                </div> <!-- END: Modal Footer -->
            </div>
        </form>
    </div>
</div>
<!-- END: Modal Input -->

<script>
    var inputmodal;
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputBanner"));
        // $('#slcTag').select2();
    });
    function openinputmodal(t) {
        inputmodal.show();
        $('#txtId').val(null);
        $('#txtNama').val(null);
        $('#txtNotelp').val(null);
        $('#txtLatitude').val(null);
        $('#txtLongitude').val(null);
        $('#txtAlamat').val(null);
        if(t != null) {
            $('#txtId').val(t.id);
            $('#txtNama').val(t.kantor);
            $('#txtNotelp').val(t.no_telp);
            $('#txtLatitude').val(t.latitude);
            $('#txtLongitude').val(t.longitude);
            $('#txtAlamat').val(t.alamat);
            if (t.thumbnail) {
                if ($('img.showpreviewfile_0').length == 0) {
                    $('#filDesktop').parent().append('<img src="/recfil?rf=' + t.thumbnail + '" class="showpreviewfile_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                } else {
                    $('img.showpreviewfile_0').attr('src', '/recfil?rf=' + t.thumbnail);
                }
            }
        }
    }
</script>
@endsection