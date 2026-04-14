<?php

namespace App\Exports;

use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MontlyExportExcel implements FromView, WithColumnWidths, WithStyles
{
    protected $year;
    protected $month;
    protected $baseUrl;

    public function __construct($year, $month, $baseUrl = 'http://127.0.0.1:8000/')
    {
        $this->year = $year;
        $this->month = $month;
        $this->baseUrl = $baseUrl;
    }

    public function view(): View
    {
        // Ambil data pengunjung per halaman per hari untuk bulan tertentu
        $visitors = Visitor::selectRaw("
            DAY(visited_at) as day,
            TRIM(BOTH '/' FROM
                SUBSTRING_INDEX(
                    SUBSTRING_INDEX(page_url, '://', -1),
                    '/', -1
                )
            ) as page,
            page_url as url,
            COUNT(DISTINCT ip_address) as total
        ")
            ->whereYear('visited_at', $this->year)
            ->whereMonth('visited_at', $this->month)
            ->whereNotNull('page_url')
            ->where('page_url', 'NOT LIKE', '%.php%')
            ->where('page_url', 'NOT LIKE', '%/recfil%')
            ->groupByRaw('DAY(visited_at), page, page_url')
            ->orderByRaw('DAY(visited_at), page')
            ->get();

        // Kelompokkan data berdasarkan halaman
        $pagesData = [];
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        
        // Inisialisasi array untuk semua halaman
        foreach ($visitors as $visitor) {
            $pageName = $visitor->page ?: 'BERANDA'; // Default ke BERANDA jika kosong
            if (!isset($pagesData[$pageName])) {
                $pagesData[$pageName] = [
                    'name' => $pageName,
                    'url' => $visitor->url,
                    'days' => array_fill(1, $daysInMonth, 0)
                ];
            }
            
            // Isi data untuk hari tersebut
            $pagesData[$pageName]['days'][$visitor->day] = $visitor->total;
        }

        // Urutkan halaman berdasarkan nama
        ksort($pagesData);

        // Nama bulan dalam bahasa Indonesia
        $monthNames = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return view('admin.dashboard.exportmontly', [
            'pagesData' => $pagesData,
            'daysInMonth' => $daysInMonth,
            'monthName' => $monthNames[$this->month],
            'year' => $this->year,
            'baseUrl' => $this->baseUrl
        ]);
    }

    public function columnWidths(): array
    {
        $widths = ['A' => 5, 'B' => 20, 'C' => 30]; // NO, LAMAN, LINK
        
        // Tambahkan lebar untuk kolom trafik (hingga 31 hari)
        for ($i = 1; $i <= 31; $i++) {
            $widths[chr(67 + $i)] = 5; // Dimulai dari D
        }
        
        return $widths;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => 'E1E5F2']
                ]
            ],
            // Style untuk kolom NO
            'A' => [
                'alignment' => ['horizontal' => 'center']
            ],
            // Style untuk kolom trafik
            'D:AG' => [
                'alignment' => ['horizontal' => 'center']
            ]
        ];
    }
}