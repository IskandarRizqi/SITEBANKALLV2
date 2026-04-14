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
        TAHUN {{ $year }}
    </h3>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">LAMAN</th>
                <th rowspan="2">LINK</th>
                <th colspan="12">Trafik Berdasarkan Bulan</th>
                <th rowspan="2">TOTAL</th>
            </tr>
            <tr>
                @foreach ($months as $m)
                    <th>{{ $m }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @php
                $no = 1;
                $grandTotal = 0;
                $monthlyTotals = array_fill(1, 12, 0);
            @endphp

            @foreach ($pages as $page)
                @php
                    $rowTotal = array_sum($page['data']);
                    $grandTotal += $rowTotal;

                    foreach ($page['data'] as $month => $val) {
                        $monthlyTotals[$month] += $val;
                    }
                @endphp
                <tr>
                    <td align="center">{{ $no++ }}</td>
                    <td>{{ strtoupper($page['label']) }}</td>
                    <td style="font-size:10px;">{{ $page['link'] }}</td>

                    
                    @for ($m = 1; $m <= 12; $m++)
                        <td align="center">{{ $page['data'][$m] }}</td>
                    @endfor

                    <td align="center"><b>{{ $rowTotal }}</b></td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr style="font-weight:bold; background:#f2f2f2;">
                <td colspan="3" align="center">TOTAL</td>

                @for ($m = 1; $m <= 12; $m++)
                    <td align="center">{{ $monthlyTotals[$m] }}</td>
                @endfor

                <td align="center">{{ $grandTotal }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="page-break"></div>
    <br>
    <br>

    {{-- <h4 style="margin:5px 0 2px 0; font-size:13px;">Keterangan:</h4> --}}
    <p style="margin-bottom:20px; font-size: 15px;">
        <b>A. Halaman Menu Utama website yang paling sering diakses</b>
      
    </p>

    <table width="100%">
        <tr>
            <!-- CHART 50% -->
            <td width="50%" align="center">
                <img src="{{ $chartUrl }}" width="350">
            </td>

            <!-- TABLE 50% -->
            <td width="50%" valign="top">
                <table border="1" width="100%" cellpadding="5"  style="margin-top: 30px;">
                    <thead>
                        <tr style="background:#f2c200;">
                            <th width="15%">WARNA</th>
                            <th>HALAMAN</th>
                            <th width="20%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topPages as $page)
                            <tr>
                                <td align="center">
                                    <div
                                        style="
                                    width:15px;
                                    height:15px;
                                    background:{{ $page['color'] }};
                                    margin:auto;">
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

    <br>
    <br>
    <p style="margin:0 0 5px 0; font-size:15px;">
        <b>B. Total Pengunjung </b>
        
    </p>

   <div style="text-align:center; margin-bottom:20px;">
    <img src="{{ $lineChartUrl }}" style="width:100%; height:auto;">
</div>


</body>

</html>
