@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: BANNER -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            USER PENGGUNA
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
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Role Akses</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user as $k => $v)
                                                        <tr>
                                                            <td>{{ $k + 1 }}</td>
                                                            <td>{{ $v->name }}</td>
                                                            <td>{{ $v->email }}</td>
                                                            <td>
                                                                @if ($v->role == 0)
                                                                    Admin
                                                                @elseif($v->role == 1)
                                                                    Pengguna
                                                                @else
                                                                    Tidak diketahui
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <button onclick="openinputmodal({{ $v }})"
                                                                    type="button" class="btn btn-sm btn-warning">
                                                                    <i data-lucide="edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="confirmdelete('/salamprofit/user/{{ $v->id }}')">
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
                <form action="/salamprofit/user" method="post" enctype="multipart/form-data">
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
                            <label for="txtname" class="form-label">Nama Pengguna</label>
                            <input id="txtname" name="name" type="text" class="form-control">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtemail" class="form-label">Email</label>
                            <input id="txtemail" name="email" type="text" class="form-control">
                        </div>


                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtpasword" class="form-label">Password</label>
                            <input id="txtpasword" name="password" type="text" class="form-control">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="txtreg_pasword" class="form-label">Konfirmasi Password</label>
                            <input id="txtreg_pasword" name="password_confirmation" type="text" class="form-control">
                        </div>

                        {{-- <div class="col-span-12 sm:col-span-6">
                        <label for="txtType" class="form-label">Role</label>
                        <select id="txtType" name="type" class="form-control">
                            <option value=""></option>
                            <option value="0">root</option>
                            <option value="1">Pengguna</option>
                           
                        </select>
                    </div> --}}

                    </div>

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

        $(document).ready(function() {
            inputmodal = tailwind.Modal.getOrCreateInstance(
                document.querySelector("#modalInputBanner")
            );
        });

        function openinputmodal(t = null) {

            inputmodal.show();

            // reset
            $('#hdnId').val('');
            $('#txtname').val('');
            $('#txtemail').val('');
            $('#txtpasword').val('');
            $('#txtreg_pasword').val('');

            if (t) {
                $('#hdnId').val(t.id);
                $('#txtname').val(t.name);
                $('#txtemail').val(t.email);
            }
        }
    </script>
@endsection
