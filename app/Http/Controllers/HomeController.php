<?php

namespace App\Http\Controllers;

use App\Exports\MontlyExportExcel;
use App\Models\PengaduanModel;
use App\Models\PengajuanModel;
use App\Models\ProdukLayananModel;
use App\Models\WbsModel;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // ================= VISITOR =================
        $year = $request->get('year', date('Y'));
        $currentMonth = date('n');
        $currentYear = date('Y');

        // =================  ADMIN ROOT TIDAK DIHITUNG =================

        // role = 0 adalah admin root
        // $adminIp = (auth()->check() && auth()->user()->role == 0)
        //     ? $request->ip()
        //     : null;
        $adminIp = null;


        // ================= VISITOR PER BULAN =================
        $visitorPerMonth = Visitor::selectRaw('MONTH(visited_at) as month, COUNT(DISTINCT ip_address) as total')
            ->whereYear('visited_at', $year)
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->groupByRaw('MONTH(visited_at)')
            ->pluck('total', 'month')
            ->toArray();

        $dataVisitor = [];
        for ($m = 1; $m <= 12; $m++) {
            $dataVisitor[] = isset($visitorPerMonth[$m]) ? (int) $visitorPerMonth[$m] : 0;
        }

        // ================= TOTAL VISITOR (UNIQUE IP) =================
        $data['visitor'] = Visitor::when($adminIp, function ($q) use ($adminIp) {
            $q->where('ip_address', '!=', $adminIp);
        })
            ->distinct('ip_address')
            ->count('ip_address');

        // ================= VISITOR HARIAN =================
        $data['visitor_harian'] = Visitor::whereDate('visited_at', date('Y-m-d'))
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->distinct('ip_address')
            ->count('ip_address');

        // ================= VISITOR BULAN INI =================
        // $data['visitor_bulan_ini'] = Visitor::whereMonth('visited_at', $currentMonth)
        //     ->whereYear('visited_at', $currentYear)
        //     ->when($adminIp, function ($q) use ($adminIp) {
        //         $q->where('ip_address', '!=', $adminIp);
        //     })
        //     ->distinct('ip_address')
        //     ->count('ip_address');
        $data['visitor_bulan_ini'] = Visitor::whereMonth('visited_at', $currentMonth)
            ->whereYear('visited_at', $year) // <--- DIUBAH MENJADI $year
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->distinct('ip_address')
            ->count('ip_address');

        // ================= VISITOR TAHUN INI =================
        // $data['visitor_tahun_ini'] = Visitor::whereYear('visited_at', $currentYear)
        //     ->when($adminIp, function ($q) use ($adminIp) {
        //         $q->where('ip_address', '!=', $adminIp);
        //     })
        //     ->distinct('ip_address')
        //     ->count('ip_address');
        $data['visitor_tahun_ini'] = Visitor::whereYear('visited_at', $year) // <--- DIUBAH MENJADI $year
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->distinct('ip_address')
            ->count('ip_address');

        // ================= AVAILABLE YEARS =================
        $data['available_years'] = Visitor::selectRaw('YEAR(visited_at) as year')
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $data['visitor_data'] = $dataVisitor;
        $data['current_year'] = $year;

        // ================= TOP PAGES (UNIQUE IP) =================

        $data['top_pages'] = Visitor::select(
            DB::raw("
            TRIM(BOTH '/' FROM
                SUBSTRING_INDEX(
                    SUBSTRING_INDEX(page_url, '://', -1),
                    '/', -1
                )
            ) as page
        "),
            DB::raw('COUNT(DISTINCT ip_address) as total')
        )
            ->whereNotNull('page_url')
            ->where('page_url', 'NOT LIKE', '%.php%')
            ->where('page_url', 'NOT LIKE', '%/recfil%')
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->groupBy('page')
            ->orderByDesc('total')
            ->get()
            ->filter(function ($item) {

                $path = '/' . ltrim($item->page, '/');

                foreach (Route::getRoutes() as $route) {
                    if ($route->uri() === ltrim($path, '/')) {
                        return true; // route ADA
                    }
                }

                return false; // route TIDAK ADA → BUANG
            })
            ->take(5)
            ->values();



        // ================= DEVICE (HP / KOMPUTER) =================
        $totalDevice = Visitor::when($adminIp, function ($q) use ($adminIp) {
            $q->where('ip_address', '!=', $adminIp);
        })
            ->distinct('ip_address')
            ->count('ip_address');

        $data['device_hp'] = Visitor::where(function ($q) {
            $q->where('user_agent', 'LIKE', '%Android%')
                ->orWhere('user_agent', 'LIKE', '%iPhone%')
                ->orWhere('user_agent', 'LIKE', '%iPad%')
                ->orWhere('user_agent', 'LIKE', '%iPod%')
                ->orWhere('user_agent', 'LIKE', '%Windows Phone%');

        })
            ->when($adminIp, function ($q) use ($adminIp) {
                $q->where('ip_address', '!=', $adminIp);
            })
            ->distinct('ip_address')
            ->count('ip_address');

        $data['device_komputer'] = $totalDevice - $data['device_hp'];

        $data['device_hp_percent'] = $totalDevice > 0
            ? round(($data['device_hp'] / $totalDevice) * 100)
            : 0;

        $data['device_komputer_percent'] = $totalDevice > 0
            ? round(($data['device_komputer'] / $totalDevice) * 100)
            : 0;

        // ================= PRODUK =================
        $data['kredit'] = ProdukLayananModel::where('type', 0)->where('kategori', 0)->count();
        $data['deposito'] = ProdukLayananModel::where('type', 0)->where('kategori', 1)->count();
        $data['tabungan'] = ProdukLayananModel::where('type', 0)->where('kategori', 2)->count();
        $data['pengaduan'] = PengaduanModel::count();

        // ================= PENGAJUAN =================
        $data['pengajuan_kredit'] = PengajuanModel::where('jenis_pengajuan', 'kredit')->count();
        $data['pengajuan_tabungan'] = PengajuanModel::where('jenis_pengajuan', 'tabungan')->count();
        $data['pengajuan_deposito'] = PengajuanModel::where('jenis_pengajuan', 'deposito')->count();

        return view('homeadmin', $data);
    }



    public function exportVisitorMonthlyPDF(Request $request)
    {
        // $adminIp = (auth()->check() && auth()->user()->role == 0)
        // ? $request->ip()
        // : null;


        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);


        $startDate = Carbon::create($year, $month, 1)->toDateString();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth()->toDateString();

        $daysInMonth = Carbon::create($year, $month, 1)->daysInMonth;

        // ==========================
        // QUERY DATA
        // ==========================
        $rawData = Visitor::selectRaw("
            DATE(visited_at) as visit_date,
            page_url,
            COUNT(*) as total
        ")
            ->whereRaw("DATE(visited_at) BETWEEN ? AND ?", [$startDate, $endDate])
            ->whereNotNull('page_url')
            // ->when($adminIp, function ($q) use ($adminIp) {
            //     $q->where('ip_address', '!=', $adminIp);
            // })
            ->groupByRaw("DATE(visited_at), page_url")
            ->get();

        // ==========================
        // DAFTAR HALAMAN STATIS
        // ==========================
        $staticPages = [
            '/' => 'BERANDA',
            '/sejarah' => 'SEJARAH',
            '/visimisi' => 'VISI MISI',
            '/organisasi' => 'STRUKTUR',
            '/jaringankantor' => 'JARINGAN KANTOR',
            '/tabungan' => 'TABUNGAN',
            '/deposito' => 'DEPOSITO',
            '/kredit' => 'KREDIT',
            '/pengajuanonline' => 'PENGAJUAN ONLINE',
            '/rekrutmen' => 'REKRUTMEN',
            '/lelang-jualaset' => 'LELANG',
            '/pengaduan' => 'PENGADUAN',
            '/laporanall' => 'LAPORAN',
            '/eventkegiatan' => 'BERITA',
            '/galery' => 'GALERY',

            // '__LAINNYA__' => 'LAINNYA',
        ];

        // ==========================
        // MAPPING DATA (INI KUNCI)
        // ==========================
        $pages = [];

        // ambil path statis TANPA LAINNYA
        $knownPaths = array_filter(
            array_keys($staticPages),
            fn($p) => $p !== '__LAINNYA__'
        );

        foreach ($rawData as $row) {
            $day = Carbon::parse($row->visit_date)->day;

            // NORMALISASI PATH
            $path = parse_url($row->page_url, PHP_URL_PATH) ?? '/';
            $path = strtolower(trim($path));
            $path = rtrim($path, '/');
            if ($path === '')
                $path = '/';

            // JIKA TIDAK ADA DI STATIS → MASUK LAINNYA
            if (!in_array($path, $knownPaths, true)) {
                $path = '__LAINNYA__';
            }

            // GABUNGKAN TOTAL
            $pages[$path][$day] = ($pages[$path][$day] ?? 0) + $row->total;
        }

        // ==========================
        // FINAL DATA
        // ==========================
        $finalData = [];

        foreach ($staticPages as $path => $label) {
            for ($d = 1; $d <= $daysInMonth; $d++) {
                $finalData[$path]['data'][$d] = $pages[$path][$d] ?? 0;
            }

            $finalData[$path]['label'] = $label;
            $finalData[$path]['link'] = $path === '__LAINNYA__' ? '-' : url($path);
        }

        // TOP 5 HALAMAN TERPOPULER

        $topPages = [];

        foreach ($finalData as $path => $item) {
            $total = array_sum($item['data']);

            if ($total > 0 && $path !== '__LAINNYA__') {
                $topPages[] = [
                    'label' => $item['label'],
                    'link' => $item['link'],
                    'total' => $total
                ];
            }
        }

        // urutkan dari terbesar
        usort($topPages, fn($a, $b) => $b['total'] <=> $a['total']);
        // ambil 5 teratas
        $topPages = array_slice($topPages, 0, 5);

   // MULAI CHARTNYA
        $labels = [];
        $data = [];

        $colors = [
            '#4e79a7',
            '#f28e2c',
            '#e15759',
            '#76b7b2',
            '#59a14f'
        ];

        foreach ($topPages as $i => $page) {
            $labels[] = strtoupper($page['label']); // ambil label asli
            $data[] = $page['total'];
            $topPages[$i]['color'] = $colors[$i] ?? '#000000';
        }
        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'data' => $data,
                        'backgroundColor' => array_column($topPages, 'color')
                    ]
                ]
            ],
            'options' => [
                'plugins' => [
                    'legend' => [
                        'display' => false

                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Top 5 Halaman - Total Akses'
                    ]

                ]
            ]
        ];

        $chartUrl = "https://quickchart.io/chart?c=" . urlencode(json_encode($chartConfig));

