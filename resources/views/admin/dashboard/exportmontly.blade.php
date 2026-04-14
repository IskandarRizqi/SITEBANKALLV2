<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Kinerja Website</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            padding: 4px;
        }

        th {
            background: #ffd900;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    <h3 style="text-align:center; font-size:15px; margin-bottom:30px;">
        LAPORAN KINERJA WEBSITE BANK <br>
        {{ env('APP_NAME') }}<br>
        BULAN {{ strtoupper($month) }} {{ $year }}
    </h3>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">LAMAN</th>
                <th rowspan="2">LINK</th>
                <th colspan="{{ $days }}">Trafik Berdasarkan Tanggal</th>
                <th rowspan="2">TOTAL <br> PERBULAN</th>
            </tr>
            <tr>
                @for ($i = 1; $i <= $days; $i++)
                    <th>{{ $i }}</th>
                @endfor
            </tr>
        </thead>

        <tbody>
            @php
                $no = 1;
                $grandTotal = 0;
                $dailyTotals = array_fill(1, $days, 0);
            @endphp

            @foreach ($pages as $page => $item)
                @php
                    $rowTotal = array_sum($item['data']);
                    $grandTotal += $rowTotal;

                    foreach ($item['data'] as $d => $val) {
                        $dailyTotals[$d] += $val;
                    }
                @endphp
                <tr>
                    <td align="center">{{ $no++ }}</td>
                    <td>{{ strtoupper($item['label']) }}</td>
                    <td style="font-size:10px;">{{ $item['link'] }}</td>
                    @php
                        $trafikWidth = 60 / $days; // 60% area khusus untuk kolom tanggal
                    @endphp

                    @for ($d = 1; $d <= $days; $d++)
                        <td align="center" width="{{ $trafikWidth }}%">
                            {{ $item['data'][$d] }}
                        </td>
                    @endfor


                    <td align="center"><b>{{ $rowTotal }}</b></td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr style="font-weight:bold; background:#f2f2f2;">
                <td colspan="3" align="center">TOTAL</td>

                @for ($d = 1; $d <= $days; $d++)
                    <td align="center">{{ $dailyTotals[$d] }}</td>
                @endfor

                <td align="center">{{ $grandTotal }}</td> {{-- INI YANG KURANG --}}
            </tr>
        </tfoot>


    </table>
    <div class="page-break"></div>

    <br>
    <br>
    {{-- <h4 style="margin:5px 0 2px 0; font-size:13px;">Keterangan:</h4> --}}
    <p style="margin-bottom:20px; font-size: 15px;">
        <b>A.  Halaman Menu Utama website yang paling sering diakses</b>
        
    </p>

    <!-- LAYOUT 50:50 -->
    <table width="100%">
        <tr>
            <!-- CHART 50% -->
            <td width="50%" align="center">
                <img src="{{ $chartUrl }}" width="350">
            </td>

            <!-- TABLE 50% -->
            <td width="50%" valign="center">
                <table border="1" width="100%" cellpadding="5" style="margin-top: 30px;">
                    <thead>
                        <tr style="background:#f2c200;">
                            <th width="15%">WARNA</th>
                            <th>HALAMAN</th>
                            <th width="20%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topPages as $i => $page)
                            <tr>
                                <td align="center">
                                    <div
                                        style="
                                    width:15px;
                                    height:15px;
                                    background:{{ $page['color'] }};
                                    margin:auto;
                                ">
                                    </div>
                                </td>
                                <td>{{ strtoupper($page['label']) }}</td>
                                <td align="center"><b>{{ $page['total'] }}</b></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    {{-- <div class="page-break"></div> --}}
    <br>

    <p style="margin-bottom:20px; font-size: 15px;">
        <b>B. Total Pengunjung</b>
     
    </p>
   <div style="text-align:center; margin-bottom:20px;">
    
    <img src="{{ $lineChartUrl }}" style="width:100%; height:auto;">
</div>



</body>

</html>
