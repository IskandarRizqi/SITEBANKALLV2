<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pengajuan Online Deposito</title>
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
            font-size: 15px;
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
       <h1>{{ env('APP_NAME') }}</h1>
        <small style="font-size: 15px">Laporan Pengajuan Deposito</small>
    </div>

    {{-- Tabel Isi 2 Kolom --}}
    <table>
        <tr>
            <td class="label">No. Registrasi:</td>
            <td>{{ $data->no_registrasi }}</td>
        </tr>
        <tr>
            <td class="label">Nama Pemohon:</td>
            <td>{{ $data->nm_lengkap }}</td>
        </tr>

        <tr>
            <td class="label">NO. KTP</td>
            <td>{{ $data->no_ktp }}</td>
        </tr>
        <tr>
            <td class="label">No. Handphone:</td>
            <td>{{ $data->no_hp }}</td>
        </tr>
        <tr>
            <td class="label">Email:</td>
            <td>{{ $data->email }}</td>
        </tr>
       
        <tr>
             <td class="label">Alamat</td>
             <td>{{ $data->alamat }}</td>
        </tr>
        <tr>
             <td class="label">Nominal Deposito</td>
             <td>Rp {{ number_format($data->nmnl_depo, 0, ',', '.') }}</td>
        </tr>
         <tr>
             <td class="label">Jangka Waktu</td>
             <td>{{ $data->jngka_wkt }} Bulan</td>
        </tr>
        <tr>
             <td class="label">Sumber Dana</td>
            <td>{{ $data->sumber_dn }}</td>

        </tr>
         <tr>
             <td class="label">Rekening Pencairan</td>
            <td>{{ $data->rek_pencairan }}</td>

        </tr>
       
        <tr>
             <td class="label">Catatan Tambahan</td>
             <td>{{ $data->cat_tmbhn }}</td>
        </tr>
    </table>
    




    {{-- Footer --}}
    <div class="footer" style="text-align:left;">
        Diunduh pada: {{ now()->format('d M Y H:i') }}<br>

    </div>

</body>
</html>