// END TABEL 5 GALAMAN AKSES



        // ==========================
        // REPORT PENGUNJUNG HARIAN (1 IP = 1 DATA)
        // ==========================
//TABEL UNTUK LINE CHART
        $visitorDaily = Visitor::selectRaw("
        DATE(visited_at) as visit_date,
        COUNT(DISTINCT ip_address) as total_ip
    ")
            ->whereRaw("DATE(visited_at) BETWEEN ? AND ?", [$startDate, $endDate])
            //  ->when($adminIp, function ($q) use ($adminIp) {
            //     $q->where('ip_address', '!=', $adminIp);
            // })
            ->groupByRaw("DATE(visited_at)")
            ->orderByRaw("DATE(visited_at)")
            ->get()
            ->map(function ($row) {
                return [
                    'date' => Carbon::parse($row->visit_date)->format('d'),
                    'total' => $row->total_ip,
                ];
            })
            ->toArray();


        // MULAI CHARTNYA

        $lineLabels = [];
        $lineData = [];

        for ($d = 1; $d <= $daysInMonth; $d++) {

            $total = 0;

            foreach ($visitorDaily as $row) {
                if ((int) $row['date'] === $d) {
                    $total = $row['total'];
                    break;
                }
            }

            $lineLabels[] = $d;
            $lineData[] = $total;
        }

        $totalPengunjungBulanan = array_sum($lineData);

        $lineChartConfig = [
            'type' => 'line',
            'data' => [
                'labels' => $lineLabels,
                'datasets' => [
                    [
                        'label' => 'Total Pengunjung Perbulan: ' . number_format($totalPengunjungBulanan),
                        'data' => $lineData,
                        'borderColor' => '#1f77b4',
                        'backgroundColor' => 'rgba(31,119,180,0.2)',
                        'fill' => true,
                        'tension' => 0.3,
                        'pointRadius' => 4,
                        'pointBackgroundColor' => '#1f77b4'
                    ]
                ]
            ],
            'options' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom'
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Grafik Total Pengunjung Berdasarkan Tanggal',
                    'padding' => 30
                ],
                'plugins' => [
                    'datalabels' => [
                        'display' => true,
                        'color' => 'black',
                        'font' => [
                            'size' => 8,
                            'weight' => 'bold'
                        ],
                        'anchor' => 'end',
                        'align' => 'top',
                        'offset' => 4,
                        'formatter' => 'function(value){ return value > 0 ? value : ""; }'
                    ]
                ],
                'scales' => [
                    'xAxes' => [
                        [
                            'ticks' => [
                                'autoSkip' => false,
                                'maxRotation' => 0,
                                'minRotation' => 0,
                                'fontSize' => 8
                            ]
                        ]
                    ],
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true
                            ]
                        ]
                    ]
                ]
            ]
        ];
        

        $lineChartUrl = "https://quickchart.io/chart?width=1000&height=300&plugins=datalabels&c="
            . urlencode(json_encode($lineChartConfig));
