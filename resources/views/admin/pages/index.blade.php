@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: PAGES -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        PAGES
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                {{-- BEGIN: DATACARD --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 intro-y">
                        <div class="report-box">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="book" class="report-box__icon text-primary"></i>
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
                                        <form action="/salamprofit/pages" method="get">
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
                                                    <th>Title</th>
                                                    <th>Tanggal Tampil</th>
                                                    <th>Kategori</th>
                                                    <th>Tag</th>
                                                    <th>Type</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pages as $k => $v)  
                                                <tr>
                                                    <td>{{ ($k + 1) }}</td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>{{ ($v->tanggal_tampil)?(Carbon\Carbon::parse($v->tanggal_tampil)->format('d F Y')):'-' }}</td>
                                                    <td>{{ $v->kategori }}</td>
                                                    <td>
                                                        @if ($v->tag)
                                                            @foreach (json_decode($v->tag) as $t)
                                                                <span class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium mr-1"> {{ $t }} </span>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($v->type == 0)
                                                            Berita
                                                        @elseif ($v->type == 1)
                                                            Event
                                                        @else
                                                            Lainnya
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" href="/recfil?display=true&rf={{ urlencode($v->banner) }}" target="_blank">
                                                            <i data-lucide="image"></i>
                                                        </a>
                                                        @if ($v->thumbnail)
                                                            <a class="btn btn-secondary btn-sm" href="/recfil?display=true&rf={{ urlencode($v->thumbnail) }}" target="_blank">
                                                                <i data-lucide="maximize"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" type="button" onclick="openmultibannermodal({{ $v->id }})">
                                                            <i data-lucide="layers"></i>
                                                        </button>
                                                        <button 
                                                            dat-id="{{ $v->id }}"
                                                            dat-urutan="{{ $v->urutan }}"
                                                            dat-title="{{ $v->title }}"
                                                            dat-kategori="{{ $v->kategori }}"
                                                            dat-tag="{{ $v->tag }}"
                                                            dat-type="{{ $v->type }}"
                                                            dat-content="{{ $v->content }}"
                                                            dat-banner="{{ $v->banner }}"
                                                            dat-thumbnail="{{ $v->thumbnail }}"
                                                            dat-tanggal_tampil="{{ ($v->tanggal_tampil)?Carbon\Carbon::parse($v->tanggal_tampil)->format('Y-m-d'):null }}"
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
            <!-- END: PAGES -->
        </div>
    </div>
</div>

<!-- BEGIN: Modal Input -->
<form action="/salamprofit/pages" method="post">
    <div id="modalInputPages" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Pages</h2> 
                </div> 
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input id="hdnId" name="id" type="hidden" class="form-control"> 
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="txtTitle" class="form-label">Title</label> 
                        <input id="txtTitle" name="title" type="text" class="form-control"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="txtTanggalTampil" class="form-label">Tanggal Tampil</label> 
                        <input id="txtTanggalTampil" name="tanggal_tampil" type="date" value="{{ date('Y-m-d') }}" class="form-control"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="txtType" class="form-label">Type</label> 
                        <select id="txtType" name="type" class="form-control">
                            <option value="0">Berita</option>
                            <option value="1">Event</option>
                            <option value="2">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="slcTag" class="form-label">Tag</label> 
                        <select id="slcTag" data-header="Pilih/Tambah Tag" name="tag[]" class="tom-select w-full" multiple>
                            @foreach ($tag as $v)
                                <option value="{{$v}}">{{$v}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-12 sm:col-span-6"> 
                        <label for="slcKategori" class="form-label">Kategori</label> 
                        <select id="slcKategori" data-header="Pilih/Tambah Kategori" name="kategori" class="tom-select w-full" tagable="true">
                            @foreach ($kategori as $v)
                                <option value="{{$v}}">{{$v}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-12">
                        <hr>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filBanner" class="form-label">Banner</label> 
                        <input id="filBanner" accept="image/*" type="file" name="banner" class="form-control" dat-showpreview="true"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filThumbnail" class="form-label">Thumbnail</label> 
                        <input id="filThumbnail" accept="image/*" type="file" name="thumbnail" class="form-control" dat-showpreview="true"> 
                    </div>
                    <div class="col-span-12">
                        <hr>
                    </div>
                     <div class="col-span-12 sm:col-span-6">
                        <div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Jika isi literasi Masukan type lainnya dan kategori 'literasi'</span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Gambar lebih dari 1 tambahkan lanjutan di aksi multi</span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Ukuran Baner 716 x 440</span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Ukuran thumbnail  356 x 250</span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Besar File Maksimal 2MB</span></div>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <hr>
                    </div>
                    <div class="col-span-12 mb-8">
                        <div id="quilldefaulteditor"></div>
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

<!-- BEGIN: Modal MultiBanner -->
<form action="/salamprofit/pages/0" method="put">
    <div id="modalMultiBanner" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Banner</h2> 
                </div> 
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filMultiBanner" class="form-label">Multi Banner</label> 
                        <input id="filMultiBanner" accept="image/*" type="file" name="multibanner" class="form-control" dat-showpreview="true"> 
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtUrutanMultiBanner" class="form-label">Urutan</label> 
                        <input id="txtUrutanMultiBanner" type="number" name="urutanmultibanner" class="form-control" value="0"> 
                    </div>
                    <div class="col-span-12">
                        <hr>
                    </div>
                    <div class="col-span-12 grid grid-cols-4 gap-4" id="pageMultBannerContainer">
                        <div class="alert alert-secondary show mb-2" role="alert">
                            <div class="flex items-center">
                                <div class="font-medium text-lg">Urutan: 0</div>
                                <div class="text-xs bg-slate-500 px-1 rounded-md text-white ml-auto">New</div>
                            </div>
                            <div class="mt-3"></div>
                        </div>
                    </div>
                </div> 
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer"> 
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> 
                    <button type="button" class="btn btn-primary w-20" onclick="savedatabanner()">Simpan</button> 
                </div> <!-- END: Modal Footer -->
            </div>
        </div>
    </div> 
</form>
<!-- END: Modal MultiBanner -->

<script>
    var quilldefaulteditor; 
    var inputmodal;
    var multibannermodal;
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputPages"));
        multibannermodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalMultiBanner"));
        // $('#slcTag').select2();
    });
    function openinputmodal(t) {
        $('#hdnId').val('');
        $('#txtTitle').val('');
        $('#txtType').val('');
        $('#slcTag').val('');
        $('#slcKategori').val('');
        $('#filBanner').val('');
        $('#filThumbnail').val('');
        document.querySelector('#slcTag').tomselect.setValue('');
        document.querySelector('#slcKategori').tomselect.setValue('');
        $('#txtTanggalTampil').val('');
        quilldefaulteditor.setContents([]);
        
        if (t != null) {
            $('#hdnId').val(t.attr('dat-id'));
            $('#txtTitle').val(t.attr('dat-title'));
            $('#txtType').val(t.attr('dat-type'));
            $('#txtTanggalTampil').val(t.attr('dat-tanggal_tampil'));
            var contentHtml = t.attr('dat-content');
            quilldefaulteditor.clipboard.dangerouslyPasteHTML(contentHtml);
            var tag = null;
            if (t.attr('dat-tag')) {
                tag = JSON.parse(t.attr('dat-tag'));
            }
            document.querySelector('#slcTag').tomselect.setValue(tag);
            document.querySelector('#slcKategori').tomselect.setValue(t.attr('dat-kategori'));
             var bannerVal = t.attr('dat-banner');
            if (bannerVal) {
                $('#filBanner').parent().append(
                    '<img src="/recfil?display=true&rf=' + encodeURIComponent(bannerVal) + '" class="preview-banner-existing mt-2" style="max-width: 100%; max-height: 130px; object-fit: contain;">'
                );
            }

            var thumbnailVal = t.attr('dat-thumbnail');
            if (thumbnailVal) {
                $('#filThumbnail').parent().append(
                    '<img src="/recfil?display=true&rf=' + encodeURIComponent(thumbnailVal) + '" class="preview-thumbnail-existing mt-2" style="max-width: 100%; max-height: 130px; object-fit: contain;">'
                );
            }
        }
        inputmodal.show();
    }
    function savedata() {
        var id = $('#hdnId').val();
        var titl = $('#txtTitle').val();
        var type = $('#txtType').val();
        var tags = $('#slcTag').val();
        var ktgr = $('#slcKategori').val();
        var banr = $('#filBanner').val();
        var thmb = $('#filThumbnail').val();
        var tgtp = $('#txtTanggalTampil').val();
        var cntn = quilldefaulteditor.getSemanticHTML();

        var data = new FormData();

        data.append('id', id);
        data.append('type', type);
        data.append('tag', tags);
        data.append('kategori', ktgr);
        data.append('title', titl);
        data.append('content', cntn);
        data.append('tanggal_tampil', tgtp);
        data.append('filebanner', $('#filBanner')[0].files[0]);
        data.append('filethumbnail', $('#filThumbnail')[0].files[0]);

        $.ajax({
            url: '/salamprofit/pages',
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

    function deldata(id) {
        if (confirm('Hapus Data?')) {
            $.ajax({
                type: "DELETE",
                url: "/salamprofit/pages/" + id,
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

    function openmultibannermodal(id) {
        $('#hdnId').val('');
        $.ajax({
            type: "GET",
            url: "/salamprofit/pages/" + id,
            success: function (response) {
                $('#hdnId').val(id);
                drawmultibanner(response)
                multibannermodal.show();
            }
        });
    }

    function savedatabanner() {
        var id = $('#hdnId').val();

        var data = new FormData();

        data.append('_method', 'PUT');
        data.append('urutan', $('#txtUrutanMultiBanner').val());
        data.append('filebanner', $('#filMultiBanner')[0].files[0]);
        

        $.ajax({
            url: '/salamprofit/pages/' + id,
            data: data,
            headers: {
                'X-CSRF-Token': csrf_token 
            },
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            success: function(data){
                drawmultibanner(data)
            },
            error: function(xhr){
                if (xhr.status == 401) {
                    alert(xhr.responseText);
                }
            }
        });
    }

    function delmultibanner(id) {
        if (confirm('Hapus Banner?')) {
            $.ajax({
                type: "PUT",
                url: '/salamprofit/pages/' + id,
                headers: {
                    'X-CSRF-Token': csrf_token 
                },
                data: {
                    deldat: 1
                },
                success: function (response) {
                    drawmultibanner(response)
                }
            });
        }
    }

    function drawmultibanner(d) {
        // $('#hdnId').val('')
        $('#filMultiBanner').val('').trigger('change');
        $('#txtUrutanMultiBanner').val(0)
        var h = '';
        d.forEach(e => {
            h += '<div>';
            h += '  <div class="alert alert-secondary show p-1" role="alert" style="background-size: contain; background-position: bottom; background-image: url(\'/recfil?display=true&rf=' + e.url + '\'); background-repeat: no-repeat; height: 130px;">';
            h += '      <div class="flex items-center">';
            h += '          <div class="text-xs bg-slate-500 px-1 rounded-md text-white mr-auto">Urutan: ' + e.urutan + '</div>';
            h += '          <div class="text-xs bg-danger px-1 rounded-md text-white ml-auto" onclick="delmultibanner(' + e.id + ')" style="cursor: pointer;">x</div>';
            h += '      </div>';
            h += '      <div class="mt-3"></div>';
            h += '  </div>';
            h += '</div>';
        });
        $('#pageMultBannerContainer').html(h);
    }
</script>
@endsection