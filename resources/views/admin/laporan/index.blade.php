{{-- @extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        LAPORAN
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
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
                                        <form action="/salamprofit/laporan" method="get">
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
                                                    <th>File</th>
                                                    <th>Tanggal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $v)
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>
                                                    <td>
                                                        {{$v->type_text}}
                                                    </td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="/recfil?display=true&rf={{$v->url}}" target="_blank"
                                                            title="Lihat PDF">
                                                            <i data-lucide="file-text"></i>
                                                        </a>
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="/recfil?display=true&rf={{$v->thumbnail}}"
                                                            target="_blank" title="Lihat Thumbnail">
                                                            <i data-lucide="maximize"></i>
                                                        </a>
                                                    </td>
                                                    <td>{{ date('d-m-Y', strtotime($v->tanggal)) }}</td>
                                                    <td>
                                                        <span class="btn btn-sm btn-warning"><i data-lucide="edit"
                                                                onclick="openinputmodal({{$v}})"></i></span>
                                                        <span class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/laporan/{{$v->id}}')"><i
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
            </div>
        </div>
    </div>
</div>


<div id="modalInputBanner" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="/salamprofit/laporan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Laporan</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input id="hdnId" name="id" type="hidden" class="form-control">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtType" class="form-label">Type</label>
                        <select id="txtType" name="type" class="form-control">
                            <option value=""></option>
                            <option value="0">Laporan Publikasi</option>
                            <option value="1">Laporan Tahunan</option>
                            <option value="2">Laporan Tata Kelola</option>
                            <option value="3">Laporan Keberlanjutan</option>
                            <option value="4">Laporan AKB</option>
                            <option value="5">Piagam Audit Internal</option>
                            <option value="6">Laporan Lainnya</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtNama" class="form-label">Judul</label>
                        <input id="txtNama" name="title" type="text" class="form-control">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="detStart" class="form-label">Tanggal</label>
                        <input id="detStart" type="date" name="tanggal" class="form-control" data-single-mode="true">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filDesktop" class="form-label">Thumbnail</label>
                        <input id="filDesktop" accept="image/*" type="file" name="thumbnail" class="form-control"
                            dat-showpreview="true">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filPdf" class="form-label">File PDF <a href="" target="_blank" id="lihatpdf" hidden>
                                | Lihat
                                Dokumen</a></label>
                        <input id="filPdf" accept="application/pdf" type="file" name="pdf" class="form-control">
                    </div>
                    <div class="col-span-12">
                        <hr>
                    </div>
                     <div class="col-span-12 sm:col-span-6">
                        <div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Publikasi file dan tanggal sesuaikan triwulannya</span></div>
                            <div class="flex items-center"><div class="w-2 h-2 bg-pending rounded-full mr-3"></div> <span>Besar File Maksimal 2MB</span></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div> 
            </form>
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
        $('#hdnId').val(null);
        $('#txtType').val(null);
        $('#txtNama').val(null);
        $('#detStart').val(null);
        $('#lihatpdf').attr('href', '#').attr('hidden', true);
        $('.showpreviewfile_1_0').remove();
        if (t) {
            $('#hdnId').val(t.id);
            $('#txtType').val(t.type);
            $('#txtNama').val(t.title);
            $('#detStart').val(t.tanggal);
            if (t.thumbnail) {
                if ($('img.showpreviewfile_0').length == 0) {
                    $('#filDesktop').parent().append('<img src="/recfil?rf=' + t.thumbnail + '" class="showpreviewfile_1_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                } else {
                    $('img.showpreviewfile_0').attr('src', '/recfil?rf=' + t.thumbnail);
                }
            }
            if (t.url) {
                $('#lihatpdf').attr('href', '/recfil?display=true&rf=' + t.url).removeAttr('hidden');
            }
        }
    }
</script>
@endsection --}}