//END TABLE LINE CHART



        $data = [
            'month' => Carbon::create($year, $month)->translatedFormat('F'),
            'year' => $year,
            'days' => $daysInMonth,
            'pages' => $finalData,
            'topPages' => $topPages,
            'visitorDaily' => $visitorDaily,
            'chartUrl' => $chartUrl,
            'lineChartUrl' => $lineChartUrl,
        ];



        $pdf = Pdf::loadView('admin.dashboard.exportmontly', $data)
            ->setPaper('A4', 'landscape')
            ->setOptions([
                'isRemoteEnabled' => true,
            ]);


        return $pdf->stream("laporan-visitor-bulanan-{$month}-{$year}.pdf");
    }



    public function exportVisitorYearlyPDF(Request $request)
    {
        // $adminIp = (auth()->check() && auth()->user()->role == 0)
        // ? $request->ip()
        // : null;

        $year = $request->get('year', now()->year);

        $rawData = Visitor::selectRaw("
            MONTH(visited_at) as visit_month,
            page_url,
            COUNT(*) as total
        ")
            ->whereYear('visited_at', $year)
            ->whereNotNull('page_url')
            //  ->when($adminIp, function ($q) use ($adminIp) {
            //     $q->where('ip_address', '!=', $adminIp);
            // })
            ->groupByRaw("MONTH(visited_at), page_url")
            ->get();

        $staticPages = [
            '/' => 'BERANDA',
            '/sejarah' => 'SEJARAH',
            '/visimisi' => 'VISI MISI',
            '/organisasi' => 'STRUKTUR',
            '/jaringankantor' => 'JARINGAN KANTOR',
            '/tabungan' => 'TABUNGAN',
            '/deposito' => 'DEPOSITO',
            '/kredit' => 'KREDIT',
            '/pengajuanonline' => 'PENGAJUAN ONLINE',
            '/rekrutmen' => 'REKRUTMEN',
            '/lelang-jualaset' => 'LELANG',
            '/pengaduan' => 'PENGADUAN',
            '/laporanall' => 'LAPORAN',
            '/eventkegiatan' => 'BERITA',
            '/galery' => 'GALERY',
            

            // '__LAINNYA__' => 'LAINNYA',
        ];

        $pages = [];

        $knownPaths = array_filter(
            array_keys($staticPages),
            fn($p) => $p !== '__LAINNYA__'
        );

        foreach ($rawData as $row) {
            $month = (int) $row->visit_month;

            $path = parse_url($row->page_url, PHP_URL_PATH) ?? '/';
            $path = strtolower(rtrim($path, '/'));
            if ($path === '')
                $path = '/';

            if (!in_array($path, $knownPaths, true)) {
                $path = '__LAINNYA__';
            }

            $pages[$path][$month] = ($pages[$path][$month] ?? 0) + $row->total;
        }

        $finalData = [];

        foreach ($staticPages as $path => $label) {
            for ($m = 1; $m <= 12; $m++) {
                $finalData[$path]['data'][$m] = $pages[$path][$m] ?? 0;
            }

            $finalData[$path]['label'] = $label;
            $finalData[$path]['link'] = $path === '__LAINNYA__' ? '-' : url($path);
        }

        $months = [
            1 => 'JANUARI',
            2 => 'FEBRUARI',
            3 => 'MARET',
            4 => 'APRIL',
            5 => 'MEI',
            6 => 'JUNI',
            7 => 'JULI',
            8 => 'AGUSTUS',
            9 => 'SEPTEMBER',
            10 => 'OKTOBER',
            11 => 'NOVEMBER',
            12 => 'DESEMBER'
        ];





// TABEL HALAMAN 5 BANYAK AKSES
        $topPages = collect($finalData)
            ->reject(fn($item) => $item['label'] === 'LAINNYA')
            ->map(function ($item) {
                return [
                    'label' => $item['label'],
                    'total' => array_sum($item['data']),
                ];
            })
            ->sortByDesc('total')
            ->take(5)
            ->values()
            ->toArray();

        // MULAI CHARTNYA

        $colors = [
            '#4e79a7',
            '#f28e2c',
            '#e15759',
            '#76b7b2',
            '#59a14f'
        ];

        foreach ($topPages as $i => $page) {
            $labels[] = strtoupper($page['label']); // ambil label asli
            $data[] = $page['total'];
            $topPages[$i]['color'] = $colors[$i] ?? '#000000';
        }
        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'data' => $data,
                        'backgroundColor' => array_column($topPages, 'color')
                    ]
                ]
            ],
            'options' => [
                'plugins' => [
                    'legend' => [
                        'display' => false

                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Top 5 Halaman - Total Akses'
                    ]

                ]
            ]
        ];

        $chartUrl = "https://quickchart.io/chart?c=" . urlencode(json_encode($chartConfig));
