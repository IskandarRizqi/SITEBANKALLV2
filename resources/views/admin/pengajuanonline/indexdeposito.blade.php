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
                        Pengajuan Deposito
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
                                    
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-2">
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
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
                                    </div>
                                    <div class="col-span-12">
                                        <table id="datatabledefault">
                                             <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No.Registrasi</th>
                                                    <th>Tgl. Pengajuan</th>
                                                    {{-- <th>Jenis Deposito</th> --}}
                                                    <th>Nama</th>
                                                    <th>No_Hp</th>
                                                    <th>Nominal Deposito</th>
                                                    <th>Jangka Waktu</th>          
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($deposito as $key => $v)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$v->no_registrasi }}</td>
                                                    <td>{{ $v->created_at->format('d-m-Y') }}</td>
                                                    {{-- <td>{{ $v->Jns_depo }}</td> --}}
                                                    <td>{{$v->nm_lengkap}}</td>
                                                    <td>{{$v->no_hp}}</td>
                                                    <td>Rp. {{$v->nml_depo}} </td>
                                                    <td>{{$v->jngka_wkt}} Bulan</td>
                                                    
                                                   
                                                    <td>
                                                       <a href="{{ route('formdeposito.download', $v->id) }}" target="_blank" class="btn btn-sm btn-primary">
                                                              <i data-lucide="eye"></i>
                                                        </a>
                                                       
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


@endsection