@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: BANNER -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        LAPORAN
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary">
                        <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                    </a>
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
                                    <div class="col-span-12"><hr></div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <form action="/salamprofit/laporan" method="get">
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
                                                    <th>File</th>
                                                    <th>Tanggal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $v)
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>
                                                    <td>{{ $v->type_text }}</td>
                                                    <td>{{ $v->title }}</td>
                                                    <td>
                                                        {{-- Jika urls_json ada (mode pisah) --}}
                                                        @if ($v->urls_json)
                                                            @php
                                                                $labels = ['Keuangan','Laba Rugi','Aset','Komitmen','Lainnya'];
                                                                $keys   = ['keuangan','laba_rugi','aset','komitmen','lainnya'];
                                                            @endphp
                                                            @foreach ($keys as $ki => $key)
                                                                @if (!empty($v->urls_json[$key]))
                                                                    <a class="btn btn-secondary btn-sm mb-1"
                                                                        href="/recfil?display=true&rf={{ $v->urls_json[$key] }}"
                                                                        target="_blank"
                                                                        title="Lihat {{ $labels[$ki] }}">
                                                                        <i data-lucide="file-text"></i>
                                                                        <span class="ml-1 text-xs">{{ $labels[$ki] }}</span>
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{-- Mode gabung --}}
                                                            @if ($v->url)
                                                                <a class="btn btn-secondary btn-sm"
                                                                    href="/recfil?display=true&rf={{ $v->url }}"
                                                                    target="_blank" title="Lihat PDF">
                                                                    <i data-lucide="file-text"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                        @if ($v->thumbnail)
                                                            <a class="btn btn-secondary btn-sm"
                                                                href="/recfil?display=true&rf={{ $v->thumbnail }}"
                                                                target="_blank" title="Lihat Thumbnail">
                                                                <i data-lucide="maximize"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d-m-Y', strtotime($v->tanggal)) }}</td>
                                                    <td>
                                                        <span class="btn btn-sm btn-warning">
                                                            <i data-lucide="edit" onclick="openinputmodal({{ $v }})"></i>
                                                        </span>
                                                        <span class="btn btn-sm btn-danger"
                                                            onclick="confirmdelete('/salamprofit/laporan/{{ $v->id }}')">
                                                            <i data-lucide="trash"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-span-12"><hr></div>
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
            <form action="/salamprofit/laporan" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Laporan</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input id="hdnId" name="id" type="hidden" class="form-control">

                    {{-- Type --}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtType" class="form-label">Type</label>
                        <select id="txtType" name="type" class="form-control" onchange="onTypeChange(this.value)">
                            <option value=""></option>
                            <option value="0">Laporan Publikasi</option>
                            <option value="1">Laporan Tahunan</option>
                            <option value="2">Laporan Tata Kelola</option>
                            <option value="3">Laporan Keberlanjutan</option>
                            <option value="4">Laporan AKB</option>
                            <option value="5">Piagam Audit Internal</option>
                            <option value="6">Laporan Lainnya</option>
                        </select>
                    </div>

                    {{-- Judul --}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="txtNama" class="form-label">Judul</label>
                        <input id="txtNama" name="title" type="text" class="form-control">
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="detStart" class="form-label">Tanggal</label>
                        <input id="detStart" type="date" name="tanggal" class="form-control" data-single-mode="true">
                    </div>

                    {{-- Thumbnail --}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="filDesktop" class="form-label">Thumbnail</label>
                        <input id="filDesktop" accept="image/*" type="file" name="thumbnail" class="form-control"
                            dat-showpreview="true">
                    </div>

                    {{-- ===== BAGIAN PUBLIKASI: toggle Pisah/Gabung ===== --}}
                    <div id="rowModePublikasi" class="col-span-12" style="display:none;">
                        <label class="form-label font-semibold">Mode Upload PDF (Laporan Publikasi)</label>
                        <div class="flex gap-4 mt-1">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="publikasi_mode" id="modeGabung" value="gabung" checked
                                    onchange="onModeChange('gabung')">
                                <span>Gabung (1 File)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="publikasi_mode" id="modePisah" value="pisah"
                                    onchange="onModeChange('pisah')">
                                <span>Pisah (5 File)</span>
                            </label>
                        </div>
                    </div>

                    {{-- ===== MODE GABUNG: 1 PDF ===== --}}
                    <div id="rowPdfGabung" class="col-span-12 sm:col-span-6">
                        <label for="filPdf" class="form-label">
                            File PDF
                            <a href="" target="_blank" id="lihatpdf" hidden>| Lihat Dokumen</a>
                        </label>
                        <input id="filPdf" accept="application/pdf" type="file" name="pdf" class="form-control">
                    </div>

                    {{-- ===== MODE PISAH: 5 PDF ===== --}}
                    <div id="rowPdfPisah" class="col-span-12 sm:col-span-6" style="display:none;">
                        <div class="grid grid-cols-12 gap-4">
                            @php
                                $pisahFiles = [
                                    ['key' => 'pdf_keuangan',  'label' => 'Keuangan',  'id' => 'lihatpdf_keuangan'],
                                    ['key' => 'pdf_laba_rugi', 'label' => 'Laba Rugi', 'id' => 'lihatpdf_laba_rugi'],
                                    ['key' => 'pdf_aset',      'label' => 'Aset',       'id' => 'lihatpdf_aset'],
                                    ['key' => 'pdf_komitmen',  'label' => 'Komitmen',   'id' => 'lihatpdf_komitmen'],
                                    ['key' => 'pdf_lainnya',   'label' => 'Lainnya',    'id' => 'lihatpdf_lainnya'],
                                ];
                            @endphp
                            @foreach ($pisahFiles as $pf)
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">
                                    PDF {{ $pf['label'] }}
                                    <a href="#" target="_blank" id="{{ $pf['id'] }}" style="color: blue"  hidden >| Lihat </a>
                                </label>
                                <input accept="application/pdf" type="file" name="{{ $pf['key'] }}"
                                    class="form-control">
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-12"><hr></div>
                    <div class="col-span-12 sm:col-span-6">
                        <div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span>Publikasi file dan tanggal sesuaikan triwulannya</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span>Besar File Maksimal 2MB</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div>
                <!-- END: Modal Footer -->
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

    /** Dipanggil saat select Type berubah */
    function onTypeChange(val) {
        if (val == '0') {
            $('#rowModePublikasi').show();
            // trigger agar tampilan PDF sinkron dengan radio aktif
            const mode = $('input[name="publikasi_mode"]:checked').val() || 'gabung';
            onModeChange(mode);
        } else {
            $('#rowModePublikasi').hide();
            // selalu tampilkan gabung untuk type lain
            $('#rowPdfGabung').show();
            $('#rowPdfPisah').hide();
        }
    }

    /** Dipanggil saat radio Pisah/Gabung berubah */
    function onModeChange(mode) {
        if (mode === 'pisah') {
            $('#rowPdfGabung').hide();
            $('#rowPdfPisah').show();
        } else {
            $('#rowPdfGabung').show();
            $('#rowPdfPisah').hide();
        }
    }

    function openinputmodal(t) {
        inputmodal.show();

        // Reset semua field
        $('#hdnId').val(null);
        $('#txtType').val(null);
        $('#txtNama').val(null);
        $('#detStart').val(null);
        $('#lihatpdf').attr('href', '#').attr('hidden', true);
        $('.showpreviewfile_1_0').remove();

        // Reset ke mode gabung
        $('#modeGabung').prop('checked', true);
        $('#rowModePublikasi').hide();
        $('#rowPdfGabung').show();
        $('#rowPdfPisah').hide();

        // Reset link lihat pisah
        ['keuangan','laba_rugi','aset','komitmen','lainnya'].forEach(function(k) {
            $('#lihatpdf_' + k).attr('href', '#').attr('hidden', true);
        });

        if (t) {
            $('#hdnId').val(t.id);
            $('#txtType').val(t.type);
            $('#txtNama').val(t.title);
            $('#detStart').val(t.tanggal);

            // Thumbnail preview
            if (t.thumbnail) {
                if ($('img.showpreviewfile_0').length == 0) {
                    $('#filDesktop').parent().append(
                        '<img src="/recfil?rf=' + t.thumbnail + '" class="showpreviewfile_1_0 mt-2" style="width:100%;max-height:130px;max-width:130px;">'
                    );
                } else {
                    $('img.showpreviewfile_0').attr('src', '/recfil?rf=' + t.thumbnail);
                }
            }

            // Tampilkan mode jika Laporan Publikasi
            if (t.type == 0) {
                $('#rowModePublikasi').show();

                // Cek apakah data pakai pisah (ada urls_json)
                if (t.urls_json && typeof t.urls_json === 'object' && Object.keys(t.urls_json).length > 0) {
                    // Mode pisah
                    $('#modePisah').prop('checked', true);
                    onModeChange('pisah');

                    var urlKeys = { keuangan: 'keuangan', laba_rugi: 'laba_rugi', aset: 'aset', komitmen: 'komitmen', lainnya: 'lainnya' };
                    Object.keys(urlKeys).forEach(function(k) {
                        if (t.urls_json[k]) {
                            $('#lihatpdf_' + k)
                                .attr('href', '/recfil?display=true&rf=' + t.urls_json[k])
                                .removeAttr('hidden');
                        }
                    });
                } else {
                    // Mode gabung
                    $('#modeGabung').prop('checked', true);
                    onModeChange('gabung');
                    if (t.url) {
                        $('#lihatpdf').attr('href', '/recfil?display=true&rf=' + t.url).removeAttr('hidden');
                    }
                }
            } else {
                // Type lain, tampilkan link PDF biasa
                if (t.url) {
                    $('#lihatpdf').attr('href', '/recfil?display=true&rf=' + t.url).removeAttr('hidden');
                }
            }
        }
    }
</script>
@endsection