@extends('layouts.admin')

<style>
    .dropdown-menu .dropdown-content {
        max-height: 260px;
        overflow-y: auto;
    }
</style>
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="credit-card" class="report-box__icon text-primary"></i>
                                        <div class="ml-auto">
                                            {{-- <p>Total Pengajuan</p> --}}
                                            <div class="report-box__indicator bg-success "> Total Pengajuan <i
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-6">
                                        <div>
                                            <div class="text-2xl font-medium leading-8"> {{ $pengajuan_kredit }}</div>
                                            <div class="text-1x1 text-slate-500 mt-1"> Kredit</div>
                                        </div>
                                        <div class="border-l border-slate-200 mx-2"></div>
                                        <div>
                                            <div class="text-2xl font-medium leading-8"> {{ $pengajuan_deposito }}</div>
                                            <div class="text-1x1 text-slate-500 mt-1"> Deposito</div>
                                        </div>
                                        <div class="border-l border-slate-200 mx-2"></div>
                                        <div>
                                            <div class="text-2xl font-medium leading-8"> {{ $pengajuan_tabungan }}</div>
                                            <div class="text-1x1 text-slate-500 mt-1"> Tabungan</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer">
                                                Pengaduan
                                                Online<i class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $pengaduan }}</div>
                                    <div class="text-base text-slate-500 mt-1">Pengaduan Online </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-warning "> Total Produk <i
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-6">
                                        <div>
                                            <div class="text-2xl font-medium leading-8">{{ $kredit }}</div>
                                            <div class="text-1x1 text-slate-500 mt-1"> Kredit</div>
                                        </div>
                                        <div class="border-l border-slate-200 mx-2"></div>
                                        <div>
                                            <div class="text-2xl font-medium leading-8">{{ $deposito }}</div>
                                            <div class="text-1x1 text-slate-500 mt-1"> Deposito</div>
                                        </div>
                                        <div class="border-l border-slate-200 mx-2"></div>
                                        <div>
                                            <div class="text-2xl font-medium leading-8">{{ $tabungan }}</div>
                                            <div class="text-1x1 text-slate-500 mt-1"> Tabungan</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> Visitor
                                                Harian<i class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $visitor_harian }}</div>
                                    <div class="text-base text-slate-500 mt-1">Pengunjung Website </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Sales Report -->
                {{-- <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Sales Report
                    </h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                        <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">$15,000</div>
                                <div class="mt-0.5 text-slate-500">This Month</div>
                            </div>
                            <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                            <div>
                                <div class="text-slate-500 text-lg xl:text-xl font-medium">$10,000</div>
                                <div class="mt-0.5 text-slate-500">Last Month</div>
                            </div>
                        </div>
                        <div class="dropdown md:ml-auto mt-5 md:mt-0">
                            <button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content overflow-y-auto h-32">
                                    <li><a href="" class="dropdown-item">PC & Laptop</a></li>
                                    <li><a href="" class="dropdown-item">Smartphone</a></li>
                                    <li><a href="" class="dropdown-item">Electronic</a></li>
                                    <li><a href="" class="dropdown-item">Photography</a></li>
                                    <li><a href="" class="dropdown-item">Sport</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="report-chart">
                        <div class="h-[275px]">
                            <canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
                <div class="col-span-12 lg:col-span-6 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Statistik Pengunjung Website</h2>
                    </div>

                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex items-center space-x-6">
                                <div>
                                    <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                        {{ number_format($visitor_bulan_ini) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">Bulan Ini</div>
                                </div>

                                <div style="margin-left: 30px;">
                                    <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                        {{ number_format($visitor_tahun_ini) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">Tahun Ini</div>
                                </div>
                            </div>

                            @php
                                $months = [
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
                                    12 => 'Desember',
                                ];
                            @endphp

                            <div class="flex items-center md:ml-auto gap-2">
                                <div class="dropdown mt-5 md:mt-0">
                                    <button class="dropdown-toggle btn btn-outline-secondary font-normal"
                                        data-tw-toggle="dropdown">
                                        Tahun {{ $current_year }}
                                        <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i>
                                    </button>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content overflow-y-auto h-32">
                                            @foreach ($available_years as $y)
                                                <li>
                                                    <a href="?year={{ $y }}"
                                                        class="dropdown-item">{{ $y }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="dropdown mt-5 md:mt-0">
                                    <button class="dropdown-toggle btn btn-outline-secondary font-normal"
                                        data-tw-toggle="dropdown">
                                        Export
                                        <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i>
                                    </button>

                                    <div class="dropdown-menu w-56">
                                        <div class="max-h-60 overflow-y-auto">
                                            <ul class="dropdown-content">


                                                @foreach ($months as $m => $label)
                                                    <li>
                                                        <a href="{{ route('exportvisitor.monthly', [
                                                            'year' => $current_year,
                                                            'month' => $m,
                                                        ]) }}"
                                                            class="dropdown-item" target="_blank">
                                                            {{ $label }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                                <li class="dropdown-divider"></li>

                                                <li>
                                                    <a href="{{ route('exportvisitor.yearly', ['year' => $current_year]) }}"
                                                        class="dropdown-item font-semibold" target="_blank">
                                                        Tahunan {{$current_year}}
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="report-chart mt-8">
                            <div class="h-[275px]">
                                <canvas id="visitorLineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BEGIN: Weekly Top Seller -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Perangkat
                        </h2>

                    </div>
                    <div class="intro-y box p-5 mt-5" style="height: 400px;">
                        <div class="mt-3">
                            <div class="h-[213px]">
                                <canvas id="report-pie-chart-device"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span class="truncate">Mobile</span>
                                <span class="font-medium ml-auto">
                                    {{ $device_hp_percent }}%
                                </span>
                            </div>

                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span class="truncate">PC</span>
                                <span class="font-medium ml-auto">
                                    {{ $device_komputer_percent }}%
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END: Weekly Top Seller -->
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Page Terbanyak Diakses
                        </h2>
                    </div>

                    <div class="intro-y box p-5 mt-5">
                        <div class="mt-3">
                            <div class="h-[213px]">
                                <canvas id="top-page-donut"></canvas>
                            </div>
                        </div>

                        {{-- Keterangan bawah chart --}}
                        <div class="w-52 sm:w-auto mx-auto mt-1">
                            @php
                                $colors = ['#3490dc', '#ffed4a', '#f6ad55', '#38c172', '#e3342f'];
                            @endphp

                            @foreach ($top_pages as $i => $item)
                                <div class="flex items-center {{ $i > 0 ? 'mt-2' : '' }}">
                                    <div class="w-2 h-2 rounded-full mr-3"
                                        style="background-color: {{ $colors[$i % count($colors)] }};">
                                    </div>

                                    {{-- INI YANG PENTING --}}
                                    <span class="truncate">
                                        {{ $item->page }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <!-- END: Sales Report -->
                <!-- BEGIN: Official Store -->
                {{-- <div class="col-span-12 xl:col-span-8 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Official Store
                    </h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                        <i data-lucide="map-pin" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" class="form-control sm:w-56 box pl-10" placeholder="Filter by city">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div>250 Official stores in 21 countries, click the marker to see location details.</div>
                    <div class="report-maps mt-5 bg-slate-200 rounded-md" data-center="-6.2425342, 106.8626478" data-sources="{{asset('admin//dist/json/location.json')}}"></div>
                </div>
            </div>
            <!-- END: Official Store -->
            <!-- BEGIN: Weekly Best Sellers -->
            <div class="col-span-12 xl:col-span-4 mt-6">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Weekly Best Sellers
                    </h2>
                </div>
                <div class="mt-5">
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-8.jpg')}}">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Kevin Spacey</div>
                                <div class="text-slate-500 text-xs mt-0.5">10 February 2021</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-11.jpg')}}">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Johnny Depp</div>
                                <div class="text-slate-500 text-xs mt-0.5">2 July 2021</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-7.jpg')}}">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Denzel Washington</div>
                                <div class="text-slate-500 text-xs mt-0.5">13 October 2021</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-9.jpg')}}">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Tom Cruise</div>
                                <div class="text-slate-500 text-xs mt-0.5">18 July 2021</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                </div>
            </div>
            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->
            <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                    <div class="box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">Target Sales</div>
                                <div class="text-slate-500 mt-1">300 Sales</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <div class="w-[90px] h-[90px]">
                                    <canvas id="report-donut-chart-1"></canvas>
                                </div>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">20%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                    <div class="box p-5 zoom-in">
                        <div class="flex">
                            <div class="text-lg font-medium truncate mr-3">Social Media</div>
                            <div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">320 Followers</div>
                        </div>
                        <div class="mt-1">
                            <div class="h-[58px]">
                                <canvas class="simple-line-chart-1 -ml-1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                    <div class="box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">New Products</div>
                                <div class="text-slate-500 mt-1">1450 Products</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <div class="w-[90px] h-[90px]">
                                    <canvas id="report-donut-chart-2"></canvas>
                                </div>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">45%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                    <div class="box p-5 zoom-in">
                        <div class="flex">
                            <div class="text-lg font-medium truncate mr-3">Posted Ads</div>
                            <div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">180 Campaign</div>
                        </div>
                        <div class="mt-1">
                            <div class="h-[58px]">
                                <canvas class="simple-line-chart-1 -ml-1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Products -->
            <div class="col-span-12 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Weekly Top Products
                    </h2>
                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                        <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                    </div>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-report sm:mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">IMAGES</th>
                                <th class="whitespace-nowrap">PRODUCT NAME</th>
                                <th class="text-center whitespace-nowrap">STOCK</th>
                                <th class="text-center whitespace-nowrap">STATUS</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-3.jpg')}}" title="Uploaded at 10 February 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-9.jpg')}}" title="Uploaded at 27 April 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-4.jpg')}}" title="Uploaded at 15 March 2021">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">Oppo Find X2 Pro</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Smartphone &amp; Tablet</div>
                                </td>
                                <td class="text-center">146</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-9.jpg')}}" title="Uploaded at 2 July 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-1.jpg')}}" title="Uploaded at 3 November 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-14.jpg')}}" title="Uploaded at 10 June 2021">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">Dell XPS 13</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                </td>
                                <td class="text-center">103</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-14.jpg')}}" title="Uploaded at 13 October 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-3.jpg')}}" title="Uploaded at 20 September 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-3.jpg')}}" title="Uploaded at 20 January 2021">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">Nikon Z6</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div>
                                </td>
                                <td class="text-center">50</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-8.jpg')}}" title="Uploaded at 18 July 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-8.jpg')}}" title="Uploaded at 26 April 2021">
                                        </div>
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{asset('admin/dist/images/preview-2.jpg')}}" title="Uploaded at 26 December 2021">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">Apple MacBook Pro 13</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                </td>
                                <td class="text-center">50</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                    <nav class="w-full sm:w-auto sm:mr-auto">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                            </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                            <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                            </li>
                        </ul>
                    </nav>
                    <select class="w-20 form-select box mt-3 sm:mt-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select>
                </div>
            </div>
            <!-- END: Weekly Top Products -->
        </div>
    </div>
    <div class="col-span-12 2xl:col-span-3">
        <div class="2xl:border-l -mb-10 pb-10">
            <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Transactions
                        </h2>
                    </div>
                    <div class="mt-5">
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-8.jpg')}}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Kevin Spacey</div>
                                    <div class="text-slate-500 text-xs mt-0.5">10 February 2021</div>
                                </div>
                                <div class="text-success">+$47</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-11.jpg')}}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Johnny Depp</div>
                                    <div class="text-slate-500 text-xs mt-0.5">2 July 2021</div>
                                </div>
                                <div class="text-success">+$50</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-7.jpg')}}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Denzel Washington</div>
                                    <div class="text-slate-500 text-xs mt-0.5">13 October 2021</div>
                                </div>
                                <div class="text-success">+$86</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-9.jpg')}}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Tom Cruise</div>
                                    <div class="text-slate-500 text-xs mt-0.5">18 July 2021</div>
                                </div>
                                <div class="text-danger">-$112</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-11.jpg')}}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Kate Winslet</div>
                                    <div class="text-slate-500 text-xs mt-0.5">5 February 2022</div>
                                </div>
                                <div class="text-danger">-$50</div>
                            </div>
                        </div>
                        <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                    </div>
                </div>
                <!-- END: Transactions -->
                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Recent Activities
                        </h2>
                        <a href="" class="ml-auto text-primary truncate">Show More</a>
                    </div>
                    <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
                        <div class="intro-x relative flex items-center mb-3">
                            <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-8.jpg')}}">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Tom Cruise</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500 mt-1">Has joined the team</div>
                            </div>
                        </div>
                        <div class="intro-x relative flex items-center mb-3">
                            <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-8.jpg')}}">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Kevin Spacey</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500">
                                    <div class="mt-1">Added 3 new photos</div>
                                    <div class="flex mt-2">
                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Oppo Find X2 Pro">
                                            <img alt="Midone - HTML Admin Template" class="rounded-md border border-white" src="{{asset('admin/dist/images/preview-3.jpg')}}">
                                        </div>
                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Dell XPS 13">
                                            <img alt="Midone - HTML Admin Template" class="rounded-md border border-white" src="{{asset('admin/dist/images/preview-6.jpg')}}">
                                        </div>
                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Nikon Z6">
                                            <img alt="Midone - HTML Admin Template" class="rounded-md border border-white" src="{{asset('admin/dist/images/preview-3.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-x text-slate-500 text-xs text-center my-4">12 November</div>
                        <div class="intro-x relative flex items-center mb-3">
                            <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-8.jpg')}}">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Sylvester Stallone</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500 mt-1">Has changed <a class="text-primary" href="">Sony Master Series A9G</a> price and description</div>
                            </div>
                        </div>
                        <div class="intro-x relative flex items-center mb-3">
                            <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-4.jpg')}}">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Tom Cruise</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500 mt-1">Has changed <a class="text-primary" href="">Samsung Galaxy S20 Ultra</a> description</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Recent Activities -->
                <!-- BEGIN: Important Notes -->
                <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-auto">
                            Important Notes
                        </h2>
                        <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                        <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                    </div>
                    <div class="mt-5 intro-x">
                        <div class="box zoom-in">
                            <div class="tiny-slider" id="important-notes">
                                <div class="p-5">
                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                    <div class="font-medium flex mt-5">
                                        <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                        <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                    <div class="font-medium flex mt-5">
                                        <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                        <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                    <div class="font-medium flex mt-5">
                                        <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                        <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Important Notes -->
                <!-- BEGIN: Schedules -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Schedules
                        </h2>
                        <a href="" class="ml-auto text-primary truncate flex items-center"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Add New Schedules </a>
                    </div>
                    <div class="mt-5">
                        <div class="intro-x box">
                            <div class="p-5">
                                <div class="flex">
                                    <i data-lucide="chevron-left" class="w-5 h-5 text-slate-500"></i>
                                    <div class="font-medium text-base mx-auto">April</div>
                                    <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500"></i>
                                </div>
                                <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                                    <div class="font-medium">Su</div>
                                    <div class="font-medium">Mo</div>
                                    <div class="font-medium">Tu</div>
                                    <div class="font-medium">We</div>
                                    <div class="font-medium">Th</div>
                                    <div class="font-medium">Fr</div>
                                    <div class="font-medium">Sa</div>
                                    <div class="py-0.5 rounded relative text-slate-500">29</div>
                                    <div class="py-0.5 rounded relative text-slate-500">30</div>
                                    <div class="py-0.5 rounded relative text-slate-500">31</div>
                                    <div class="py-0.5 rounded relative">1</div>
                                    <div class="py-0.5 rounded relative">2</div>
                                    <div class="py-0.5 rounded relative">3</div>
                                    <div class="py-0.5 rounded relative">4</div>
                                    <div class="py-0.5 rounded relative">5</div>
                                    <div class="py-0.5 bg-success/20 dark:bg-success/30 rounded relative">6</div>
                                    <div class="py-0.5 rounded relative">7</div>
                                    <div class="py-0.5 bg-primary text-white rounded relative">8</div>
                                    <div class="py-0.5 rounded relative">9</div>
                                    <div class="py-0.5 rounded relative">10</div>
                                    <div class="py-0.5 rounded relative">11</div>
                                    <div class="py-0.5 rounded relative">12</div>
                                    <div class="py-0.5 rounded relative">13</div>
                                    <div class="py-0.5 rounded relative">14</div>
                                    <div class="py-0.5 rounded relative">15</div>
                                    <div class="py-0.5 rounded relative">16</div>
                                    <div class="py-0.5 rounded relative">17</div>
                                    <div class="py-0.5 rounded relative">18</div>
                                    <div class="py-0.5 rounded relative">19</div>
                                    <div class="py-0.5 rounded relative">20</div>
                                    <div class="py-0.5 rounded relative">21</div>
                                    <div class="py-0.5 rounded relative">22</div>
                                    <div class="py-0.5 bg-pending/20 dark:bg-pending/30 rounded relative">23</div>
                                    <div class="py-0.5 rounded relative">24</div>
                                    <div class="py-0.5 rounded relative">25</div>
                                    <div class="py-0.5 rounded relative">26</div>
                                    <div class="py-0.5 bg-primary/10 dark:bg-primary/50 rounded relative">27</div>
                                    <div class="py-0.5 rounded relative">28</div>
                                    <div class="py-0.5 rounded relative">29</div>
                                    <div class="py-0.5 rounded relative">30</div>
                                    <div class="py-0.5 rounded relative text-slate-500">1</div>
                                    <div class="py-0.5 rounded relative text-slate-500">2</div>
                                    <div class="py-0.5 rounded relative text-slate-500">3</div>
                                    <div class="py-0.5 rounded relative text-slate-500">4</div>
                                    <div class="py-0.5 rounded relative text-slate-500">5</div>
                                    <div class="py-0.5 rounded relative text-slate-500">6</div>
                                    <div class="py-0.5 rounded relative text-slate-500">7</div>
                                    <div class="py-0.5 rounded relative text-slate-500">8</div>
                                    <div class="py-0.5 rounded relative text-slate-500">9</div>
                                </div>
                            </div>
                            <div class="border-t border-slate-200/60 p-5">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">UI/UX Workshop</span> <span class="font-medium xl:ml-auto">23th</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">VueJs Frontend Development</span> <span class="font-medium xl:ml-auto">10th</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">Laravel Rest API</span> <span class="font-medium xl:ml-auto">31th</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END: Schedules -->
            </div>
        </div>
    </div>
    </div>

    {{-- Tambahkan di bawah atau di stack script --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById("visitorLineChart").getContext("2d");

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ],
                    datasets: [{
                        label: 'Jumlah Visitor',
                        data: @json($visitor_data),
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34,197,94,0.15)',
                        tension: 0.4,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 15,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#22c55e',
                        pointHoverBackgroundColor: '#16a34a'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(30,41,59,0.9)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            callbacks: {
                                label: function(context) {
                                    return 'Visitor: ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#64748b',
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(200,200,200,0.15)'
                            },
                            ticks: {
                                color: '#64748b',
                                callback: value => value.toLocaleString('id-ID')
                            }
                        }
                    }
                }
            });
        });
    </script>
    {{-- TOP PAGES --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById("top-page-donut").getContext("2d");
            const chartLabels = @json($top_pages->pluck('page'));
            const chartData = @json($top_pages->pluck('total'));
            const colors = ['#3490dc', '#ffed4a', '#f6ad55', '#38c172', '#e3342f'];

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        data: chartData,
                        backgroundColor: colors.slice(0, chartData.length),
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    cutout: "80%"
                }
            });
        });
    </script>

    <script>
        const deviceChartData = {
            labels: ['HP', 'Komputer'],
            datasets: [{
                data: [
                    {{ $device_hp }},
                    {{ $device_komputer }}
                ]
            }]
        };
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const ctx = document.getElementById('report-pie-chart-device').getContext('2d');

            // kalau chart pernah dibuat sebelumnya → hancurkan
            if (window.deviceChart) {
                window.deviceChart.destroy();
            }

            window.deviceChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Mobile', 'PC'],
                    datasets: [{
                        data: [
                            {{ $device_hp }},
                            {{ $device_komputer }}
                        ],
                        backgroundColor: [
                            '#065f46', // hijau HP
                            '#f59e0b' // kuning Komputer
                        ],
                        borderWidth: 3,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
@endsection