// END TABEL 5 GALAMAN AKSES


//TABEL UNTUK LINE CHART
        $dailyUnique = Visitor::selectRaw("
            DATE(visited_at) as visit_date,
            COUNT(DISTINCT ip_address) as total_ip
        ")
            //  ->when($adminIp, function ($q) use ($adminIp) {
            //         $q->where('ip_address', '!=', $adminIp);
            //     })
            ->whereYear('visited_at', $year)
            ->groupByRaw("DATE(visited_at)")
            ->get();

        $visitorMonthly = array_fill(1, 12, 0);

        foreach ($dailyUnique as $row) {
            $month = (int) Carbon::parse($row->visit_date)->format('n'); // 1–12
            $visitorMonthly[$month] += $row->total_ip;
        }

        // MULAI CHARTNYA

        $lineLabels = [];
        $lineData = [];

        for ($m = 1; $m <= 12; $m++) {
            $lineLabels[] = Carbon::createFromDate($year, $m, 1)
                ->locale('id')
                ->isoFormat('MMM'); // Jan, Feb, Mar → Jan, Feb, Mar dalam bahasa Indonesia

            $lineData[] = $visitorMonthly[$m] ?? 0;
        }

        $totalPengunjungTahunan = array_sum($lineData);

        $lineChartConfig = [
            'type' => 'line',
            'data' => [
                'labels' => $lineLabels,
                'datasets' => [
                    [
                        'label' => 'Total Pengunjung Pertahun : ' . number_format($totalPengunjungTahunan),
                        'data' => $lineData,
                        'borderColor' => '#1f77b4',
                        'backgroundColor' => 'rgba(31,119,180,0.2)',
                        'fill' => true,
                        'tension' => 0.3,
                        'pointRadius' => 4,
                        'pointBackgroundColor' => '#1f77b4',
                    ]
                ]
            ],
            'options' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom'
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Grafik Total Pengunjung Berdasarkan Bulan',
                     'padding' => 30
                ],
                'plugins' => [
                    'datalabels' => [
                        'display' => true,
                        'color' => 'black',
                        'font' => ['size' => 8, 'weight' => 'bold'],
                        'anchor' => 'end',
                        'align' => 'top',
                        'offset' => 4,
                        'formatter' => 'function(value){ return value > 0 ? value : ""; }'
                    ]
                ],
                'scales' => [
                    'xAxes' => [
                        [
                            'ticks' => [
                                'autoSkip' => false,
                                'maxRotation' => 0,
                                'minRotation' => 0,
                                'fontSize' => 8
                            ]
                        ]
                    ],
                    'yAxes' => [
                        [
                            'ticks' => ['beginAtZero' => true]
                        ]
                    ]
                ]
            ]
        ];

        $lineChartUrl = "https://quickchart.io/chart?width=1000&height=300&plugins=datalabels&c=" . urlencode(json_encode($lineChartConfig));
//END TABLE LINE CHART




        $data = [
            'year' => $year,
            'months' => $months,
            'pages' => $finalData,
            'topPages' => $topPages,
            'visitorMonthly' => $visitorMonthly,
            'chartUrl' => $chartUrl,
            'lineChartUrl' => $lineChartUrl,
        ];

        $pdf = Pdf::loadView('admin.dashboard.exportyearly', $data)
            ->setPaper('A4', 'landscape')
            ->setOptions([
                'isRemoteEnabled' => true,
            ]);

        return $pdf->stream("laporan-visitor-tahunan-{$year}.pdf");
    }

}
