@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        PROFILE
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
                                                    <th>Type</th>
                                                    <th>Title</th>
                                                    <th>Urutan</th>
                                                    <th>Tag</th>
                                                    <th>Kategori</th>
                                                    <th>Gambar | Thumbnail</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($profile as $k => $v)
                                                <tr>
                                                    <td>{{ ($k + 1) }}</td>
                                                    <td>{{ $v->type_text }}</td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>{{ $v->urutan }}</td>
                                                    <td>
                                                        @foreach($v->tags as $key => $t)
                                                        <span>{{$t}}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($v->kategoris as $key => $k)
                                                        <span>{{$k}}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="/recfil?display=true&rf={{ urlencode($v->banner) }}"
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
                                                        <button onclick="openinputmodal({{$v}})" type="button"
                                                            class="btn btn-sm btn-warning">
                                                            <i data-lucide="edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/profile/{{ $v->id }}')">
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
            <form action="/salamprofit/profile" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Profile</h2>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                  <input type="text" name="id" id="hdnId" hidden>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtType" class="form-label">Type</label>
                        <select id="txtType" name="type" class="form-control">
                            <option value=""></option>
                            <option value="0">Profile</option>
                            <option value="1">Sejarah</option>
                            <option value="2">Pengurus</option>
                            <option value="3">Struktur Organisasi</option>
                            <option value="4">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtTitle" class="form-label">Judul</label>
                        <input id="txtTitle" name="title" type="text" class="form-control">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtUrutan" class="form-label">Urutan</label>
                        <input id="txtUrutan" name="urutan" type="number" class="form-control" min="1" step="1">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="slcTag" class="form-label">Tag</label>
                        <select id="slcTag" data-header="Pilih/Tambah Tag" name="tag[]" class="tom-select w-full"
                            multiple>
                            @foreach ($tag as $v)
                            <option value="{{$v}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtKat" class="form-label">Kategori</label>
                        <select id="txtKat" data-header="Pilih/Tambah Kategori" name="kategori[]"
                            class="tom-select w-full" multiple>
                            @foreach ($kategori as $k)
                            <option value="{{$k}}">{{$k}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="fileBanner" class="form-label">Banner</label>
                        <input id="fileBanner" accept="image/*" type="file" name="banner" class="form-control"
                            dat-showpreview="true">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="fileThumbnail" class="form-label">Thumbnail</label>
                        <input id="fileThumbnail" accept="image/*" type="file" name="thumbnail" class="form-control"
                            dat-showpreview="true">
                    </div>
                    <div class="col-span-12">
                        <hr>
                    </div>
                    <div class="col-span-12 mb-8">
                        <div id="quilldefaulteditor"></div>
                    </div>
                    <textarea name="content" id="content" hidden></textarea>

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
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputBanner"));
        // $('#slcTag').select2();
        $('#quilldefaulteditor').on('blur change keyup paste click input', function () {
            let q = $(this);
            $('#content').val($('.ql-editor').html());
            console.log('content', $('#content').val());
        });
        
    });
    function openinputmodal(t) {
        inputmodal.show();
        $('#hdnId').val('');
        $('#txtType').val('');
        $('#txtTitle').val('');
        $('#txtUrutan').val('1');
        $('#slcTag').val([]).trigger('change');
        $('#txtKat').val([]).trigger('change');
        $('#fileBanner').val('');
        $('#fileThumbnail').val('');
        // $('#quilldefaulteditor').html('');
        if (t) {
            console.log('t', t);
            $('#hdnId').val(t.id);
            $('#txtType').val(t.type);
            $('#txtTitle').val(t.title);
            $('#txtUrutan').val(t.urutan);
            // $('#slcTag').val(t.tags).trigger('change');
            // $('#txtKat').val(t.kategoris).trigger('change');
            document.querySelector('#slcTag').tomselect.setValue(t.tags);
            document.querySelector('#txtKat').tomselect.setValue(t.kategoris);
            quilldefaulteditor.root.innerHTML = t.content;
            if (t.banner) {
                if ($('img.showpreviewfile_0_0').length == 0) {
                    $('#fileBanner').parent().append('<img src="/recfil?rf=' + t.banner + '" class="showpreviewfile_0_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                } else {
                    $('img.showpreviewfile_0_0').attr('src', '/recfil?rf=' + t.banner);
                }
            }
            if (t.thumbnail) {
                if ($('img.showpreviewfile_1_0').length == 0) {
                    $('#fileThumbnail').parent().append('<img src="/recfil?rf=' + t.thumbnail + '" class="showpreviewfile_1_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                } else {
                    $('img.showpreviewfile_1_0').attr('src', '/recfil?rf=' + t.thumbnail);
                }
            }
        }
    }
</script>
@endsection