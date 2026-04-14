<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan WBS</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            line-height: 1.6;
            color: #000;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }

        .header small {
            font-size: 12px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 6px;
        }

        .label {
            font-weight: bold;
            width: 30%;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: right;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            font-size: 13px;
            border-top: 1px solid #000;
            padding-top: 8px;
        }

        .bukti-img {
            width: 100px;
            height: auto;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

    {{-- Header Perusahaan --}}
    <div class="header">
       <h1>BPR {{ env('APP_NAME') }}</h1>
        <small>Laporan Whistleblowing System</small>
    </div>

    {{-- Tabel Isi 2 Kolom --}}
    <table>
        <tr>
            <td class="label">Bersedia Memberikan Identitas:</td>
            <td>{{ $data->bersedia_identitas }}</td>
        </tr>
        
        @if($data->bersedia_identitas === 'Ya')
        <tr>
            <td class="label">Nama Pelapor:</td>
            <td>{{ $data->nama_pelapor }}</td>
        </tr>
        <tr>
            <td class="label">No Telepon:</td>
            <td>{{ $data->hp_pelapor }}</td>
        </tr>
        @endif

        <tr>
            <td class="label">Kategori Pelanggaran:</td>
            <td>{{ $data->kategori_pelanggaran }}</td>
        </tr>
        <tr>
            <td class="label">Nama Pihak Dilaporkan:</td>
            <td>{{ $data->nama_terlapor }}</td>
        </tr>
        <tr>
            <td class="label">Jabatan:</td>
            <td>{{ $data->jabatan_terlapor }}</td>
        </tr>
        <tr>
            <td class="label">Lokasi Kejadian:</td>
            <td>{{ $data->lokasi }}</td>
        </tr>
        <tr>
            <td class="label">Waktu Kejadian:</td>
            <td>{{ \Carbon\Carbon::parse($data->waktu)->format('d M Y, H:i') }}</td>
        </tr>
        <tr>
             <td class="label">Deskripsi</td>
             <td>{{ $data->deskripsi }}</td>
        </tr>
    </table>
    


    {{-- Bukti-bukti --}}
    <div class="section-title">Lampiran Bukti:</div>
    <table>
        <tr>
            <td style="width:33%;" style="text-align:center">
                @if($data->bukti) 
                    <br>
                  <img src="{{ storage_path('app/public/' . $data->bukti) }}" class="bukti-img" style="width:200px; height:200px; ">
                @endif
            </td>
            
        </tr>
    </table>



    {{-- Footer --}}
    <div class="footer" style="text-align:left;">
        Diunduh pada: {{ now()->format('d M Y H:i') }}<br>

    </div>

</body>
</html>
