@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        WEBSITE
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
                                        <form action="/salamprofit/WEBSITE" method="get">
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
                                                    <th>Kategori</th>
                                                    <th>Type</th>
                                                    <th>Title</th>
                                                    <th>Url</th>
                                                    <th>Icon</th>
                                                    <th>Urutan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $v)
                                                <tr>
                                                    <td>{{ ($k + 1) }}</td>
                                                    <td>{{ $v->category_text }}</td>
                                                    <td>{{ $v->type_text }}</td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>{{ $v->url }}</td>
                                                    <td>{{ $v->icon }}</td>
                                                    <td>{{ $v->urutan }}</td>
                                                    <td>
                                                        <button onclick="openinputmodal({{$v}})" type="button"
                                                            class="btn btn-sm btn-warning">
                                                            <i data-lucide="edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/website/{{ $v->id }}')">
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
            <form action="/salamprofit/website" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">WEBSITE</h2>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input id="hdnId" name="id" type="hidden" class="form-control">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtCategory" class="form-label">Category</label>
                        <select id="txtCategory" name="category" class="form-control">
                            <option value=""></option>
                            <option value="0">Contact</option>
                            <option value="1">Sosmed</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtType" class="form-label">Type</label>
                        <select id="txtType" name="type" class="form-control">
                            <option value=""></option>
                            <option value="0">Email</option>
                            <option value="1">Phone</option>
                            <option value="2">Mobile</option>
                            <option value="3">Whatsapp</option>
                            <option value="4">Facebook</option>
                            <option value="5">X</option>
                            <option value="6">Instagram</option>
                            <option value="7">Youtube</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtTitle" class="form-label">Title</label>
                        <input id="txtTitle" name="title" type="text" class="form-control">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtUrl" class="form-label">URL</label>
                        <input id="txtUrl" name="url" type="text" class="form-control">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtIcon" class="form-label">Icon</label>
                        <input id="txtIcon" name="icon" type="text" class="form-control">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtUrutan" class="form-label">Urutan</label>
                        <input id="txtUrutan" name="urutan" type="number" class="form-control">
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
        $('#txtCategory').val(null);
        $('#txtType').val(null);
        $('#txtTitle').val(null);
        $('#txtUrl').val(null);
        $('#txtIcon').val(null);
        $('#txtUrutan').val(null);
        if (t != null) {
            $('#hdnId').val(t.id);
            $('#txtCategory').val(t.category);
            $('#txtType').val(t.type);
            $('#txtTitle').val(t.title);
            $('#txtUrl').val(t.url);
            $('#txtIcon').val(t.icon);
            $('#txtUrutan').val(t.urutan);            
        }
    }
</script>
@endsection