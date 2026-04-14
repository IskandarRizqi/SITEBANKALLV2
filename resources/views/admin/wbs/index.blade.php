@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Report WBS
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
                                      
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-2">
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/wbs" method="get">
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
                                                    <th>Jabatan</th>
                                                    <th>Lokasi</th>
                                                    <th>Waktu</th>
                                                    <th>Pelanggaran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach($wbs as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}
                                                        <td>{{ $item->jabatan_terlapor }}</td>
                                                        <td>{{ $item->lokasi }}</td>
                                                        <td>{{ $item->waktu }}</td>
                                                        <td>{{ $item->kategori_pelanggaran }}</td>
                                                        <td>
                                                            <a href="{{ route('wbs.download', $item->id) }}" class="btn btn-sm btn-primary">
                                                                Download PDF
                                                            </a>
                                    
                                                            <form id="delete-form-{{ $item->id }}" action="{{ route('wbs.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $item->id }})">
                                                                    Hapus
                                                                </button>
                                                            </form>
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


<script>
    var inputmodal;
    $(document).ready(function () {
        inputmodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#modalInputBanner"));
        // $('#slcTag').select2();
    });
    function openinputmodal(t) {
        inputmodal.show();
    }
</script>
@endsection