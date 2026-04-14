@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Data Lamaran
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
                                   
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-2">
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/rekruitmen-data" method="get">
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
                                                    <th>Email</th>
                                                    <th>Tanggal</th>
                                                    <th>Melamar</th>
                                                    <th>CV</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($banner as $k => $v)  
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
                                                @endforeach --}}
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