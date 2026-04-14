@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        SEO SETTING
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
                                        <form action="/salamprofit/seo-setting" method="get">
                                            <div class="input-group">
                                                <input type="date" name="str" class="form-control" value=""
                                                    data-single-mode="true">
                                                <div class="input-group-text">-</div>
                                                <input type="date" name="end" class="form-control" value=""
                                                    data-single-mode="true">
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
                                                    <th>Deskripsi</th>
                                                    <th>Image</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $v)
                                                <tr>
                                                    <td>{{ ($k + 1) }}</td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>{{ $v->description }}</td>
                                                    <td><a href="/recfil?display=true&rf={{$v->image}}" target="_blank">
                                                            <i data-lucide="image"></i></a></td>
                                                    <td>
                                                        <button onclick="openinputmodal({{$v}})" type="button"
                                                            class="btn btn-sm btn-warning">
                                                            <i data-lucide="edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/seo-setting/{{ $v->id }}')">
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
            <form action="/salamprofit/seo-setting" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">SEO SETTING</h2>
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
                        <label for="txtDescription" class="form-label">Description</label>
                        <textarea id="txtDescription" name="description" type="text" class="form-control"></textarea>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtImage" class="form-label">Image</label>
                        <input id="txtImage" name="image" type="file" class="form-control" accept="image/*"
                            dat-showpreview="true">
                    </div>
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
    });
    function openinputmodal(t) {
        inputmodal.show();
        $('#hdnId').val(null);
        $('#txtTitle').val(null);
        $('#txtDescription').val(null);
        $('#txtImage').val(null);
        if (t != null) {
            $('#hdnId').val(t.id);
            $('#txtTitle').val(t.title);
            $('#txtDescription').val(t.description);
            if (t.image) {
                if ($('img.showpreviewfile_1_0').length == 0) {
                    $('#txtImage').parent().append('<img src="/recfil?rf=' + t.image + '" class="showpreviewfile_1_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                } else {
                    $('img.showpreviewfile_1_0').attr('src', '/recfil?rf=' + t.image);
                }
            }
        }
    }
</script>
@endsection