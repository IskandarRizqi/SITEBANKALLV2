@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        BANNER
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                {{-- BEGIN: DATACARD --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 intro-y">
                        <div class="report-box">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="image" class="report-box__icon text-primary"></i>
                                    <div class="ml-auto">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="openinputmodal(null)">
                                            <i data-lucide="plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-2">
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/banner" method="get">
                                            <div class="input-group"> 
                                                <input type="date" name="str" class="form-control" value="{{ $date_start }}" data-single-mode="true"> 
                                                <div class="input-group-text">-</div> 
                                                <input type="date" name="end" class="form-control" value="{{ $date_end }}" data-single-mode="true"> 
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
                                                    <th>Dari</th>
                                                    <th>Hingga</th>
                                                    <th>Tag</th>
                                                    <th>Type</th>
                                                    <th>Banner</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($banner as $k => $v)  
                                                <tr>
                                                    <td>{{ ($k + 1) }}</td>
                                                    <td>{{ $v->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($v->tampil_start)->format('d-m-Y') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($v->tampil_end)->format('d-m-Y') }}</td>
                                                    <td>
                                                        @if ($v->tag)
                                                            @foreach (json_decode($v->tag) as $t)
                                                                <span class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium mr-1"> {{ $t }} </span>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($v->type == 0)
                                                            Top
                                                        @elseif ($v->type == 1)
                                                            Bottom
                                                        @else
                                                            Lainnya
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" href="/recfil?display=true&rf={{ urlencode($v->url) }}" target="_blank">
                                                            <i data-lucide="monitor"></i>
                                                        </a>
                                                        @if ($v->url_mobile)
                                                            <a class="btn btn-secondary btn-sm" href="/recfil?display=true&rf={{ urlencode($v->url_mobile) }}" target="_blank">
                                                                <i data-lucide="smartphone"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button 
                                                            dat-id="{{ $v->id }}"
                                                            dat-name="{{ $v->name }}"
                                                            dat-tampil_start="{{ Carbon\Carbon::parse($v->tampil_start)->format('Y-m-d') }}"
                                                            dat-tampil_end="{{ Carbon\Carbon::parse($v->tampil_end)->format('Y-m-d') }}"
                                                            dat-tag="{{ $v->tag }}"
                                                            dat-type="{{ $v->type }}"
                                                            dat-url="{{ $v->url }}"
                                                            dat-url_mobile="{{ $v->url_mobile }}"
                                                            onclick="openinputmodal($(this))"
                                                            type="button" class="btn btn-sm btn-warning">
                                                            <i data-lucide="edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="deldata({{ $v->id }})">
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
<form action="/salamprofit/banner" method="post">
    <div id="modalInputBanner" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Banner</h2> 
                </div> 
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input id="hdnId" name="id" type="hidden" class="form-control"> 
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="txtNama" class="form-label">Nama</label> 
                        <input id="txtNama" name="nama" type="text" class="form-control"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="txtType" class="form-label">Type</label> 
                        <select id="txtType" name="type" class="form-control">
                            <option value="0">Top</option>
                            <option value="1">Bottom</option>
                            <option value="2">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="detStart" class="form-label">Start</label> 
                        <input id="detStart" type="date" name="tampil_start" class="form-control" data-single-mode="true"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="detEnd" class="form-label">End</label> 
                        <input id="detEnd" type="date" name="tampil_end" class="form-control" data-single-mode="true"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="slcTag" class="form-label">Tag</label> 
                        <select id="slcTag" data-header="Pilih/Tambah Tag" name="tag[]" class="tom-select w-full" multiple>
                            @foreach ($tag as $v)
                                <option value="{{$v}}">{{$v}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-12 mb-3">
                        <hr>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Ukuran Banner Desktop 1440 x 722 </span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Orientasi Gambar Desktop Landskap</span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Besar File Maksimal 2MB</span></div>
                        </div>
                    </div>
                    <div class="col-span-12"></div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filDesktop" class="form-label">Desktop</label> 
                        <input id="filDesktop" accept="image/*" type="file" name="banner_desktop" class="form-control" dat-showpreview="true"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filMobile" class="form-label">Mobile</label> 
                        <input id="filMobile" accept="image/*" type="file" name="banner_mobile" class="form-control" dat-showpreview="true"> 
                    </div>
                </div> 
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer"> 
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> 
                    <button type="button" class="btn btn-primary w-20" onclick="savedata()">Simpan</button> 
                </div> <!-- END: Modal Footer -->
            </div>
        </div>
    </div> 
</form>
<!-- END: Modal Input -->

<script>
    var inputmodal;
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputBanner"));
        // $('#slcTag').select2();
    });
    function openinputmodal(t) {
        $('#hdnId').val('');
        $('#txtNama').val('');
        $('#txtType').val('');
        $('#detStart').val('');
        $('#detEnd').val('');
        $('#slcTag').val('');
        document.querySelector('#slcTag').tomselect.setValue('');
        $('#filDesktop').val('');
        $('#filMobile').val('');
        if (t != null) {
            $('#hdnId').val(t.attr('dat-id'));
            $('#txtNama').val(t.attr('dat-name'));
            $('#txtType').val(t.attr('dat-type'));
            $('#detStart').val(t.attr('dat-tampil_start'));
            $('#detEnd').val(t.attr('dat-tampil_end'));
            var tag = null;
            if (t.attr('dat-tag')) {
                tag = JSON.parse(t.attr('dat-tag'));
            }
            console.log(tag);
            document.querySelector('#slcTag').tomselect.setValue(tag);
        }
        inputmodal.show();
    }
    function savedata() {
        var id = $('#hdnId').val();
        var nama = $('#txtNama').val();
        var type = $('#txtType').val();
        var dstr = $('#detStart').val();
        var dend = $('#detEnd').val();
        var tags = $('#slcTag').val();
        var dstp = $('#filDesktop').val();
        var mobl = $('#filMobile').val();

        var data = new FormData();
        // data.append('_token', csrf_token);
        data.append('id', id);
        data.append('nama', nama);
        data.append('type', type);
        data.append('datestart', dstr);
        data.append('dateend', dend);
        data.append('tags', tags);
        data.append('filedesktop', $('#filDesktop')[0].files[0]);
        data.append('filemobile', $('#filMobile')[0].files[0]);
        var confbnrsiz = true;
        if (dstp || mobl) {
            confbnrsiz = confirm('Pastikan ukuran banner sesuai!');
        }

        if (confbnrsiz) {
            $.ajax({
                url: '/salamprofit/banner',
                data: data,
                headers: {
                    'X-CSRF-Token': csrf_token 
                },
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(data){
                    // alert(data);
                    location.reload();
                },
                error: function(xhr){
                    if (xhr.status == 401) {
                        alert(xhr.responseText);
                    }
                }
            });
        }

        
    }

    function deldata(id) {
        if (confirm('Hapus Data?')) {
            $.ajax({
                type: "DELETE",
                url: "/salamprofit/banner/" + id,
                headers: {
                    'X-CSRF-Token': csrf_token 
                },
                success: function(data){
                    alert('Berhasil Hapus Data')
                    location.reload();
                },
                error: function(xhr){
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